<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use App\Events\OrderCancelled;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
class SendCancellationNotification
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
    public function handle(OrderCancelled $event)
    {
        try {
            // Tạo thông báo mới
            Notification::create([
                'user_id' => $event->userId, // ID của người dùng liên quan
                'message' => 'Đơn của bạn đã bị thu hồi.',
                'type' => 'Bạn hủy đơn tham gia trọ', // Hoặc loại thông báo phù hợp
            ]);
        } catch (\Exception $e) {
            Log::error('Không thể lưu thông báo khi thu hồi đơn: ' . $e->getMessage());
        }
    }
}
