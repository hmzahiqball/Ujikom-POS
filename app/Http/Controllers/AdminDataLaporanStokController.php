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
            $response = Http::get('http://localhost:1111/api/laporanstok/');
        
            $groupedLaporan = [];
        
            if ($response['status'] === 200) {
                $data = $response['data'];
            
                foreach ($data as $item) {
                    $kode = $item['kode_laporan'];
                
                    if (!isset($groupedLaporan[$kode])) {
                        $groupedLaporan[$kode] = [
                            'kode_laporan' => $kode,
                            'alasan_perubahan' => $item['alasan_perubahan'],
                            'nama_karyawan' => $item['nama_karyawan'],
                            'created_at' => $item['created_at'],
                            'produk' => [],
                            'ids' => [], // untuk delete
                        ];
                    }
                
                    $groupedLaporan[$kode]['produk'][] = [
                        'nama_produk' => $item['nama_produk'],
                        'perubahan_stok' => $item['perubahan_stok']
                    ];
                
                    $groupedLaporan[$kode]['ids'][] = $item['id_laporan_stok'];
                }
            
            }
        
            return view('admin.datalaporanstok', [
                'laporanstok' => array_values($groupedLaporan)
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

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            Http::delete("http://localhost:1111/api/laporanstok/$id");
        }

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
