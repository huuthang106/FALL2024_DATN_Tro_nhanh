<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;
use App\Events\ServiceMailsSummaryEvent;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SendDailyServiceMailSummary;
use Carbon\Carbon;

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
        // $schedule->command('inspire')->hourly();
        $schedule->command('mails:send-service')->hourly();
        // Chạy lệnh này mỗi ngày
        $schedule->command('locks:handle-expired')->daily();

        $schedule->command('vip:remove-expired')->daily();
        // Gửi mail thường sau 1day
        // $schedule->command('service-mails:send-daily-summary')->dailyAt('01:00');
        // Gửi mail queue sau 1day
        $schedule->call(function () {
            SendDailyServiceMailSummary::dispatch(Carbon::yesterday());
        })->dailyAt('01:00');
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
