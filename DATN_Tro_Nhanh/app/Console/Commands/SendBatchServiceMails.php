<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ServiceMailService;

class SendBatchServiceMails extends Command
{
    protected $signature = 'service-mails:send-batch';
    protected $description = 'Send batch service mails';

    public function handle(ServiceMailService $serviceMailService)
    {
        $serviceMailService->sendBatchEmails();
        $this->info('Batch service mails sent successfully.');
    }
}
