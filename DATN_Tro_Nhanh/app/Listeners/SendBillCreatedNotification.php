<?php

namespace App\Listeners;

use App\Events\BillCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
class SendBillCreatedNotification
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
    public function handle(BillCreated $event)
    {
       

        // Lưu thông báo vào bảng notifications
        DB::table('notifications')->insert([
            'type' => 'Hóa đơn', // Loại thông báo
            'data' => 'Bạn vừa có hóa đơn mới',// Dữ liệu thông báo
            'status' => 1, // Trạng thái thông báo, có thể điều chỉnh theo nhu cầu
            'user_id' => $event->user_id, // ID của người nhận từ event
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
