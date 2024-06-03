<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Server, Location};
use App\Http\Middleware\IsAdmin;

class AdminStatsController extends Controller
{
    public function __construct() {
        /**
        * Мидлвар проверки на админа
        */
        $this->middleware([IsAdmin::class]);
    }

    public function stats() {
        /**
        * Статистика 
        *
        * return страница components.admin.admin_stats ($users - колличество пользователей, $ban_user - колличество заблокированных пользователей,
        *                                               $sum - сумма балансов всех пользователей, servers - колличество серверов,
        *                                               $rented - колличество арендованных серверов, $location - колличество локаций)
        */
        $sum = User::sum('balance');
        $sum = number_format($sum, 0, '', ' ');
        return view('components.admin.admin_stats', [
            'users' => User::count(), 
            'ban_user' => User::where('ban', 1)->count(), 
            'sum' => $sum, 
            'servers' => Server::count(), 
            'rented' => Server::where('status', 'rented')->count(), 
            'location' => Location::count()
        ]);
    }
    public function downloadLogs() {
        /**
        * Скачивание логов сервера
        *
        * return скачивание файла 'laravel.log'
        */
        $logfile = storage_path('logs/laravel.log');
        if (file_exists($logfile)) {
            return response()->download($logfile, 'laravel.log');
        } else {
            return redirect()->back()->with('success', 'Файл логов не найден');
        }
    }
    
}
