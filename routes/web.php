<?php

use Illuminate\Support\Facades\Route;
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
    Route::get('/profile','profile')->name('profile')->middleware([IsBan::class, 'auth']);
    Route::get('/', function () { return redirect()->route('index', ['region' => 'Moscow']); })->name('home')->middleware([IsBan::class]);
    Route::get('/{region}','index')->name('index')->middleware([IsBan::class])->defaults('region', 'Moscow');
    Route::get('/servers/{region}', 'servers')->name('servers')->middleware([IsBan::class])->defaults('region', 'Moscow');
    Route::get('/profile/rentals/{rentals_id}', 'ProfileRentals')->name('profile_rentals')->middleware([IsBan::class]);
});
Route::controller(App\Http\Controllers\AdminUserController::class)->group(function () {
    Route::get('/admin/users','all_users')->name('admin_AllUsers');
    Route::get('/admin/user/{id}','user')->name('admin_user');
    Route::get('/admin/users/search','search_users')->name('admin_users_search');
    Route::get('/admin/user/ban/{id}','ban_user')->name('ban_user');
    Route::get('/admin/user/make_admin/{id}','make_admin')->name('make_admin');
    Route::post('/admin/user/addbalance/{id}', 'addbalance')->name('addbalance');
    Route::post('/admin/user/reworkbalance/{id}', 'reworkbalance')->name('reworkbalance');
});

Route::controller(App\Http\Controllers\AdminServersController::class)->group(function () {
    Route::get('/admin/servers','all_servers')->name('admin_AllServers');
    Route::get('/admin/server/{id}','server')->name('admin_server');
    Route::get('/admin/new_ServerPassword/{id}','new_ServerPassword')->name('new_ServerPassword');
    Route::get('/admin/servers/search','search_servers')->name('admin_servers_search');
    Route::post('/admin/server/{id}/editPrice','editPrice')->name('admin_serverPrice');
    Route::post('/admin/new_server', 'new_server')->name('admin_NewServer');
    Route::post('/admin/server/{id}/editLogin', 'editLogin')->name('admin_editLogin');
    Route::post('/admin/server/{id}/editIP', 'editIP')->name('admin_editIP');
    Route::post('/admin/server/${id}/editType', 'editType')->name('admin_editType');
    Route::post('/admin/server/${id}/editLocation', 'editLocation')->name('admin_editLocation');
    Route::post('/admin/server/${id}/editConfiguration', 'editConfiguration')->name('admin_editConfiguration');
});

Route::controller(App\Http\Controllers\AdminStatsController::class)->group(function () {
    Route::get('/admin/stats','stats')->name('admin_stats');
    Route::get('/admin/stats/downloadsLog','downloadLogs')->name('download_logs');
});

Route::controller(App\Http\Controllers\BuyServersController::class)->group(function () {
    Route::get('/buyServer/{time}/{region}/{server_id}','buy_server')->name('buyServers')->middleware([IsBan::class, 'auth']);
    Route::post('/confirmRental/{time}/{region}/{server_id}','confirm_rental')->name('confirmRental')->middleware([IsBan::class, 'auth']);
    Route::post('/buyMineServer','mineServer')->name('mineServer')->middleware([IsBan::class,'auth']);
});

Route::controller(App\Http\Controllers\LocationController::class)->group(function () {
    Route::post('/admin/deleteLocation','deleteLocation')->name('deleteLocation');
    Route::post('/admin/addLocation','addLocation')->name('addLocation');
});