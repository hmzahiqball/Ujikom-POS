<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AdminDataPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Ambil input tanggal, jika kosong maka set default awal dan akhir bulan ini
            $tanggal = $request->input('tanggal');
            if (!$tanggal) {
                $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
                $tanggal = $startDate . '_' . $endDate;
            }

            // Tidak ada idpetugas, jadi biarkan null (jangan dikirim ke API)
            $url = 'http://localhost:1111/api/laporanPenjualan';

            $response = Http::get($url, [
                'tanggal' => $tanggal
            ]);

            if ($response->successful()) {
                $data_penjualan = $response->json('data');
            } else {
                $data_penjualan = [];
            }

            return view('admin.datapenjualan', [
                'penjualan' => $data_penjualan,
                'tanggal' => $tanggal,
                'success' => $response['message']
            ]);
        } catch (\Exception $e) {
            return view('admin.datapenjualan', [
                'penjualan' => [],
                'tanggal' => [],
                'error' => 'Gagal mengambil data penjualan'
            ]);
        }
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
