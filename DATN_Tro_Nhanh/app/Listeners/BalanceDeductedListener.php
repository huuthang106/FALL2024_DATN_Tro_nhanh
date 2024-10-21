<?php

namespace App\Listeners;

use App\Events\BalanceDeductedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Transaction;
class BalanceDeductedListener
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
    public function handle(BalanceDeductedEvent $event): void
    {
        // Lưu lịch sử giao dịch vào cơ sở dữ liệu
        Transaction::create([
            'user_id' => $event->userId,
            'added_funds' => $event->amount, // Số tiền biến động
            'type' => $event->type, // Loại giao dịch
            'description' => $event->description, // Mô tả
            'balance' => $event->balance, // Số dư hiện tại
        ]);
    }
}
