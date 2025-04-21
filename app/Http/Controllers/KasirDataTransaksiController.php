<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class KasirDataTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Ambil input tanggal, jika kosong maka set default awal dan akhir bulan ini
            $id_karyawan = session('tb_petugas') ? session('tb_petugas')['data_user']['id_karyawan'] : null;
            $tanggal = $request->input('tanggal');
            if (!$tanggal) {
                $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
                $tanggal = $startDate . '_' . $endDate;
            }

            // Tidak ada idpetugas, jadi biarkan null (jangan dikirim ke API)
            $url = 'http://localhost:1111/api/laporanPenjualan';
            // dd($url, $id_karyawan, $tanggal);

            $response = Http::get($url, [
                'idpetugas' => $id_karyawan,
                'tanggal' => $tanggal
            ]);

            if ($response->successful()) {
                $data_penjualan = $response->json('data');
            } else {
                $data_penjualan = [];
            }

            return view('kasir.datatransaksi', [
                'penjualan' => $data_penjualan,
                'tanggal' => $tanggal,
                'success' => $response['message']
            ]);
        } catch (\Exception $e) {
            return view('kasir.datatransaksi', [
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
    public function destroy(string $id)
    {
        //
    }
}
