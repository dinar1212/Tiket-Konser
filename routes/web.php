<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingTiketController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\CheckinController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tiket' , [TiketController::class, 'index2']);
// Route::get('/tiket/{id}', [ShopController::class, 'detailproduct']);
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/checkin', TiketController::class)->middleware('auth');
Route::get('/laporan' , [TiketController::class, 'index3'])->middleware('auth');
// Route::resource('/admin/checkin', CheckinController::class);
