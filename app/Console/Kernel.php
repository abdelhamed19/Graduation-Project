<?php

namespace App\Console;

use App\Models\Task;
use App\Models\Writing;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Writing::where('created_at', '<=', now()->subDays(15))->delete();
        })->daily();

        $schedule->call(function () {
            Task::where('created_at', '<=', now()->subDays(30))->delete();
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
