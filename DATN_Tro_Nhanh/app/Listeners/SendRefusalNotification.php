<?php

namespace App\Listeners;

use App\Events\ApplicationRefused;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use App\Events\ApplicationRefused;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
class SendRefusalNotification
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
    public function handle(ApplicationRefused $event)
    {
        try {
            // Tạo thông báo mới
            Notification::create([
                'user_id' => $event->resident->tenant->id, // ID của tenant liên quan
                'message' => 'Đơn của bạn đã bị từ chối. Lý do: ' . implode(', ', $event->reasons) . ($event->note ? " - Ghi chú: $event->note" : ''),
                'type' => 'Từ chối tham gia trọ thành công', // Hoặc loại thông báo phù hợp
            ]);
        } catch (\Exception $e) {
            Log::error('Không thể lưu thông báo khi từ chối đơn: ' . $e->getMessage());
        }
    }
}
