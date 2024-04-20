<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BuyServersController extends Controller
{
    public function buy_server($time, $id) {
        $server = DB::table('servers')->where('id', '=', $id)->first();
        $user = Auth::user();
        $date = Carbon::now(); // current date
        $futureDate = $date->modify('+1 month');
        if ($time === 'hour') {
            $price = $server->price_hour;
        } elseif ($time === 'month') {
            $price = $server->price_month;
        }
        $data = [
            'user_id' => $user->id,
            'location_id' => $server->id,
            'price' => $time,
            'endDate' => $futureDate->date,
            'status' => 'active'
        ];
        dd($data);
    }
}
