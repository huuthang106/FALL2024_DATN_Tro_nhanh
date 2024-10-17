<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Room;

class RoomCreated
{
   
    use Dispatchable, SerializesModels;

    public $data; // Thuộc tính để lưu trữ đối tượng Room

    public function __construct(array $data) // Nhận dữ liệu dưới dạng mảng
    {
        $this->data = $data; // Gán dữ liệu cho thuộc tính
    }
}
