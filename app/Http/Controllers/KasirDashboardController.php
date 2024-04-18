<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirDashboardController extends Controller
{
    public function index()
    {
        $nama_petugas = session()->get('tb_petugas')->nama_petugas;
        $get_produk = DB::select('CALL sp_get_dataproduk()'); //mengambil data produk dari database melalui stored procedure di mysql
        $get_kategori = DB::select('CALL sp_get_datakategori()'); //mengambil data kategori dari database melalui stored procedure di mysql
        $get_penjualanperiode = DB::select('CALL sp_getperiode_transaksidetail(?, ?)', [now(), $nama_petugas]);

        // Hitung jumlah total data
        $total_data = count($get_penjualanperiode);
        $total_produk = count($get_produk);

        // Menghitung total nilai dari kolom total_transaksi
        $total_penjualan = collect($get_penjualanperiode)->sum('total_transaksi');

        return view('kasir.dashboard' , ['penjualan' => $get_penjualanperiode, 'periodepenjualan' => $total_data, 'totalpenjualan' => $total_penjualan, 'kategori' => $get_kategori, 'totalproduk' => $total_produk]);
    }
}
