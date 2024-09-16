<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Resident;
class ApplicationRefused
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $resident;
    public $reasons;
    public $note;
    /**
     * Create a new event instance.
     */
    public function __construct(Resident $resident, array $reasons, $note)
    {
        $this->resident = $resident;
        $this->reasons = $reasons;
        $this->note = $note;
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
