<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cart; 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PaymentProcessed
{
    use Dispatchable, SerializesModels;

    public $carts; // Thay đổi từ $cart thành $carts
    public $amount; // Thêm biến request

    public function __construct(Collection $carts,$amount) // Nhận Collection thay vì một Cart
    {
        $this->carts = $carts;
        $this->amount = $amount;
    }
}
