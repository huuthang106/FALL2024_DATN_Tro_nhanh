<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ServiceMailService;
use Carbon\Carbon;

class SendDailyServiceMailSummary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $date;

    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    public function handle(ServiceMailService $serviceMailService)
    {
        $serviceMailService->sendDailySummary($this->date);
    }
}
