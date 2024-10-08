<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MaintenanceRequestList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $timeFilter = '';
    public $selectedRequests = [];
    protected $queryString = ['search', 'perPage', 'timeFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTimeFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        Log::info('Đang tìm kiếm yêu cầu bảo trì với từ khóa: "' . $this->search . '"');

        $query = MaintenanceRequest::where('user_id', Auth::id())
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });

        // Áp dụng bộ lọc thời gian nếu được đặt
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
            Log::info('Thời gian bắt đầu lọc', [
                'startDate' => $startDate,
                'data' => $query,
            ]);
            Log::info('Truy vấn SQL', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
        }

        $maintenanceRequests = $query->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        Log::info('Tìm thấy ' . $maintenanceRequests->count() . ' yêu cầu bảo trì');

        return view('livewire.maintenance-request-list', [
            'maintenanceRequests' => $maintenanceRequests
        ]);
    }
    public function deleteMaintenanceRequest($id)
    {
        try {
            $maintenanceRequest = MaintenanceRequest::findOrFail($id);
            if ($maintenanceRequest->user_id == Auth::id()) {
                $maintenanceRequest->delete();
                $this->dispatch('maintenance-request-deleted', ['message' => 'Yêu cầu bảo trì đã được xóa thành công.']);
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa yêu cầu bảo trì: ' . $e->getMessage());
        }
    }

    public function deleteSelectedRequests()
    {
        MaintenanceRequest::whereIn('id', $this->selectedRequests)
            ->where('user_id', Auth::id())
            ->delete();
        $this->selectedRequests = [];
        $this->dispatch('maintenance-requests-deleted', ['message' => 'Các yêu cầu bảo trì đã chọn đã được xóa thành công']);
    }
}