<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDataPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_petugas = null;
        $get_kategori = DB::select('CALL sp_get_datakategori()'); //mengambil data kategori dari database melalui stored procedure di mysql
        $get_penjualanperiode = DB::select('CALL sp_get_datatransaksi(?, ?)', [date('Y-m-d'), $id_petugas]);
        return view('admin.datapenjualan' , ['penjualan' => $get_penjualanperiode, 'kategori' => $get_kategori]);
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
    public function destroy(Request $request)
    {
        // Ambil semua data yang dikirimkan oleh formulir
        $id_transaksi = $request->input('id_deletepenjualan');

        // Panggil stored procedure untuk update
        DB::statement("CALL sp_delete_datapenjualan(?)", array(
            $id_transaksi,
        ));

        return redirect('admin/datapenjualan');
    }
}
