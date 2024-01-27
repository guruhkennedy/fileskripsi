<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GedungController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\ReservasiController as AdminReservasiController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\RekeningController as AdminRekeningController;
use App\Http\Controllers\PembatalanController;
use App\Http\Controllers\Admin\PembatalanController as AdminPembatalanController;
use App\Http\Controllers\Karyawan\HomeController as KaryawanHomeController;
use App\Http\Controllers\Karyawan\ReservasiController as KaryawanReservasiController;
use App\Http\Controllers\Karyawan\PembatalanController as KaryawanPembatalanController;
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

Route::get('/', [ReservasiController::class, 'index'])->name('home');

//route biasa
Route::get('reservasi', [ReservasiController::class, 'reservasi']);
Route::get('cari', [ReservasiController::class, 'search']);
Route::post('booking', [ReservasiController::class, 'booking']);
Route::get('order', [ReservasiController::class, 'order']);
Route::get('gallery', [GaleriController::class, 'index']);
Route::post('booking/cancel', [ReservasiController::class, 'cancel'])->name('cancel');
Route::post('booking/payment', [ReservasiController::class, 'payment'])->name('payment');
Route::post('booking/proof', [ReservasiController::class, 'proof'])->name('proof');
Route::get('syarat-ketentuan', [SiteController::class, 'syaratUser']);
Route::get('about', [SiteController::class, 'aboutUser']);
Route::get('jadwal', [ReservasiController::class, 'cekGedungTersedia']);
Route::get('cek-reservasi', [ReservasiController::class, 'cek_reservasi']);
Route::post('cek-reservasi', [ReservasiController::class, 'order'])->name('cek-reservasi');
Route::get('pembatalan', [PembatalanController::class, 'index'])->name('pembatalan-user');
Route::post('pembatalan', [PembatalanController::class, 'pembatalan'])->name('user-pembatalan.store');
Route::get('cetak_invoice', [ReservasiController::class, 'cetak_invoice'])->name('cetak_invoice');

//route login, gatau jangan diubah
// Auth::routes();

// Route::group(['prefix' => 'admin'], function () {
Route::auth();
// });

//route admin lur
Route::middleware(['is_admin', 'auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');
        Route::get('home', [HomeController::class, 'index'])->name('admin.home');
        Route::resource('gedung', GedungController::class);
        Route::resource('user', UserController::class);
        Route::resource('reservasi', AdminReservasiController::class);
        Route::post('reservasi/{reservasi}/proses', AdminReservasiController::class . '@proses')->name('reservasi.proses');
        Route::post('reservasi/{reservasi}/proses_upload_ulang', AdminReservasiController::class . '@proses_upload_ulang')->name('reservasi.proses_upload_ulang');
        Route::resource('galeri', AdminGaleriController::class);
        Route::resource('bank', BankController::class);
        Route::resource('rekening', AdminRekeningController::class);
        Route::resource('pembatalan', AdminPembatalanController::class);
        Route::patch('pembatalan/{pembatalan}/terima', [AdminPembatalanController::class, 'terima'])->name('pembatalan.terima');
        Route::patch('pembatalan/{pembatalan}/tolak', [AdminPembatalanController::class, 'tolak'])->name('pembatalan.tolak');

        Route::get('website', [SiteController::class, 'index'])->name('admin.website');
        Route::patch('website/{site}', [SiteController::class, 'update'])->name('admin.website.update');
        Route::get('syarat-ketentuan', [SiteController::class, 'syarat'])->name('sk.website');
        Route::patch('syarat-ketentuan/{site}', [SiteController::class, 'syaratUpdate'])->name('sk.website.update');
    });
});

Route::middleware(['is_karyawan', 'auth'])->group(function () {
    Route::prefix('karyawan')->group(function () {
        Route::get('/', [KaryawanHomeController::class, 'index'])->name('karyawan.index');
        Route::get('home', [KaryawanHomeController::class, 'index'])->name('karyawan.home');
        Route::name('karyawan.')->group(function () {
            Route::resource('reservasi', KaryawanReservasiController::class);
            Route::resource('pembatalan', KaryawanPembatalanController::class);
        });
        Route::post('reservasi/{reservasi}/proses', KaryawanReservasiController::class . '@proses')->name('karyawan.reservasi.proses');
        Route::post('reservasi/{reservasi}/proses_upload_ulang', KaryawanReservasiController::class . '@proses_upload_ulang')->name('karyawan.reservasi.proses_upload_ulang');
        Route::patch('pembatalan/{pembatalan}/terima', [KaryawanPembatalanController::class, 'terima'])->name('karyawan.pembatalan.terima');
        Route::patch('pembatalan/{pembatalan}/tolak', [KaryawanPembatalanController::class, 'tolak'])->name('karyawan.pembatalan.tolak');
    });
});
