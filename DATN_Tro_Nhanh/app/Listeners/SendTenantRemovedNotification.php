<?php

namespace App\Listeners;
use App\Events\TenantRemoved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Notification;
use App\Models\User;
class SendTenantRemovedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TenantRemoved $event)
    {
        // Lấy resident từ event
        $resident = $event->resident;
        $content = $event->content;
        // Lấy tên phòng
        $roomTitle = $resident->room->title;

        // Lấy tên người xóa từ user_id
        $userId = $resident->user_id; // ID của người xóa
        $user = User::find($userId); // Tìm người xóa

        // Tạo thông báo
        Notification::create([
            'type' => 'Thông báo từ phòng', // Loại thông báo
            'user_id' => $resident->tenant->id, // ID của tenant
            'data' => "'{$content}' '{$roomTitle}' bởi {$user->name}.", // Thêm tên người xóa
            'status' => 1,
            
        ]);
    }
}
