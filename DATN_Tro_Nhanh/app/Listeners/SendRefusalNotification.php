<?php

namespace App\Listeners;

use App\Events\ApplicationRefused;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use App\Events\ApplicationRefused;
use App\Models\Notification;
use App\Models\Transaction;
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
                'user_id' => $event->resident->user->id, // ID của tenant liên quan
                'data' => 'Đơn của bạn đã bị từ chối. Lý do: ' . implode(', ', $event->reasons) . ($event->note ? " - Ghi chú: $event->note" : ''),
                'type' => 'Từ chối đơn', // Hoặc loại thông báo phù hợp
            ]);
            // Tao giao dich
            $deposit = $event->resident->deposit; // Initialize deposit correctly
            $user = $event->resident->user;
            $user->balance += $deposit;
            $user->save();
            
            Transaction::create([
                'user_id' => $user->id, // Use the already defined $user variable
                'type' => 'Tiền cọc phòng',
                'added_funds' => $deposit,
                'balance' => $user->balance,
                'description' => 'Đơn của bạn đã bị từ chối. Lý do: ' . implode(', ', $event->reasons) . ($event->note ? " - Ghi chú: $event->note" : ''),
            ]);
        } catch (\Exception $e) {
            Log::error('Không thể lưu thông báo khi từ chối đơn: ' . $e->getMessage());
        }
    }
}
