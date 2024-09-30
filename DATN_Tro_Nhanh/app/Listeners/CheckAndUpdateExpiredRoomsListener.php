<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\RoomClientServices;
use App\Events\ExpiredEntitiesUpdateEvent;

class CheckAndUpdateExpiredRoomsListener
{
    protected $roomClientService;

    public function __construct(RoomClientServices $roomClientService)
    {
        $this->roomClientService = $roomClientService;
    }

    public function handle(ExpiredEntitiesUpdateEvent $event)
    {
        $this->roomClientService->checkAndUpdateExpiredRooms();
    }
}
