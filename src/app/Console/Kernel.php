<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SendEmailJob;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
	    // $schedule->command('inspire')->hourly();
	    // $schedule->job(new Heartbeat)->everyFiveMinutes();
	    $details['email'] = 'jakib9999@gmail.com';

            //dispatch(new App\Jobs\SendEmailJob($details));
	    $schedule->job(new SendEmailJob($details))->everyMinute();
	    //$schedule->call(function () {
            //   $this->dispatch(new \App\Jobs\SendEmailJob($details));
            //   })->onConnection('sync')->everyMinute();


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
