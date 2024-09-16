<?php

namespace App\Listeners;

use App\Events\RoomStatusUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use App\Events\RoomStatusUpdated;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class SendRoomStatusUpdateNotification
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
    public function handle(RoomStatusUpdated $event)
    {
        try {
            // Tạo thông báo mới
            Notification::create([
                'user_id' => $event->room->user_id, // Hoặc ID của người dùng liên quan
                'message' => 'Trạng thái phòng "' . $event->room->title . '" đã được cập nhật thành ' . $event->newStatus,
                'type' => 'Đã duyệt phòng trọ thành công', // Hoặc loại thông báo phù hợp
            ]);
        } catch (\Exception $e) {
            Log::error('Không thể lưu thông báo khi cập nhật trạng thái phòng: ' . $e->getMessage());
        }
    }
}
