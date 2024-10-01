<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ServiceMailService;

class SendDailyServiceMailSummary extends Command
{
    protected $signature = 'service-mails:send-daily-summary';
    protected $description = 'Send summary of service mails';

    public function handle(ServiceMailService $serviceMailService)
    {
        $serviceMailService->sendDailySummary();
        $this->info('Service mail summary sent successfully.');
    }
}
