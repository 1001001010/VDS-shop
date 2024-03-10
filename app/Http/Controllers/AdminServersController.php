<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminServersController extends Controller
{
    public function all_servers() {
        $servers = DB::table('servers')->get();
        return view('components.admin.admin_servers', ['servers' => $servers]);
    }
    public function server($id) {
        $server = DB::table('servers')->where('id', '=', $id)->first();
        $user = DB::table('users')->where('id', '=', $server->id_tenant)->first();
        if ($server->id_tenant != null ) {
            return view('components.admin.admin_server', ['server' => $server, 'user' => $user]);
        } else {
            return view('components.admin.admin_server', ['server' => $server, 'user' => null]);
        }
    }
    public function new_server($id) {
    }
    public function new_ServerPassword($id) {
        $server = DB::table('servers')->where('id', '=', $id)->first();
        $user = DB::table('users')->where('id', '=', $server->id_tenant)->first();
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP1234567890'; 
        $size = strlen($chars) - 1; 
        $length = 10;
        $password = ''; 
        while($length--) {
            $password .= $chars[random_int(0, $size)]; 
        }
        DB::table('servers')->where('id', $id)->update(['user_pass' => $password]);
        return redirect()->back();
        // if ($server->id_tenant != null ) {
        //     return view('components.admin.admin_server', ['server' => $server, 'user' => $user]);
        // } else {
        //     return view('components.admin.admin_server', ['server' => $server, 'user' => null]);
        // }
    }
}
