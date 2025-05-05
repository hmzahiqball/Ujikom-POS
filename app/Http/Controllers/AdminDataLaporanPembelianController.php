<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AdminDataLaporanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    try {
        $tahun = $request->input('tahun', now()->year);
        session(['tahun' => $tahun]);

        $startDate = Carbon::createFromDate($tahun, 1, 1)->format('Y-m-d');
        $endDate = Carbon::createFromDate($tahun, 12, 31)->format('Y-m-d');
        $tanggal = $startDate . '_' . $endDate;

        $url = 'http://localhost:1111/api/laporanPembelian';

        $response = Http::get($url, [
            'tanggal' => $tanggal
        ]);

        if ($response->successful()) {
            $data_pembelian = $response->json('data');

            $totalKuantitas = 0;
            $totalPengeluaran = 0;
            $produkTerbanyak = [];
            $supplierTerbanyak = [];
            $pembelianPerBulan = [];

            foreach ($data_pembelian as $pembelian) {
                $totalPengeluaran += (int) $pembelian['total_harga'];

                $supplierNama = $pembelian['supplier']['nama_suppliers'] ?? 'Tidak Diketahui';
                $supplierTerbanyak[$supplierNama] = ($supplierTerbanyak[$supplierNama] ?? 0) + 1;

                $bulan = Carbon::parse($pembelian['tanggal_pembelian'])->format('Y-m');
                $pembelianPerBulan[$bulan] = ($pembelianPerBulan[$bulan] ?? 0) + (int) $pembelian['total_harga'];

                foreach ($pembelian['detail_pembelian'] as $detail) {
                    $namaProduk = $detail['produk']['nama_produk'];
                    $kuantitas = $detail['kuantitas'];
                    $subtotal = (int) $detail['subtotal'];

                    $totalKuantitas += $kuantitas;

                    if (!isset($produkTerbanyak[$namaProduk])) {
                        $produkTerbanyak[$namaProduk] = [
                            'jumlah' => 0,
                            'total' => 0
                        ];
                    }

                    $produkTerbanyak[$namaProduk]['jumlah'] += $kuantitas;
                    $produkTerbanyak[$namaProduk]['total'] += $subtotal;
                }
            }

            arsort($produkTerbanyak);
            arsort($supplierTerbanyak);

            $namaProdukTerbanyak = array_key_first($produkTerbanyak);
            $supplierPalingSering = array_key_first($supplierTerbanyak);

            ksort($pembelianPerBulan);

            return view('admin.datalaporanpembelian', [
                'pembelian' => $data_pembelian,
                'tanggal' => $tanggal,
                'total_kuantitas' => $totalKuantitas,
                'total_pengeluaran' => $totalPengeluaran,
                'produk_terbanyak' => $produkTerbanyak,
                'nama_produk_terbanyak' => $namaProdukTerbanyak,
                'supplier_terbanyak' => $supplierPalingSering,
                'chart_labels' => array_keys($pembelianPerBulan),
                'chart_values' => array_values($pembelianPerBulan),
                'tahun' => $tahun
            ]);
        } else {
            return view('admin.datalaporanpembelian', [
                'pembelian' => [],
                'tanggal' => $tanggal,
                'total_kuantitas' => 0,
                'total_pengeluaran' => 0,
                'produk_terbanyak' => [],
                'nama_produk_terbanyak' => '',
                'supplier_terbanyak' => '',
                'chart_labels' => [],
                'chart_values' => [],
                'tahun' => $tahun
            ]);
        }
    } catch (\Exception $e) {
        return view('admin.datalaporanpembelian', [
            'pembelian' => [],
            'tanggal' => [],
            'error' => 'Gagal mengambil data pembelian',
            'tahun' => now()->year
        ]);
    }
}
}
