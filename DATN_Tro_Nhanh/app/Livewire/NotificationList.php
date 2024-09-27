<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;

    protected $queryString = ['search', 'perPage'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->where(function ($query) {
                $query->where('data', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.notification-list', [
            'notifications' => $notifications,
        ]);
    }

    public function deleteNotification($id)
{
    $notification = Notification::findOrFail($id);
    $notification->delete();
    $this->dispatch('notification-deleted', ['message' => 'Thông báo đã được xóa thành công.']);
}
}