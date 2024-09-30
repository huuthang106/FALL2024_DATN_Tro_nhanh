<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\AccountService;
use App\Events\ExpiredEntitiesUpdateEvent;

class HandleExpiredLocksListener
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function handle(ExpiredEntitiesUpdateEvent $event)
    {
        $this->accountService->handleExpiredLocks();
    }
}
