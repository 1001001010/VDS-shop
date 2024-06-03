<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use App\Models\{Server, Location};
use App\Http\Middleware\IsAdmin;

class AdminServersController extends Controller
{
    public function __construct() {
        /**
        * Мидлвар проверки на админа
        */
        $this->middleware([IsAdmin::class]);
    }

    public function all_servers() {
        /**
        * Отображение списка всех серверов и локаций
        *
        * return страница components.admin.admin_servers ($servers - список серверов, $locations - список локаций, $location_list - список всех локаций)
        */
        $servers = Server::all();
        $locations = [];
        foreach ($servers as $server) {
            $locations[$server->id] = Location::where('id', $server->location_id)->first();
        }
        return view('components.admin.admin_servers', [
            'servers' => $servers,
            'locations' => $locations,
            'location_list' => Location::all()
        ]);
    }
    public function server($id) {
        /**
        * Отображение информации о сервере (ID сервера)
        *
        * return страница components.admin.admin_server ($server - информация о сервере, $locations - список локаций)
        */
        $server = Server::with('location')->where('id', $id)->first();
        return view('components.admin.admin_server', [
            'server' => $server,
            'locations' => Location::all()
        ]);
    }
    public function new_server(Request $request) {
        /**
        * Добавление нового сервера (HTTP Запрос)
        *
        * return предыдущая страница с уведомлением
        */
        $validatedData = $request->validate([
            'cpu' => 'required|integer|min:1',
            'ram' => 'required|integer|min:1',
            'ssd' => 'required|integer|min:20',
            'ip' => 'required|ip',
            'username' => 'required|string',
            'password' => 'required|string',
            'price_month' => 'required|integer',
            'price_hour' => 'required|integer',
        ]);
        
        $data = [
            'number' => time(),
            'location_id' => $request->location,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'ssd' => $request->ssd,
            'ip' => $request->ip,
            'user_name' => $request->username,
            'user_pass' => $request->password,
            'price_month' => $request->price_month,
            'price_hour' => $request->price_hour,
            'status' => 'inactive',
        ];
    
        Server::create($data);
        return redirect()->back()->with('success', 'Сервер был успешно добавлен');
    
    }
    public function new_ServerPassword($id) {
        /**
        * Генерация нового пароля для сервера (ID сервера)
        *
        * return предыдущая страница с уведомлением
        */
        $server = Server::where('id', $id)->first();
        $password = AppHelper::instance()->generate_password();
        Server::where('id', $id)->update(['user_pass' => $password]);
        
        return redirect()->back()->with('success', 'Пароль успешно сброшен');
    }
    public function search_servers(Request $request){
        /**
        * Поиск сервера по номеру или IP (HTTP запрос)
        *
        * return страница components.admin.admin_servers ($servers - список серверов, $locations - список локаций, 
        *                                                 $location_list - список всех локаций)
        */
        $word = $request->search_servers;
        $servers = Server::all();
        $locations = [];
        foreach ($servers as $server) {
            $locations[$server->id] = Location::where('id', $server->location_id)->first();
        }
        return view('components.admin.admin_servers', [
            'servers' => Server::where('number', 'like', "%{$word}%")->orWhere('ip', 'like', "%{$word}%")->orderBy('id')->get(),
            'locations' => $locations,
            'location_list' => Location::all()
        ]);
    }
    public function editPrice($id, Request $request){
        /**
        * Изменение цены сервера (ID сервера, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        $validatedData = $request->validate([
            'price_month' => 'required|integer',
            'price_hours' => 'required|integer',
        ]);
        Server::where('id', $id)->update(['price_month' => $request->price_month, 'price_hour' => $request->price_hours]);
        return redirect()->back()->with('success', 'Цена успешно изменена');
    }
    public function editLogin($id, Request $request){
        /**
        * Изменение логина от учетной записи сервера (ID сервера, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        $validatedData = $request->validate([
            'username' => 'required',
        ]);
        Server::where('id', $id)->update(['user_name' => $request->username]);
        return redirect()->back()->with('success', 'username успешно изменен');
    }
    public function editIP($id, Request $request){
        /**
        * Изменение IP адресса сервера (ID сервера, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        $validatedData = $request->validate([
            'IP' => 'required|ip',
        ]);;
        Server::where('id', $id)->update(['ip' => $request->IP]);
        return redirect()->back()->with('success', 'IP успешно изменен');
    }

    public function editType($id, Request $request) {
        /**
        * Изменение типа сервера (ID сервера, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        Server::where('id', $id)->update(['type' => $request->server_type]);
        return redirect()->back()->with('success', 'Тип сервера успешно изменен');
    }

    public function editLocation($id, Request $request) {
        /**
        * Изменение локации сервера (ID сервера, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        Server::where('id', $id)->update(['location_id' => $request->location_id]);
        return redirect()->back()->with('success', 'Локация сервера успешно изменена');
    }
    public function editConfiguration($id, Request $request) {
        /**
        * Изменение конфигурации сервера (ID сервера, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        Server::where('id', $id)->update(['cpu' => $request->cpu, 'ram' => $request->ram, 'ssd' => $request->ssd]);
        return redirect()->back()->with('success', 'Конфигурация сервера успешно изменена');
    }
}
 