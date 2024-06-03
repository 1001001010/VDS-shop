<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{User, Rental};
use App\Http\Middleware\IsAdmin;

class AdminUserController extends Controller
{
    public function __construct() {
        /**
        * Мидлвар проверки на админа
        */
        $this->middleware([IsAdmin::class]);
    }

    public function all_users() {
        /**
        * Отображение списка всех пользователей ()
        *
        * return страница components.admin.admin_users ($users - список пользователей)
        */
        return view('components.admin.admin_users', [
            'users' => User::all()
        ]);
    }
    public function user($id) {
        /**
        * Отображение списка всех пользователей (ID пользователя)
        *
        * return страница components.admin.admin_user ($users - информация о пользователе)
        */
        return view('components.admin.admin_user', [
            'user' => User::with('rentals')->where('id', $id)->first()
        ]);
    }
    public function ban_user($id) {
        /**
        * Блокировка пользователя (ID пользователя)
        *
        * return предыдущая страница с уведомлением
        */
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
        /**
        * назначение пользлвателя администратором (ID пользователя)
        *
        * return предыдущая страница с уведомлением
        */
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
        /**
        * Поиск пользователя по email (HTTP запрос)
        *
        * return список найденных пользователей
        */
        $word = $request->search_users;
        return view('components.admin.admin_users', [
            'users' => User::where('email', 'LIKE', "%{$word}%")->orderBy('email')->get()
        ]);
    }
    public function addbalance($id, Request $request) {
        /**
        * Выдача балланса пользователю (ID пользователя, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        User::where('id', $id)->increment('balance', $request->input('number'));
        $user = USer::where('id', '=', $id)->first();
        return redirect()->back()->with('success', 'Балланс успешно выдан');
    }
    public function reworkbalance($id, Request $request) {
        /**
        * Изменение балланса пользователя (ID пользователя, HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        User::where('id', $id)->update(['balance' => $request->input('number')]);
        $user = USer::where('id', '=', $id)->first();
        return redirect()->back()->with('success', 'Балланс успешно изменен');
    }
}
