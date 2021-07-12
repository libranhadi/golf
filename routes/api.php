<?php

use App\Http\Controllers\Admin\JadwalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('dashboard')->namespace('Admin')->group(function(){
// Route::get('check-tanggal', [JadwalController::class, 'check'])->name('check-tanggal-pelanggan');
// });
