<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class NotificationList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $timeFilter = '';
    public $startDate;
    public $selectedNotifications = [];
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
        Log::info('Đang tìm kiếm với từ khóa: "' . $this->search . '"');

        $query = Notification::where('user_id', Auth::id())
            ->where(function ($q) {
                $q->where('data', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%');
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

        $notifications = $query->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        Log::info('Tìm thấy ' . $notifications->count() . ' thông báo');

        return view('livewire.notification-list', [
            'notifications' => $notifications
        ]);
    }

    public function deleteNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        $this->dispatch('notification-deleted', ['message' => 'Thông báo đã được xóa thành công.']);
    }
    public function deleteSelectedNotifications()
    {
        Notification::whereIn('id', $this->selectedNotifications)->delete();
        $this->selectedNotifications = [];
        $this->dispatch('notifications-deleted', ['message' => 'Các thông báo đã chọn đã được xóa thành công']);
    }
}