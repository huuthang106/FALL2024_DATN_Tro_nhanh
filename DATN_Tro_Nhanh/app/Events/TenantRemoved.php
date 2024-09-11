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
class TenantRemoved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $resident;
    public $content;

    public function __construct(Resident $resident, $content)
    {
        $this->resident = $resident;
        $this->content = $content;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
