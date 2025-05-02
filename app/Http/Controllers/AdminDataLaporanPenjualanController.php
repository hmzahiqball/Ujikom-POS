<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AdminDataLaporanPenjualanController extends Controller
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
                $startDate = Carbon::now()->startOfYear()->format('Y-m-d');
                $endDate = Carbon::now()->endOfYear()->format('Y-m-d');
                $tanggal = $startDate . '_' . $endDate;
            }

            // Tidak ada idpetugas, jadi biarkan null (jangan dikirim ke API)
            $url = 'http://localhost:1111/api/laporanPenjualan';

            $response = Http::get($url, [
                'tanggal' => $tanggal
            ]);

            if ($response->successful()) {
                $data_penjualan = $response->json('data');
                $totalKuantitas = 0;
                $totalPemasukan = 0;
                $totalPendapatan = 0;
                $produkTerlaris = [];

                foreach ($data_penjualan as $penjualan) {
                    $totalKuantitas += $penjualan['total_kuantitas'];
                    $totalPemasukan += (int) $penjualan['total_bayar'];
                    $totalPendapatan += (int) $penjualan['total_pendapatan'];

                    foreach ($penjualan['detail_penjualan'] as $detail) {
                        $namaProduk = $detail['produk']['nama_produk'];
                        $kuantitas = $detail['kuantitas'];
                        $subtotal = (int) $detail['subtotal'];

                        if (!isset($produkTerlaris[$namaProduk])) {
                            $produkTerlaris[$namaProduk] = [
                                'jumlah' => 0,
                                'total' => 0
                            ];
                        }

                        $produkTerlaris[$namaProduk]['jumlah'] += $kuantitas;
                        $produkTerlaris[$namaProduk]['total'] += $subtotal;
                    }
                }

                arsort($produkTerlaris); // urutkan berdasarkan total penjualan terbesar

                // Ambil produk terlaris (pertama dari array yang sudah di-arsort)
                $namaProdukTerlaris = array_key_first($produkTerlaris);

                // Hitung penjualan per karyawan
                $penjualanKaryawan = [];
                foreach ($data_penjualan as $penjualan) {
                    $namaKasir = $penjualan['karyawan']['nama_user'] ?? 'Tidak Diketahui';
                    $penjualanKaryawan[$namaKasir] = ($penjualanKaryawan[$namaKasir] ?? 0) + $penjualan['total_kuantitas'];
                }

                // Ambil karyawan dengan penjualan terbanyak
                arsort($penjualanKaryawan);
                $karyawanTerbaik = array_key_first($penjualanKaryawan);

                // Buat data chart per bulan
                $penjualanPerBulan = [];
                foreach ($data_penjualan as $penjualan) {
                    $bulan = Carbon::parse($penjualan['tanggal_penjualan'])->format('Y-m');
                    $penjualanPerBulan[$bulan] = ($penjualanPerBulan[$bulan] ?? 0) + (int) $penjualan['total_bayar'];
                }
                ksort($penjualanPerBulan); // urutkan bulan

                return view('admin.datalaporanpenjualan', [
                    'penjualan' => $data_penjualan,
                    'tanggal' => $startDate . '_' . $endDate,
                    'total_kuantitas' => $totalKuantitas,
                    'total_pemasukan' => $totalPemasukan,
                    'total_keuntungan' => $totalPendapatan,
                    'produk_terlaris' => $produkTerlaris,
                    'nama_produk_terlaris' => $namaProdukTerlaris,
                    'karyawan_terbaik' => $karyawanTerbaik,
                    'chart_labels' => array_keys($penjualanPerBulan),
                    'chart_values' => array_values($penjualanPerBulan)
                ]);
            } else {
                $data_penjualan = [];
                return view('admin.datalaporanpenjualan', [
                    'penjualan' => [],
                    'tanggal' => $startDate . '_' . $endDate,
                    'total_kuantitas' => 0,
                    'total_pemasukan' => 0,
                    'total_keuntungan' => 0,
                    'produk_terlaris' => [],
                    'nama_produk_terlaris' => '',
                    'karyawan_terbaik' => '',
                    'chart_labels' => [],
                    'chart_values' => []
                ]);
            }
        } catch (\Exception $e) {
            return view('admin.datalaporanpenjualan', [
                'penjualan' => [],
                'tanggal' => [],
                'error' => 'Gagal mengambil data penjualan'
            ]);
        }
    }
}
