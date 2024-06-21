<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Helpers\AppHelper;
use App\Models\{Server, Rental, Location, User};

class BuyServersController extends Controller
{
    public function buy_server($time, $region, $server_id) {
        /**
        * просмотр информации о аренде (Время аренды, регион расположения сервера, ID сервера)  
        *
        * return страница components.buy_servers ($users - список пользователей)
        */
        $user = Auth::user();
        $server = Server::where('id', $server_id)->first();
        $rental = Rental::where('user_id', $user->id)->where('status', 'active')->first();
        $price = ($time === 'hour') ? $server->price_hour : $server->price_month;
        if ($user->balance < $price) {
            return redirect()->back()->with('success', 'Недостаточно средств');
        } elseif ($rental) {
            return redirect()->back()->with('success', 'У вас уже есть арендованный сервер');
        } else {
            return view('components.buy_servers', [
                'server' => $server, 
                'user' => $user, 
                'location' => Location::where('id', '=', $server->location_id)->first(), 
                'time' => $time
            ]);
        }
    }        

    public function confirm_rental(Request $request, $time, $region, $server_id) {
        /**
        * Подтверждение аренды сервера (HTTP запрос, время аренды, регион расположения сервера, ID сервера)
        *
        * return страница components.profile ($rents - список аренд)
        */
        $validatedData = $request->validate([
            'radio_oc' => 'required|string',
            'radio_po' => 'required|string',
        ]);
        $user = Auth::user();
        $server = Server::where('id', $server_id)->first();
        $formattedFutureDate = AppHelper::instance()->get_future($term = $time);
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
            User::where('id', $user->id)->update($user_data); 
            // Данные для обновления таблицы servers
            $server_data = [
                'oc' => $request->radio_oc,
                'panel' => $request->radio_po,
                'status' => 'active',
                'rental_until' => $formattedFutureDate
            ];
            Server::where('id', $server_id)->update($server_data);
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
            Rental::create($rental_data);
            return redirect()->route('profile', [
                // 'count_rent' => Rental::where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->count(),
                'rents' => Rental::where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get()
            ]);
        }
    }
    public function mineServer(Request $request) {
        /**
        * Сборка своего сервера (HTTP запрос)
        *
        * return страница components.profile ($rents - список аренд)
        */
        $summ = ($request->CPU*150)+($request->RAM*150)+($request->SSD*2.5); //Формирирование цены сервера
        if (Auth::user()->balance < $summ) {
            return redirect()->back()->with('success', 'Недостаточно средств');
        } else {
            $randomIp = rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255);
            $unix = time();
            $formattedFutureDate = AppHelper::instance()->get_future($term = $request->term);
            $formattedNowDate = Carbon::now()->format('Y-m-d H:i:s');
            $password = AppHelper::instance()->generate_password();
    
            if ($request->term == 'hour') {
                $price_hour = $summ;
                $price_month = 0;
            } else {
                $price_hour = 0;
                $price_month = $summ;
            };
    
            $server_data = [
                'number' => $unix,
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
            Server::insert($server_data);
            $server = Server::where('number', $unix)->first();
            $rental_data = [
                'user_id' => Auth::user()->id, 
                'server_id' => $server->id,
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
            Rental::create($rental_data);
            return redirect()->route('profile', [
                'rents' => Rental::where('user_id', Auth::user()->id)->whereIn('status', ['completed', 'active'])->get()
            ]);
        }
    }
}