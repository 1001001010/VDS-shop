<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

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

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();


Route::controller(App\Http\Controllers\HomeController::class)->group(function () { 
    Route::get('/profile','index')->name('profile');
});

Route::controller(App\Http\Controllers\IndexController::class)->group(function () {
    Route::get('/','index')->name('index');
});
Route::controller(App\Http\Controllers\AdminUserController::class)->group(function () {
    Route::get('/admin/users','all_users')->name('admin_AllUsers')->middleware([admin::class]);
    Route::get('/admin/user/{id}','user')->name('admin_user')->middleware([admin::class]);
});