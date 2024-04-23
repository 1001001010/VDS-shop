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
        if ($time === 'hour') {
            $price = $server->price_hour;
            if ($user->balance >= $price) {
                $date = Carbon::now();
                $futureDate = $date->addHours(1);
                $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
                $data = [
                    'user_id' => $user->id,
                    'server_id' => $server->id,
                    'price' => $price,
                    'endDate' => $futureDate,
                    'status' => 'active'
                ];
            
                DB::table('rentals')->insert($data);
            } else {
                $message = 'Недостаточно средств';
                return redirect()->back()->with('success', $message);
            }
        } elseif ($time === 'month') {
            $price = $server->price_month;
            if ($user->balance >= $price) {
                $date = Carbon::now();
                $futureDate = $date->addMonths(1);
                $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
                $data = [
                    'user_id' => $user->id,
                    'server_id' => $server->id,
                    'price' => $price,
                    'endDate' => $formattedFutureDate,
                    'status' => 'active'
                ];
                DB::table('rentals')->insert($data);
            } else {
                $message = 'Недостаточно средств';
                return redirect()->back()->with('success', $message);
            }
        }

        // $date = Carbon::now(); // current date
        // $futureDate = $date->modify('+1 month');
        // $data = [
        //     'user_id' => $user->id,
        //     'location_id' => $server->id,
        //     'price' => $time,
        //     'endDate' => $futureDate->format('Y-m-d H:i:s'),
        //     'status' => 'active'
        // ];
        // DB::table('servers')->insert($data);
        
    }
}
