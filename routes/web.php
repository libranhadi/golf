<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SewaController;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\LapanganController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PenyewaanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\TransaksiController;

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
})->name('welcome');

// Admin

Route::prefix('dashboard')->namespace('Admin')->group(function(){

// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('Admin')->group(function () {
    
// admin-lapangan
Route::get('lapangan', [LapanganController::class, 'index'])->name('admin-lapangan');
Route::get('create-lapangan', [LapanganController::class, 'create'])->name('admin-create-lapangan');
Route::post('/lapangan/store', [LapanganController::class, 'store'])->name('admin-store-lapangan');
Route::get('edit-lapangan/{id}', [LapanganController::class, 'edit'])->name('admin-edit-lapangan');
Route::put('update-lapangan/{id}', [LapanganController::class, 'update'])->name('admin-update-lapangan');
Route::delete('delete-lapangan/{id}', [LapanganController::class, 'destroy'])->name('admin-destroy-lapangan');

// route admin-pelanggan
Route::get('pelanggan', [PelangganController::class, 'index'])->name('admin-pelanggan');
Route::get('create-pelanggan', [PelangganController::class, 'create'])->name('admin-create-pelanggan');
Route::post('store-pelanggan', [PelangganController::class, 'store'])->name('admin-store-pelanggan');
Route::get('edit-pelanggan/{id}', [PelangganController::class, 'edit'])->name('admin-edit-pelanggan');
Route::put('update-pelanggan/{id}', [PelangganController::class, 'update'])->name('admin-update-pelanggan');
Route::delete('delete-pelanggan/{id}', [PelangganController::class, 'destroy'])->name('admin-delete-pelanggan');

//route karywan pelanggan
Route::get('karyawan', [KaryawanController::class, 'index'])->name('admin-karyawan');
Route::get('create-karyawan', [KaryawanController::class, 'create'])->name('admin-create-karyawan');
Route::post('store-karyawan', [KaryawanController::class, 'store'])->name('admin-store-karyawan');
Route::get('edit-karyawan/{id}', [KaryawanController::class, 'edit'])->name('admin-edit-karyawan');
Route::put('update-karyawan/{id}', [KaryawanController::class, 'update'])->name('admin-update-karyawan');
Route::delete('delete-karyawan/{id}', [KaryawanController::class, 'destroy'])->name('admin-delete-karyawan');


// route penyewaan
Route::get('penyewaan', [PenyewaanController::class, 'index'])->name('admin-penyewaan');
Route::get('create-penyewaan', [PenyewaanController::class, 'create'])->name('admin-create-penyewaan');
Route::get('edit-penyewaan/{id}', [PenyewaanController::class, 'edit'])->name('admin-edit-penyewaan');
Route::put('update-penyewaan/{id}', [PenyewaanController::class, 'update'])->name('admin-update-penyewaan');
Route::delete('delete-penyewaan/{id}', [PenyewaanController::class, 'destroy'])->name('admin-delete-penyewaan');
Route::post('post-penyewaan', [PenyewaanController::class, 'store'])->name('admin-store-penyewaan');
Route::get('show-penyewaan/{id}', [PenyewaanController::class, 'show'])->name('admin-show-penyewaan');

//route jadwal
Route::get('jadwal', [JadwalController::class, 'index'])->name('admin-jadwal');
Route::get('create-jadwal', [JadwalController::class, 'create'])->name('admin-create-jadwal');
Route::post('store-jadwal', [JadwalController::class, 'store'])->name('admin-store-jadwal');
Route::get('edit-jadwal/{id}', [JadwalController::class, 'edit'])->name('admin-edit-jadwal');
Route::put('update-jadwal/{id}', [JadwalController::class, 'update'])->name('admin-update-jadwal');
Route::delete('delete-jadwal/{id}', [JadwalController::class, 'destroy'])->name('admin-delete-jadwal');

// route pembayaran
Route::get('pembayaran', [PembayaranController::class, 'index'])->name('admin-pembayaran');
Route::get('pembayaran-edit/{id}', [PembayaranController::class, 'edit'])->name('admin-edit-pembayaran');
Route::put('pembayaran-update/{id}', [PembayaranController::class, 'update'])->name('admin-update-pembayaran');
Route::delete('pembayaran-delete/{id}', [PembayaranController::class, 'delete'])->name('admin-delete-pembayaran');

Route::get('check-tanggal', [JadwalController::class, 'check'])->name('check-tanggal-pelanggan');

Route::get('laporan', [LaporanController::class, 'cetak'])->name('admin-laporan');
Route::get('laporan/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'range'])->name('range');

Route::get('print/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'print'])->name('cetak');
});

});



    
// });
// Route::resource('penyewaan', PenyewaanController::class);
Route::get('history/penyewaan/{id}', [SewaController::class, 'index'])->name('history-sewa');
Route::get('/pages/penyewaan', [SewaController::class, 'create'])->name('sewa-lapangan');
Route::post('/penyewaan', [SewaController::class, 'store'])->name('store-sewa');

Route::get('pages/detail/{id}', [SewaController::class, 'show'])->name('pages-detail');
Route::get('pages/jadwal', [PagesController::class, 'jadwal'])->name('jadwal-index');
Route::get('pages/lapangan', [PagesController::class, 'lapangan'])->name('lapangan-pages');
Route::get('profile/{name}', [ProfileController::class, 'edit'])->name('profile-account');
Route::put('profile/{id}',[ProfileController::class, 'update'])->name('profile-update');
Route::delete('batal-sewa/{id}', [SewaController::class, 'destroy'])->name('batal-sewa');
//bayar
Route::get('pages/bayar/{id}', [TransaksiController::class, 'create'])->name('pages-bayar');
Route::post('pages/bayar/{id}', [TransaksiController::class, 'store'])->name('store-bayar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



