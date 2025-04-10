<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_petugas = null;
        $get_produk = DB::select('CALL sp_get_dataproduk()'); //mengambil data produk dari database melalui stored procedure di mysql
        $get_kategori = collect(DB::select('CALL sp_get_datakategori()')); //mengambil data kategori dari database melalui stored procedure di mysql
        $kategori_unik = $get_kategori->unique('id_kategori');
        $get_penjualanperiode = DB::select('CALL sp_get_datatransaksi(?, ?)', [date('Y-m-d'), $id_petugas]);

        // Hitung jumlah total data
        $total_data = count($get_penjualanperiode);
        $total_produk = count($get_produk);

        // Menghitung total nilai dari kolom total_transaksi
        $total_penjualan = collect($get_penjualanperiode)->sum('total_harga');

        return view('admin.dashboard' , ['penjualan' => $get_penjualanperiode, 'periodepenjualan' => $total_data, 'totalpenjualan' => $total_penjualan, 'totalproduk' => $total_produk, 'kategori' => $get_kategori, 'kategori_unik' => $kategori_unik]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
