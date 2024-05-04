<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStatsController extends Controller
{
    public function stats() {
        $sum = DB::table('users')->sum('balance');
        $sum = number_format($sum, 0, '', ' ');
        return view('components.admin.admin_stats', [
            'users' => DB::table('users')->count(), 
            'ban_user' => DB::table('users')->where('ban', 1)->count(), 
            'sum' => $sum, 
            'servers' => DB::table('servers')->count(), 
            'rented' => DB::table('servers')->where('status', 'rented')->count(), 
            'location' => DB::table('location')->count()
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
