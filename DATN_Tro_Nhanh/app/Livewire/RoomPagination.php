<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use Carbon\Carbon;

class RoomPagination extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'date_new_to_old';
    public $timeFilter = '';
    public $perPage = 10; // Số lượng phòng mỗi trang
    protected $queryString = ['search', 'sortBy', 'perPage'];
    const hienthidulieu = 1;
    
    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
    {
        $this->resetPage();
    }


    public function render()
    {
        $query = Room::query();
        $query->where('status', self::hienthidulieu);

        // Tìm kiếm theo nhiều trường
        if ($this->search) {
            $query->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->timeFilter) {
        $startDate = Carbon::now();  // Thời gian bắt đầu của bộ lọc
    
        \Log::info("Current date before filter: " . Carbon::now()->toDateTimeString());
    
        // Xử lý bộ lọc thời gian
        switch ($this->timeFilter) {
            case '1_day':
                $startDate = Carbon::now()->subDay()->startOfDay();  // Bắt đầu của ngày hôm qua
                break;
            case '7_day':
                $startDate = Carbon::now()->subDays(7)->startOfDay();  // Bắt đầu của 7 ngày trước
                break;
            case '1_month':
                $startDate = Carbon::now()->subMonth()->startOfDay();  // Bắt đầu của 1 tháng trước
                break;
            case '3_month':
                $startDate = Carbon::now()->subMonths(3)->startOfDay();  // Bắt đầu của 3 tháng trước
                break;
            case '6_month':
                $startDate = Carbon::now()->subMonths(6)->startOfDay();  // Bắt đầu của 6 tháng trước
                break;
            case '1_year':
                $startDate = Carbon::now()->subYear()->startOfDay();  // Bắt đầu của 1 năm trước
                break;
        }
    
        \Log::info("Lọc dữ liệu trước ngày: " . $startDate->toDateTimeString());
    
        // Lọc dữ liệu với created_at nhỏ hơn ngày bắt đầu
        $query->whereDate('created_at', '<=', $startDate);
    
        // Log số lượng bản ghi sau khi lọc
        \Log::info("Số lượng bản ghi sau khi lọc: " . $query->count());
        }

        $rooms = $query->paginate($this->perPage);

        return view('livewire.room-pagination', [
            'rooms' => $rooms,
        ]);
    }
    public function approveSelectedRooms($selectedIds)
    {
        if (!empty($selectedIds)) {
            Room::whereIn('id', $selectedIds)->update(['status' => 2]); // Cập nhật trạng thái thành 2
            session()->flash('message', 'Các yêu cầu đã được duyệt thành công.'); // Thông báo thành công
        } else {
            session()->flash('error', 'Không có yêu cầu nào được chọn để duyệt.'); // Thông báo lỗi
        }
    }

}
