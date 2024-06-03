<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{User, Rental};
use App\Http\Middleware\IsAdmin;

class AdminUserController extends Controller
{
    public function __construct() {
        $this->middleware([IsAdmin::class]);
    }

    public function all_users() {
        return view('components.admin.admin_users', [
            'users' => User::all()
        ]);
    }
    public function user($id) {
        $user = User::where('id', $id)->first();
        return view('components.admin.admin_user', [
            'user' => $user,
            'rents' => Rental::where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get()
        ]);
    }
    public function ban_user($id) {
        $user = User::where('id', '=', $id)->first();
        if($user) {
            $ban = ($user->ban == 1) ? 0 : 1;
            User::where('id', $id)->update([
                'ban' => $ban
            ]);
            $message = $ban == 1 ? 'Пользователь был заблокирован' : 'Пользователь был разблокирован';
            return redirect()->back()->with('success', $message);
        }
        return redirect()->back()->with('error', 'Пользователь не найден');
    }

    public function make_admin($id) {
        $user = User::where('id', '=', $id)->first();
        if($user) {
            $is_admin = ($user->is_admin == 1) ? 0 : 1;
            User::where('id', $id)->update([
                'is_admin' => $is_admin
            ]);
            $message = $is_admin == 1 ? 'Пользователь назначен администратором' : 'Пользователь больше не администратор';
            return redirect()->back()->with('success', $message);
        }
        return redirect()->back()->with('error', 'Пользователь не найден');
    }

    public function search_users(Request $request) {
        $word = $request->search_users;
        return view('components.admin.admin_users', [
            'users' => User::where('email', 'LIKE', "%{$word}%")->orderBy('email')->get()
        ]);
    }
    public function addbalance(Request $request, $id)
    {
        User::where('id', $id)->increment('balance', $request->input('number'));
        $user = USer::where('id', '=', $id)->first();
        return redirect()->back()->with('success', 'Балланс успешно выдан');
    }
    public function reworkbalance(Request $request, $id)
    {
        User::where('id', $id)->update(['balance' => $request->input('number')]);
        $user = USer::where('id', '=', $id)->first();
        return redirect()->back()->with('success', 'Балланс успешно изменен');
    }
}
