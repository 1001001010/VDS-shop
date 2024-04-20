<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminServersController extends Controller
{
    public function all_servers() {
        $servers = DB::table('servers')->get();
        $location = DB::table('location')->get();
        return view('components.admin.admin_servers', ['servers' => $servers, 'locations' => $location]);
    }
    public function server($id) {
        $server = DB::table('servers')->where('id', '=', $id)->first();
        return view('components.admin.admin_server', ['server' => $server, 'user' => null]);
        // $user = DB::table('users')->where('id', '=', $server->id_tenant)->first();
        // if ($server->id_tenant != null ) {
        //     return view('components.admin.admin_server', ['server' => $server, 'user' => $user]);
        // } else {
        //     return view('components.admin.admin_server', ['server' => $server, 'user' => null]);
        // }
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
    
        DB::table('servers')->insert($data);
        $message = 'Сервер был успешно добавлен';
        return redirect()->back()->with('success', $message);
    
    }
    public function new_ServerPassword($id) {
        $server = DB::table('servers')->where('id', '=', $id)->first();
        // $user = DB::table('users')->where('id', '=', $server->id_tenant)->first();
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP1234567890'; 
        $size = strlen($chars) - 1; 
        $length = 10;
        $password = ''; 
        while($length--) {
            $password .= $chars[random_int(0, $size)]; 
        }
        DB::table('servers')->where('id', $id)->update(['user_pass' => $password]);
        $message = 'Пароль успешно сброшен';
        return redirect()->back()->with('success', $message);
        // if ($server->id_tenant != null ) {
        //     return view('components.admin.admin_server', ['server' => $server, 'user' => $user]);
        // } else {
        //     return view('components.admin.admin_server', ['server' => $server, 'user' => null]);
        // }
    }
    public function search_servers(Request $request){
        $word = $request->search_servers;
        $all_servers = DB::table('servers')->where('number', 'LIKE', "%{$word}%")->orWhere('ip', 'LIKE', "%{$word}%")->orderBy('id')->get();
        return view('components.admin.admin_servers', ['servers' => $all_servers]);
    }
    public function editPrice(Request $request, $id){
        $validatedData = $request->validate([
            'price_month' => 'required|integer',
            'price_hour' => 'required|integer',
        ]);
        DB::table('servers')->where('id', $id)->update(['price_month' => $request->price_month, 'price_hour' => $request->price_hours]); #Стоит еще подумать
        $message = 'Цена успешно изменена';
        return redirect()->back()->with('success', $message);
    }
    public function editLogin(Request $request, $id){
        $validatedData = $request->validate([
            'username' => 'required',
        ]);
        DB::table('servers')->where('id', $id)->update(['user_name' => $request->username]);
        $message = 'username успешно изменен';
        return redirect()->back()->with('success', $message);
    }
    public function editIP(Request $request, $id){
        $validatedData = $request->validate([
            'IP' => 'required|ip',
        ]);
        DB::table('servers')->where('id', $id)->update(['ip' => $request->IP]);
        $message = 'IP успешно изменен';
        return redirect()->back()->with('success', $message);
    }

    public function editType(Request $request, $id)
    {
        DB::table('servers')->where('id', $id)->update(['type' => $request->server_type]);
        $message = 'Тип сервера успешно изменен';
        return redirect()->back()->with('success', $message);
    }
}
