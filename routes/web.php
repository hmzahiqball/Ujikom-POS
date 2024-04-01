<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\KasirDashboardController;
use App\Http\Controllers\KasirTransaksiController;
use App\Http\Controllers\KasirDataTableController;
use App\Http\Controllers\KasirDataTransaksiController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataProdukController;
use App\Http\Controllers\AdminDataPetugasController;
use App\Http\Controllers\AdminDataPenjualanController;
use App\Http\Controllers\AdminDataMemberController;

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

Route::get('/', function () {
    return view('login');
});

Route::post('login', [LoginController::class, 'login']);

Route::resource('kasir/dashboard', KasirDashboardController::class);
Route::resource('kasir/transaksi', KasirTransaksiController::class);
Route::resource('kasir/dataproduk', KasirDataTableController::class);
Route::resource('kasir/riwayattransaksi', KasirDataTransaksiController::class);

Route::resource('admin/dashboard', AdminDashboardController::class);
Route::resource('admin/dataproduk', AdminDataProdukController::class);
Route::resource('admin/datapetugas', AdminDataPetugasController::class);
Route::resource('admin/datapenjualan', AdminDataPenjualanController::class);
Route::resource('admin/datamember', AdminDataMemberController::class);


