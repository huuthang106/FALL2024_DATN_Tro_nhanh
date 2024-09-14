<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AccountService;

class HandleExpiredLocks extends Command
{
    protected $signature = 'locks:handle-expired';
    protected $description = 'Xử lý các khóa tài khoản đã hết hạn';

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        parent::__construct();
        $this->accountService = $accountService;
    }

    public function handle()
    {
        $this->accountService->handleExpiredLocks();
        $this->info('Đã xử lý các khóa tài khoản đã hết hạn.');
    }
}
