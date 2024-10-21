<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\ZoneServices;
use App\Events\ExpiredEntitiesUpdateEvent;

class CheckAndUpdateExpiredRoomsListener
{
    protected $zoneServices;

    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }

    public function handle(ExpiredEntitiesUpdateEvent $event)
    {
        $this->zoneServices->checkAndUpdateExpiredZones();
    }
}
