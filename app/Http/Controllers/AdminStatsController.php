<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStatsController extends Controller
{
    public function stats() {
        $users = DB::table('users')->count();
        $ban_user = DB::table('users')->where('ban', 1)->count();
        $sum = DB::table('users')->sum('balance');
        $sum = number_format($sum, 0, '', ' ');
        $servers = DB::table('servers')->count();
        $rented_servers = DB::table('servers')->where('status', 'rented')->count();
        $location = DB::table('location')->count();
        return view('components.admin.admin_stats', ['users' => $users, 'ban_user' => $ban_user, 'sum' => $sum, 'servers' => $servers, 'rented' => $rented_servers, 'location' => $location]);
    }
    public function downloadLogs() {
        $logfile = storage_path('logs/laravel.log');
        if (file_exists($logfile)) {
            return response()->download($logfile, 'laravel.log');
        } else {
            $message = 'Файл логов не найден';
            return redirect()->back()->with('success', $message);
        }
    }
}
