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
        return view('components.admin.admin_stats', ['users' => $users, 'ban_user' => $ban_user, 'sum' => $sum]);
    }
}
