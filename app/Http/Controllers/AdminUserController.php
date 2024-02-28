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
    public function ban_user($id) {
        $user = DB::table('users')->where('id', '=', $id)->first();
        if($user) {
            $ban = ($user->ban == 1) ? 0 : 1;
            DB::table('users')->where('id', $id)->update([
                'ban' => $ban
            ]);
            $message = $ban == 1 ? 'Пользователь был заблокирован' : 'Пользователь был разблокирован';
            return redirect()->back()->with('success', $message);
        }
        return redirect()->back()->with('error', 'Пользователь не найден');
    }
}
