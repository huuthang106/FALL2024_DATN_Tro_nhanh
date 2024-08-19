<?php

namespace App\Events\Owners;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Room;

class RoomOwnersEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $room;
    // public $type;
    // public $data;
    // public $status;
    // public $userId;

    // public function __construct(Room $room, $type, $data, $status, $userId)
    // {
    //     $this->room = $room; // Lưu ID của phòng
    //     $this->type = $type;
    //     $this->data = $data;
    //     $this->status = $status;
    //     $this->userId = $userId;
    // }
    public function __construct(Room $room)
    {
        $this->room = $room; // Lưu ID của phòng
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
