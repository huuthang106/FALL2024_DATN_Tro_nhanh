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
    public $perPage = 5; // Số lượng bản ghi trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $startDate = ''; // Ngày bắt đầu lọc
    public $endDate = ''; // Ngày kết thúc lọc
    protected $listeners = ['delete-selected-maintenances' => 'deleteSelectedMaintenances'];

    protected $queryString = ['search', 'perPage', 'timeFilter', 'startDate', 'endDate'];

    public function render()
    {
        $userId = Auth::id();
        $rooms = Room::where('user_id', $userId)->pluck('id');
        
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
            $date = match($this->timeFilter) {
                '1_day' => Carbon::now()->subDay(),
                '7_day' => Carbon::now()->subDays(7),
                '1_month' => Carbon::now()->subMonth(),
                '3_month' => Carbon::now()->subMonths(3),
                '6_month' => Carbon::now()->subMonths(6),
                '1_year' => Carbon::now()->subYear(),
                default => null,
            };
            
            if ($date) {
                $query->where('created_at', '>=', $date);
            }
        }
    
        // Thêm điều kiện lọc theo ngày bắt đầu và kết thúc nếu có
        if ($this->startDate) {
            $query->where('created_at', '>=', Carbon::parse($this->startDate)->startOfDay());
        }
    
        if ($this->endDate) {
            $query->where('created_at', '<=', Carbon::parse($this->endDate)->endOfDay());
        }
    
        $maintenanceRequests = $query->orderBy('created_at', 'desc')->paginate($this->perPage);
    
        return view('livewire.maintenance-owner-list', compact('maintenanceRequests'));
    }

    // Reset trang khi thay đổi số lượng bản ghi trên mỗi trang
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function deleteSelectedMaintenances($data)
    {
        $ids = $data['ids'];
        if (empty($ids)) {
            $this->dispatch('error', ['message' => 'Không có yêu cầu bảo trì nào được chọn để xóa.']);
            return;
        }
    
        $deletedCount = MaintenanceRequest::whereIn('id', $ids)->delete();
    
        $this->dispatch('maintenances-deleted', ['message' => "Đã xóa thành công $deletedCount yêu cầu bảo trì."]);
    }

    // Reset trang khi thay đổi khoảng thời gian
    public function updatedTimeFilter()
    {
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTimeFilter()
    {
        $this->resetPage();
    }

    public function updatingStartDate()
    {
        $this->resetPage();
    }

    public function updatingEndDate()
    {
        $this->resetPage();
    }
}