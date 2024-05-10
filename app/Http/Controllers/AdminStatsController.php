<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Server, Location};

class AdminStatsController extends Controller
{
    public function stats() {
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
        $logfile = storage_path('logs/laravel.log');
        if (file_exists($logfile)) {
            return response()->download($logfile, 'laravel.log');
        } else {
            return redirect()->back()->with('success', 'Файл логов не найден');
        }
    }
    
}
