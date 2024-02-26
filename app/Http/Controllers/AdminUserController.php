<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function all_users() {
        $users = DB::table('users')->get();
        return view('components.admin.admin_users', ['users' => $users]);
    }
    public function user($id) {
        $user = DB::table('users')->where('id', '=', $id)->first();
        return view('components.admin.admin_user', ['user' => $user]);
    }
}
