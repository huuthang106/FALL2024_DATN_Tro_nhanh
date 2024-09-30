<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\PremiumService;
use App\Events\ExpiredEntitiesUpdateEvent;

class UpdateExpiredPremiumUsersListener
{
    protected $premiumService;

    public function __construct(PremiumService $premiumService)
    {
        $this->premiumService = $premiumService;
    }

    public function handle(ExpiredEntitiesUpdateEvent $event)
    {
        \Log::info('updateStatusAndRemoveExpiredPremiumUsers');
        $this->premiumService->updateStatusAndRemoveExpiredPremiumUsers();
    }
}
