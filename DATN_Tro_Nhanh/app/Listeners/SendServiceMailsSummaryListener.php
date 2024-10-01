<?php

// namespace App\Listeners;

// use App\Events\ServiceMailsSummaryEvent;
// use App\Services\ServiceMailService;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Support\Facades\Log;

// class SendServiceMailsSummaryListener implements ShouldQueue
// {
//     use InteractsWithQueue;

//     protected $serviceMailService;

//     public function __construct(ServiceMailService $serviceMailService)
//     {
//         $this->serviceMailService = $serviceMailService;
//     }

//     public function handle(ServiceMailsSummaryEvent $event)
//     {
//         Log::info('cc');
//         $this->serviceMailService->sendDailySummary();
//     }
// }

namespace App\Listeners;

use App\Events\ServiceMailsSummaryEvent;
use App\Services\ServiceMailService;

class SendServiceMailsSummaryListener
{
    protected $serviceMailService;

    public function __construct(ServiceMailService $serviceMailService)
    {
        $this->serviceMailService = $serviceMailService;
    }

    public function handle(ServiceMailsSummaryEvent $event)
    {
        $this->serviceMailService->sendDailySummary();
    }
}
