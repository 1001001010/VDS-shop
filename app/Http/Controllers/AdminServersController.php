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
        return view('components.admin.admin_server', ['server' => $server]);
    }
}
