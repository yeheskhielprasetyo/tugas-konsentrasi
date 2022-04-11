<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataDetailPesananController;
use App\Http\Controllers\DataPesananController;
use App\Http\Controllers\FormAddController;
use App\Http\Controllers\ShowDataBarangController;
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


Route::get('/login', [AuthController::class, 'index'])->name('login.login');
Route::get('/register', [AuthController::class, 'register'])->name('view.register');
Route::post('proses-login', [AuthController::class, 'proseslogin'])->name('proses-login.proseslogin');
Route::post('proses-register', [AuthController::class, 'prosesregister'])->name('proses-register.prosesregister');


Route::post('update-detail-pesanan', [DataDetailPesananController::class, 'updateDetailPesanan']);
Route::post('data-detail-pesanan/{id}', [DataDetailPesananController::class, 'store'])->name('data-detail-pesanan.store');
Route::get('detail-pesanan/{id}', [DataDetailPesananController::class, 'show'])->name('detail-pesanan.show');
Route::resource('/penjualan', FormAddController::class);
Route::resource('form', ShowDataBarangController::class);
Route::resource('data-pesanan', DataPesananController::class);
Route::post('data-pesanan/{id}', [DataPesananController::class, 'store'])->name('data-pesanan.store');
