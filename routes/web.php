<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsBan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();


Route::controller(App\Http\Controllers\HomeController::class)->group(function () { 
    Route::get('/','index')->name('index')->middleware([IsBan::class]);
    Route::get('/profile','profile')->name('profile')->middleware([IsBan::class, 'auth']);
    Route::get('/servers/{region}', 'servers')->name('servers')->middleware([IsBan::class]);
});
Route::controller(App\Http\Controllers\AdminUserController::class)->group(function () {
    Route::get('/admin/users','all_users')->name('admin_AllUsers')->middleware([admin::class]);
    Route::get('/admin/user/{id}','user')->name('admin_user')->middleware([admin::class]);
    Route::get('/admin/users/search','search_users')->name('admin_users_search')->middleware([admin::class]);
    Route::get('/admin/user/ban/{id}','ban_user')->name('ban_user')->middleware([admin::class]);
    Route::get('/admin/user/make_admin/{id}','make_admin')->name('make_admin')->middleware([admin::class]);
    Route::post('/admin/user/addbalance/{id}', 'addbalance')->name('addbalance')->middleware([admin::class]);
    Route::post('/admin/user/reworkbalance/{id}', 'reworkbalance')->name('reworkbalance')->middleware([admin::class]);
});

Route::controller(App\Http\Controllers\AdminServersController::class)->group(function () {
    Route::get('/admin/servers','all_servers')->name('admin_AllServers')->middleware([admin::class]);
    Route::get('/admin/server/{id}','server')->name('admin_server')->middleware([admin::class]);
    Route::get('/admin/new_ServerPassword/{id}','new_ServerPassword')->name('new_ServerPassword')->middleware([admin::class]);
    Route::get('/admin/servers/search','search_servers')->name('admin_servers_search')->middleware([admin::class]);
    Route::post('/admin/server/{id}/editPrice','editPrice')->name('admin_serverPrice')->middleware([admin::class]);
    Route::post('/admin/new_server', 'new_server')->name('admin_NewServer')->middleware([admin::class]);
    Route::post('/admin/server/{id}/editLogin', 'editLogin')->name('admin_editLogin')->middleware([admin::class]);
    Route::post('/admin/server/{id}/editIP', 'editIP')->name('admin_editIP')->middleware([admin::class]);
});

Route::controller(App\Http\Controllers\AdminStatsController::class)->group(function () {
    Route::get('/admin/stats','stats')->name('admin_stats')->middleware([admin::class]);
});