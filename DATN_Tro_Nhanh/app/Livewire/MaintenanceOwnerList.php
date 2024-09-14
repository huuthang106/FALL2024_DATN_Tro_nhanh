<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Room;


class MaintenanceOwnerList extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 10; // Số lượng bản ghi trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $startDate = ''; // Ngày bắt đầu lọc
    public $endDate = ''; // Ngày kết thúc lọc

    protected $queryString = ['search', 'perPage', 'timeFilter', 'startDate', 'endDate'];

    public function render()
    {
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại

        // Lấy các phòng mà người dùng sở hữu
        $rooms = Room::where('user_id', $userId)->pluck('id'); // Giả sử bạn có model Room
    
        // Xây dựng truy vấn để lọc yêu cầu bảo trì của các phòng thuộc người dùng hiện tại
        $query = MaintenanceRequest::whereIn('room_id', $rooms);
    
        // Lọc theo từ khóa tìm kiếm
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now()->copy(); // Tạo một bản sao mới của Carbon
            switch ($this->timeFilter) {
                case '1_day':
                    $date->subDays(1);
                    break;
                case '7_day':
                    $date->subDays(7);
                    break;
                case '1_month':
                    $date->subMonth();
                    break;
                case '3_month':
                    $date->subMonths(3);
                    break;
                case '6_month':
                    $date->subMonths(6);
                    break;
                case '1_year':
                    $date->subYear();
                    break;
            }
            $query->where('created_at', '>=', $date);
        }
        $maintenanceRequests = $query->paginate($this->perPage);

   

        return view('livewire.maintenance-owner-list', compact('maintenanceRequests'));
    }

    // Reset trang khi thay đổi số lượng bản ghi trên mỗi trang
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    // Reset trang khi thay đổi khoảng thời gian
    public function updatedTimeFilter()
    {
        $this->resetPage();
    }
}
