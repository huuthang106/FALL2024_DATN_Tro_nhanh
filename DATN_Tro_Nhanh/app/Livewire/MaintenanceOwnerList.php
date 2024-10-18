<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Zone;

class MaintenanceOwnerList extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 5; // Số lượng bản ghi trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $startDate = ''; // Ngày bắt đầu lọc
    public $endDate = ''; // Ngày kết thúc lọc
    protected $listeners = ['delete-selected-maintenances' => 'finish_maintenance'];
    protected const STATUS_PROCESSING = 1;
    protected const STATUS_FINISH = 2;
    protected $queryString = ['search', 'perPage', 'timeFilter', 'startDate', 'endDate'];

    public function render()
    {
        $userId = Auth::id();
        $userId = Auth::id();
        // Lấy zone_id từ bảng zones dựa trên user_id
        $zoneIds = Zone::where('user_id', $userId)->pluck('id');

        // Lấy room_id từ bảng rooms dựa trên zone_id
        $roomIds = Room::whereIn('zone_id', $zoneIds)->pluck('id');

        // Truy vấn các yêu cầu bảo trì dựa trên room_id
        $query = MaintenanceRequest::whereIn('room_id', $roomIds)->where('status', self::STATUS_PROCESSING);
        // Lọc theo từ khóa tìm kiếm
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
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
            // Log::info('Thời gian bắt đầu lọc', [
            //     'startDate' => $startDate,
            //     'data' => $query,
            // ]);
            // Log::info('Truy vấn SQL', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
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

    public function finish_maintenance($data)
    {
        $ids = $data['ids'];
        if (empty($ids)) {
            $this->dispatch('error', ['message' => 'Không có yêu cầu bảo trì nào được chọn để xóa.']);
            return;
        }

        $updatedCount = MaintenanceRequest::whereIn('id', $ids)->update(['status' => self::STATUS_FINISH]);

        $this->dispatch('maintenances-deleted', ['message' => "Đã xóa thành công $updatedCount yêu cầu bảo trì."]);
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
