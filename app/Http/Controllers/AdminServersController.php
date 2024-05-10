<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use App\Models\{Server, Location};

class AdminServersController extends Controller
{
    public function all_servers() {
        $servers = Server::all();
        $locations = [];
        foreach ($servers as $server) {
            $locations[$server->id] = Location::where('id', '=', $server->location_id)->first();
        }
        return view('components.admin.admin_servers', [
            'servers' => $servers,
            'locations' => $locations,
            'location_list' => Location::all()
        ]);
    }
    public function server($id) {
        $server = Server::where('id', '=', $id)->first();
        $location = Location::where('id', '=', $server->location_id)->first();
        return view('components.admin.admin_server', [
            'server' => $server,
            'locations' => Location::all(),
            'server_location' => $location
        ]);
    }
    public function new_server(Request $request) {
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
        $server = Server::where('id', $id)->first();
        $password = AppHelper::instance()->generate_password();
        Server::where('id', $id)->update(['user_pass' => $password]);
        
        return redirect()->back()->with('success', 'Пароль успешно сброшен');
    }
    public function search_servers(Request $request){
        $word = $request->search_servers;
        $servers = Server::all();
        $locations = [];
        foreach ($servers as $server) {
            $locations[$server->id] = Location::where('id', '=', $server->location_id)->first();
        }
        return view('components.admin.admin_servers', [
            'servers' => Server::where('number', 'like', "%{$word}%")->orWhere('ip', 'like', "%{$word}%")->orderBy('id')->get(),
            'locations' => $locations,
            'location_list' => Location::all()
        ]);
    }
    public function editPrice(Request $request, $id){
        $validatedData = $request->validate([
            'price_month' => 'required|integer',
            'price_hours' => 'required|integer',
        ]);
        Server::where('id', $id)->update(['price_month' => $request->price_month, 'price_hour' => $request->price_hours]); #Стоит еще подумать
        return redirect()->back()->with('success', 'Цена успешно изменена');
    }
    public function editLogin(Request $request, $id){
        $validatedData = $request->validate([
            'username' => 'required',
        ]);
        Server::where('id', $id)->update(['user_name' => $request->username]);
        return redirect()->back()->with('success', 'username успешно изменен');
    }
    public function editIP(Request $request, $id){
        $validatedData = $request->validate([
            'IP' => 'required|ip',
        ]);;
        Server::where('id', $id)->update(['ip' => $request->IP]);
        return redirect()->back()->with('success', 'IP успешно изменен');
    }

    public function editType(Request $request, $id) {
        Server::where('id', $id)->update(['type' => $request->server_type]);
        return redirect()->back()->with('success', 'Тип сервера успешно изменен');
    }

    public function editLocation(Request $request, $id) {
        Server::where('id', $id)->update(['location_id' => $request->location_id]);
        return redirect()->back()->with('success', 'Локация сервера успешно изменена');
    }
}
 