<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BuyServersController extends Controller
{
    public function buy_server($time, $id) {
        $user = Auth::user();
        $server = DB::table('servers')->where('id', '=', $id)->first();
    
        $price = ($time === 'hour') ? $server->price_hour : $server->price_month;
        if ($user->balance < $price) {
            $message = 'Недостаточно средств';
            return redirect()->back()->with('success', $message);
        }
    
        $date = Carbon::now();
        $futureDate = ($time === 'hour') ? $date->addHours(1) : $date->addMonths(1);
        $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
        $now = Carbon::now();
    
        $data = [
            'user_id' => $user->id,
            'server_id' => $server->id,
            'price' => $price,
            'endDate' => $formattedFutureDate,
            'status' => 'not paid',
            'created_at' => $now->format('Y-m-d H:i:s')
        ];
    
        DB::table('rentals')->insert($data);

        
    }        
}