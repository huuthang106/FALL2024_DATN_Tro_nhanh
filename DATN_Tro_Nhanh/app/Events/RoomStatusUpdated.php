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
use App\Models\Zone;

class RoomStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $room;
    public $newStatus;
    public $zones;
    /**
     * Create a new event instance.
     */ public function __construct(Zone $zone, int $newStatus)
    {
        // $this->room = $room;
        $this->zones = $zone;
        $this->newStatus = $newStatus;
     
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
