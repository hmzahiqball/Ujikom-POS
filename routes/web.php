<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\KasirDashboardController;
use App\Http\Controllers\KasirTransaksiController;
use App\Http\Controllers\KasirDataTableController;
use App\Http\Controllers\KasirDataTransaksiController;
use App\Http\Controllers\KasirDataMemberController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataProdukController;
use App\Http\Controllers\AdminDataPetugasController;
use App\Http\Controllers\AdminDataLaporanPenjualanController;
use App\Http\Controllers\AdminDataMemberController;
use App\Http\Controllers\AdminDataSupplierController;
use App\Http\Controllers\AdminDataKategoriProdukController;
use App\Http\Controllers\AdminDataLaporanStokController;
use App\Http\Controllers\AdminDataShiftController;
use App\Http\Controllers\AdminDataAbsensiController;
use App\Http\Controllers\AdminDataRiwayatPenjualanController;


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

Route::get('/', [LoginController::class, 'index']);

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout']);

// Route grup untuk admin
Route::middleware(['admin'])->group(function () {

    // Dashboard
    Route::resource('admin/dashboard', AdminDashboardController::class);

    // Master Data
    Route::resource('admin/dataproduk', AdminDataProdukController::class);
    Route::post('admin/dataproduk/add', [AdminDataProdukController::class, 'store']);
    Route::post('admin/dataproduk/update', [AdminDataProdukController::class, 'update']);
    Route::post('admin/dataproduk/delete', [AdminDataProdukController::class, 'destroy'])->name('admin.dataproduk.delete');

    Route::resource('admin/datakategori', AdminDataKategoriProdukController::class);
    Route::post('admin/datakategori/add', [AdminDataKategoriProdukController::class, 'store']);
    Route::post('admin/datakategori/update', [AdminDataKategoriProdukController::class, 'update']);
    Route::post('admin/datakategori/delete', [AdminDataKategoriProdukController::class, 'destroy'])->name('admin.datakategori.delete');

    Route::resource('admin/datapetugas', AdminDataPetugasController::class);
    Route::post('admin/datapetugas/add', [AdminDataPetugasController::class, 'store']);
    Route::post('admin/datapetugas/update', [AdminDataPetugasController::class, 'update']);
    Route::post('admin/datapetugas/delete', [AdminDataPetugasController::class, 'destroy'])->name('admin.datapetugas.delete');

    Route::resource('admin/datasupplier', AdminDataSupplierController::class);
    Route::post('admin/datasupplier/add', [AdminDataSupplierController::class, 'store']);
    Route::post('admin/datasupplier/update', [AdminDataSupplierController::class, 'update']);
    Route::post('admin/datasupplier/delete', [AdminDataSupplierController::class, 'destroy'])->name('admin.datasupplier.delete');

    Route::resource('admin/datamember', AdminDataMemberController::class);
    Route::post('admin/datamember/add', [AdminDataMemberController::class, 'store']);
    Route::post('admin/datamember/update', [AdminDataMemberController::class, 'update']);
    Route::post('admin/datamember/delete', [AdminDataMemberController::class, 'destroy'])->name('admin.datamember.delete');

    // Karyawan
    Route::resource('admin/datashift', AdminDataShiftController::class);
    Route::post('admin/datashift/add', [AdminDataShiftController::class, 'store']);
    Route::post('admin/datashift/update', [AdminDataShiftController::class, 'update']);
    Route::post('admin/datashift/delete', [AdminDataShiftController::class, 'destroy'])->name('admin.datashift.delete');

    Route::resource('admin/dataabsensi', AdminDataAbsensiController::class);
    Route::post('admin/dataabsensi/add', [AdminDataAbsensiController::class, 'store']);
    Route::post('admin/dataabsensi/delete', [AdminDataAbsensiController::class, 'destroy'])->name('admin.dataabsensi.delete');

    // Data Transaksi
    Route::resource('admin/datapenjualan', AdminDataRiwayatPenjualanController::class);
    Route::post('admin/datapenjualan/delete', [AdminDataRiwayatPenjualanController::class, 'destroy'])->name('admin.datapenjualan.delete');

    // Laporan
    Route::resource('admin/datastokproduk', AdminDataLaporanStokController::class);
    Route::post('admin/datastokproduk/delete', [AdminDataLaporanStokController::class, 'destroy'])->name('admin.datastokproduk.delete');

    Route::resource('admin/datalaporanpenjualan', AdminDataLaporanPenjualanController::class);
});

// Route grup untuk kasir
Route::middleware(['kasir'])->group(function () {
    Route::resource('kasir/dashboard', KasirDashboardController::class);
    Route::resource('kasir/transaksi', KasirTransaksiController::class);
    Route::post('kasir/transaksi/add', [KasirTransaksiController::class, 'store']);
    Route::get('kasir/riwayattransaksi/print', [KasirTransaksiController::class, 'printInvoice'])->name('print.invoice');

    Route::post('kasir/datamember/add', [KasirDataMemberController::class, 'store']);
    Route::resource('kasir/dataproduk', KasirDataTableController::class);
    Route::resource('kasir/riwayattransaksi', KasirDataTransaksiController::class);
});




