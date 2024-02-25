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
    Route::get('/home','index')->name('home');
});

Route::controller(App\Http\Controllers\IndexController::class)->group(function () {
    Route::get('/','index')->name('index');
});

// ->middleware([admin::class])