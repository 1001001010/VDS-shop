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
        $rental = DB::table('rentals')->where('user_id', '=', $user->id)->where('status', '=', 'active')->first();
        $price = ($time === 'hour') ? $server->price_hour : $server->price_month;
        if ($user->balance < $price) {
            return redirect()->back()->with('success', 'Недостаточно средств');
        } elseif ($rental) {
            return redirect()->back()->with('success', 'У вас уже есть арендованный сервер');
        } else {
            return view('components.buy_servers', [
                'server' => $server, 
                'user' => $user, 
                'location' => DB::table('location')->where('id', '=', $server->location_id)->first(), 
                'time' => $time
            ]);
        }
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
        $formattedNowDate = Carbon::now()->format('Y-m-d H:i:s');
        
        $price = ($time === 'hour')? $server->price_hour : $server->price_month;
        if ($user->balance < $price) {
            return redirect()->route('profile')->with('success', 'Недостаточно средств');
        } else {
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
            // Данные для обновление таблицы заказов
            $rental_data = [
                'user_id' => $user->id,
                'server_id' => $server->id,
                'price' => $price,
                'endDate' => $formattedFutureDate,
                'status' => 'active',
                'duration' => $time,
                'created_at' => $formattedNowDate,
                'cpu' => $server->cpu,
                'ram' => $server->ram,
                'ssd' => $server->ssd,
                'oc' => $request->radio_oc,
                'panel' => $request->radio_po
            ];
            DB::table('rentals')->insert($rental_data);
            return redirect()->route('profile', [
                'count_rent' => DB::table('rentals')->where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->count(),
                'rents' => DB::table('rentals')->where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get()
            ]);
        }
    }
    public function mineServer(Request $request) {
        // dd($request);
        $randomIp = rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255);
        $date = Carbon::now();
        $futureDate = ($request->term === 'hour') ? $date->addHours(1) : $date->addMonths(1);
        $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
        $formattedNowDate = Carbon::now()->format('Y-m-d H:i:s');
        $summ = ($request->CPU*150)+($request->RAM*150)+($request->SSD*2.5); //Формирирование цены сервера
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP1234567890'; 
        $size = strlen($chars) - 1; 
        $length = 10;
        $password = ''; 
        while($length--) {
            $password .= $chars[random_int(0, $size)]; 
        };
        if ($request->term == 'hour') {
            $price_hour = $summ;
            $price_month = 0;
        } else {
            $price_hour = 0;
            $price_month = $summ;
        };

        $server_data = [
            'id' => $date,
            'number' => $date,
            'location_id' => $request->radio_region,
            'cpu' => $request->CPU,
            'ram' => $request->RAM,
            'ssd' => $request->SSD,
            'ip' => $randomIp,
            'user_name' => 'admin',
            'user_pass' => $password,
            'price_month' => $price_month,
            'price_hour' => $price_month,
            'status' => 'active',
            'type' => 'temporary'
        ];
        $rental_data = [
            'user_id' => Auth::user()->id, 
            'server_id' => $date,
            'price' => $summ,
            'endDate' => $formattedFutureDate,
            'status' => 'active',
            'duration' => $request->term,
            'created_at' => $formattedNowDate,
            'cpu' => $request->CPU,
            'ram' => $request->RAM,
            'ssd' => $request->SSD,
            'oc' => $request->system,
            'panel' => $request->panel
        ];
        DB::table('rentals')->insert($rental_data);
        return redirect()->route('profile', [
            'count_rent' => DB::table('rentals')->where('user_id', Auth::user()->id)->whereIn('status', ['completed', 'active'])->count(),
            'rents' => DB::table('rentals')->where('user_id', Auth::user()->id)->whereIn('status', ['completed', 'active'])->get()
        ]);
    }
}