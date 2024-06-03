<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\CheckRentalEndDate::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        /**
        * Выполнение команды check:rental-end-date каждую минуту (что тут написать)
        *
        * return выполнение команды 
        */
        $schedule->command('check:rental-end-date')->everyMinute()->withoutOverlapping();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}