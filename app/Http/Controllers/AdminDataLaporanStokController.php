<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminDataLaporanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Ambil data customer dari API eksternal
            $response = Http::get('http://localhost:1111/api/laporanstok/');

            if ($response['status'] === 200) {
                $get_laporan = $response['data']; // ambil array data dari JSON
            } else {
                $get_laporan = []; // fallback kosong kalau gagal
            }

            return view('admin.datalaporanstok', [
                'laporanstok' => $get_laporan
            ]);
        } catch (\Exception $e) {
            return view('admin.datalaporanstok', [
                'laporanstok' => [],
                'error' => 'Gagal mengambil data laporan stok produk'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id_deleteLaporan' => 'required|numeric',
        ]);

        $idLaporan = $request->id_deleteLaporan;

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->delete("http://localhost:1111/api/laporanstok/{$idLaporan}");

            if ($response['status'] === 200) {
                return redirect('admin/datastokproduk')->with('success', 'Laporan berhasil dihapus.');
            }

            return redirect()->back()->with('error', 'Gagal menghapus laporan: ' . $response->json()['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus laporan: ' . $e->getMessage());
        }
    }
}
