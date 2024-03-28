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

    public function make_admin($id) {
        $user = DB::table('users')->where('id', '=', $id)->first();
        if($user) {
            $is_admin = ($user->is_admin == 1) ? 0 : 1;
            DB::table('users')->where('id', $id)->update([
                'is_admin' => $is_admin
            ]);
            $message = $is_admin == 1 ? 'Пользователь назначен администратором' : 'Пользователь больше не администратор';
            return redirect()->back()->with('success', $message);
        }
        return redirect()->back()->with('error', 'Пользователь не найден');
    }

    public function search_users(Request $request) {
        $word = $request->search_users;
        $users = DB::table('users')->where('email', 'LIKE', "%{$word}%")->orderBy('email')->get();
        return view('components.admin.admin_users', ['users' => $users]);
    }
    public function addbalance(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->increment('balance', $request->input('number'));
        $user = DB::table('users')->where('id', '=', $id)->first();
        $message = 'Балланс успешно выдан';
        return redirect()->back()->with('success', $message);
    }
    public function reworkbalance(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update(['balance' => $request->input('number')]);
        $user = DB::table('users')->where('id', '=', $id)->first();
    }
}
