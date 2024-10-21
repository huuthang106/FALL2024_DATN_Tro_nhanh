<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        $query = Zone::query();
        $query->where('status', self::hienthidulieu);
  
        // Tìm kiếm theo nhiều trường
        if ($this->search) {
            $query->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%')
                      ->orWhere('wifi', 'like', '%' . $this->search . '%');
            });
        }
  
        // Lọc theo thời gian
        if ($this->timeFilter) {
            $startDate = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $startDate = Carbon::now()->subDay()->startOfDay();
                    break;
                case '7_day':
                    $startDate = Carbon::now()->subDays(7)->startOfDay();
                    break;
                case '1_month':
                    $startDate = Carbon::now()->subMonth()->startOfDay();
                    break;
                case '3_month':
                    $startDate = Carbon::now()->subMonths(3)->startOfDay();
                    break;
                case '6_month':
                    $startDate = Carbon::now()->subMonths(6)->startOfDay();
                    break;
                case '1_year':
                    $startDate = Carbon::now()->subYear()->startOfDay();
                    break;
            }
            $query->whereDate('created_at', '<=', $startDate);
        }
  
        $zones = $query->paginate($this->perPage);
  
        return view('livewire.room-pagination', [
            'zones' => $zones,
        ]);
    }
    public function approveSelectedRooms($selectedIds)
    {
        // Xử lý logic duyệt các phòng với ID trong $selectedIds
        // Ví dụ: Cập nhật trạng thái của các phòng
        foreach ($selectedIds as $id) {
            $zone = Zone::find($id);
            if ($zone) {
                $zone->status = '2'; // Hoặc trạng thái phù hợp
                $zone->save();
            }
        }
    }
    

}
