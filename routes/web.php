<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\LapanganController;

use Illuminate\Support\Facades\Route;

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

Route::get('/penyewaan', [PenyewaanController::class, 'index']);
Route::get('/lapangan', [LapanganController::class, 'create']);
Route::post('/lapangan/store', [LapanganController::class, 'store'])->name('store_lapangan');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal-index');
