<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ServiceMailService;

class SendServiceMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mails:send-service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send service mails that are 24 hours old';

    /**
     * Execute the console command.
     */
    protected $serviceMailService;

    public function __construct(ServiceMailService $serviceMailService)
    {
        parent::__construct();
        $this->serviceMailService = $serviceMailService;
    }
    public function handle()
    {
        //
        $this->serviceMailService->sendEmail();
    }
}
