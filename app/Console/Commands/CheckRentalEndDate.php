<?php

namespace App\Console\Commands;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckRentalEndDate extends Command
{
    protected $signature = 'check:rental-end-date'; // Команда для запуска функции (php artisan Команда)
    protected $description = 'Проверка на окончание аренды'; //Для php artisan list

    public function handle(): int
    {
        Rental::where('endDate', '<', now())
            ->whereIn('status', ['active'])
            ->update(['status' => 'expired']);

        $this->info("Аренды, чьи сроки истекли, были обновлены.");
        $this->info(now());
        return 0;
    }
}
