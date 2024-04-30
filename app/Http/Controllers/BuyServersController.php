<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BuyServersController extends Controller
{
    public function buy_server($time, $region, $server_id) {
        $user = Auth::user();
        $server = DB::table('servers')->where('id', '=', $server_id)->first();
        $price = ($time === 'hour') ? $server->price_hour : $server->price_month;
        if ($user->balance < $price) {
            $message = 'Недостаточно средств';
            return redirect()->back()->with('success', $message);
        }

        $date = Carbon::now();
        $futureDate = ($time === 'hour') ? $date->addHours(1) : $date->addMonths(1);
        $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
        $now = Carbon::now();
        $location = DB::table('location')->where('id', '=', $server->location_id)->first();

        return view('components.buy_servers', ['server' => $server, 'user' => $user, 'location' => $location, 'time' => $time]);
    }        

    public function confirm_rental(Request $request, $time, $region, $server_id) {
        // Параметры функции: 
        // dd($request->radio_oc); -> ОС дедика
        // dd($request->radio_po); -> Доп. ПО дедика
        // dd($time); -> Срок аренды дедика
        // dd($region); -> Регион расположение дедика
        // dd($server_id); -> ID дедика
        $user = Auth::user();
        $server = DB::table('servers')->where('id', '=', $server_id)->first();
        $date = Carbon::now();
        $futureDate = ($time === 'hour') ? $date->addHours(1) : $date->addMonths(1);
        $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
        
        $price = ($time === 'hour')? $server->price_hour : $server->price_month;
        if ($user->balance < $price) {
        $message = 'Недостаточно средств';
        return redirect()->route('profile')->with('success', $message);
        } elseif ($user->balance >= $price) {
            // Данные для обновления таблицы пользователей
            $user_data = [
                'balance' => $user->balance - $price,
                'total_servers' => $user->total_servers + 1
            ];
            DB::table('users')->where('id', $user->id)->update($user_data); 
            // Данные для обновления таблицы servers
            $server_data = [
                'oc' => $request->radio_oc,
                'panel' => $request->radio_po,
                'status' => 'active',
                'rental_until' => $formattedFutureDate
            ];
            DB::table('servers')->where('id', $server_id)->update($server_data);
        } else {
            $message = 'Непредвиденная ошибка! Попробуйте позже';
            return redirect()->route('profile')->with('success', $message);
        }
        // else {
        //     $server_data = [
        //         'oc' => $request->radio_oc,
        //         'panel' => $request->radio_po
        //     ];
        //     DB::table('servers')->where('id', $server_id)->update($server_data); 
        //     $date = Carbon::now();
        //     $futureDate = ($time === 'hour') ? $date->addHours(1) : $date->addMonths(1);
        //     $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
        //     $now = Carbon::now();
        
        //     $data = [
        //         'user_id' => $user->id,
        //         'server_id' => $server->id,
        //         'price' => $price,
        //         'endDate' => $formattedFutureDate,
        //         'status' => 'not paid',
        //         'duration' => $time,
        //         'created_at' => $now->format('Y-m-d H:i:s')
        //     ];
            
        //     DB::table('rentals')->insert($data);
        //     $rental = DB::table('rentals')->where('endDate', '=', $formattedFutureDate)->first();
        //     // $location = DB::table('location')->where('id', '=', $server->location_id)->first();
        //     // return view('components.buy_servers', ['server' => $server, 'user' => $user, 'rental' => $rental, 'location'=>$location]);
        //     return view('components.profile');
    }
}