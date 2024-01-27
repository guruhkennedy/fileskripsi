<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\WaktuController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return ResponseController::response(true, 'Welcome to API', []);
});

//rute http://localhost/api/jam
Route::get('/jam', [WaktuController::class, 'getJam']);

//rute get meja
Route::get('/meja', [MejaController::class, 'getMeja']);

//rute cek meja
Route::get('/cek-gedung', [ReservasiController::class, 'cekGedung']);


//callback
Route::post('/midtrans/callback', [CallbackController::class, 'callback_midtrans']);

Route::get('/rekening', [App\Http\Controllers\RekeningController::class, 'index_api']);
