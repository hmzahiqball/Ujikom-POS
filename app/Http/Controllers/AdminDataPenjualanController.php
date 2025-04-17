<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
