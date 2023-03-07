<?php

namespace App\Console;

use App\Jobs\SynthesizeReportDataJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Lệnh xóa log data hàng ngày
        $schedule->command('telescope:prune')->daily();

        // Chạy job tổng hợp dữ liệu từ các db data về db report
        $schedule->job(new SynthesizeReportDataJob())
            ->dailyAt('01:30');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
