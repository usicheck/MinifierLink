<?php

namespace App\Console;

use App\Http\Controllers\LinkController;
use App\Models\Link;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    protected $commands = [
        \App\Console\Commands\DeleteExpiredLinks::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('links:delete-expired')->everyMinute();
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
