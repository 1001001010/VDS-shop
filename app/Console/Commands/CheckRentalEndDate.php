<?php

namespace App\Console\Commands;

use App\Models\Rental;
use App\Helpers\AppHelper;
use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckRentalEndDate extends Command
{
    protected $signature = 'check:rental-end-date'; // Команда для запуска функции (php artisan Команда)
    protected $description = 'Проверка на окончание аренды'; //Для php artisan list

    public function handle(): int
    {
        // Обновление таблицы аренд с истекшими датами
        $expiredRentals = Rental::where('endDate', '<', now())->whereIn('status', ['active'])->get();
    
        if ($expiredRentals->isNotEmpty()) {
            $expiredRentals->each(function (Rental $rental) {
                $rental->update(['status' => 'completed']);
    
                // Получение id сервера
                $serverId = $rental->server_id;
    
                // Обновление данных сервера
                $server = Server::find($serverId);
                
                $password = AppHelper::instance()->generate_password();
                // Обновление данных сервера
                $server->oc = null;
                $server->panel = null;
                $server->rental_until = null;
                $server->user_pass = $password;
                $server->status = 'inactive';
                $server->save();
            });
    
            $this->info("Аренды, чьи сроки истекли, были обновлены.");
        }
    
        return 0;
    }
}
