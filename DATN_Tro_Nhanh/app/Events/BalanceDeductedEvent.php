<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BalanceDeductedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $userId;
    public $amount;
    public $type;
    public $description;
    public $balance;
    public $status;
    /**
     * Create a new event instance.
     * 
     */
    public function __construct($userId, $amount, $type, $description, $balance, $status)
    {
        //
        $this->userId = $userId;
        $this->amount = $amount;
        $this->type = $type;
        $this->description = $description;
        $this->balance = $balance;
        $this->status = $status;
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
