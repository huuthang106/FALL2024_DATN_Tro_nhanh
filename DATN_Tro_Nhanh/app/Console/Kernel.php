<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        Commands\RemoveExpiredVIPs::class,
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Định nghĩa các tác vụ định kỳ tại đây.
        // Ví dụ: $schedule->command('inspire')->hourly();
        $schedule->command('mails:send-service')->hourly();
        // Chạy lệnh này mỗi ngày
    $schedule->command('locks:handle-expired')->daily();

    $schedule->command('vip:remove-expired')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    

    
}
