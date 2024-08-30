<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserFollowed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $watchListId;
    public $follower;
    public $person_being_followed_id;
    /**
     * Create a new event instance.
     */
    public function __construct($person_being_followed_id,$watchListId, $followerId)
    {
        $this->person_being_followed_id = $person_being_followed_id;

        $this->watchListId = $watchListId;
        $this->follower = $followerId;
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
