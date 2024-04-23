<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\session;

class KasirTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get_kategori = DB::select('CALL sp_get_datakategori()');
        $get_produk = DB::select('CALL sp_get_dataproduk()');
        $get_member = DB::select('CALL sp_get_datamember()');
        return view('kasir.transaksi', ['data_kategori' => $get_kategori, 'data_produk' => $get_produk, 'data_member' => $get_member]);
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
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'member_transaksi' => 'required',
            'totalharga_transaksi' => 'required',
            'totalbayar_transaksi' => 'required',
            'cartData' => 'required',
        ]);

        // Ambil data dari request
        $id_petugas = Session::get('tb_petugas')->id_petugas;
        $member_transaksi = $request->input('member_transaksi');
        $totalharga_transaksi = $request->input('totalharga_transaksi');
        $totalbayar_transaksi = $request->input('totalbayar_transaksi');
        $cartData = json_decode($request->cartData, true);
        $status_transaksi = 'Berhasil';

        // Ambil kode petugas dari session
        $kode_petugas = Session::get('tb_petugas')->kode_petugas;

        // Ambil tanggal, bulan, dan tahun saat ini
        $tanggal = date('d');
        $bulan = date('m');
        $tahun = date('y');

        // Ambil nomor pembelian pada hari itu dari database
        $nomor_pembelian = DB::table('tb_transaksi')
        ->whereDate('tgl_transaksi', now())
        ->count() + 1;

        // Format nomor pembelian menjadi 4 digit dengan leading zero
        $nomor_pembelian_formatted = str_pad($nomor_pembelian, 4, '0', STR_PAD_LEFT);

        // Buat nomor transaksi
        $no_transaksi = $kode_petugas . '-' . $tanggal . $bulan . $tahun . $nomor_pembelian_formatted;

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Panggil stored procedure untuk menambahkan data ke tb_transaksi
            DB::statement('CALL sp_add_transaksi(?, ?, ?, ?, ?, ?)', [
                $no_transaksi,
                $id_petugas,
                $member_transaksi,
                $totalharga_transaksi,
                $totalbayar_transaksi,
                $status_transaksi,
            ]);

            // Ambil id_transaksi terakhir yang dimasukkan
            $id_transaksi = DB::getPdo()->lastInsertId();

            // Panggil stored procedure untuk menambahkan data ke tb_detailtransaksi
            foreach ($cartData as $item) {
                DB::statement('CALL sp_add_detailtransaksi(?, ?, ?, ?, ?)', [
                    $no_transaksi,
                    $item['namaproduk_transaksi'],
                    $item['kuantitas_transaksi'],
                    $item['hargaproduk_transaksi'],
                    $item['potongan_transaksi']
                ]);
            }

            DB::commit();
            return redirect('kasir/riwayattransaksi');
        } catch (\Exception $e) {
            echo "error => Terjadi kesalahan saat menambahkan transaksi: ";
        }
    }

    public function printInvoice(Request $request)
    {
        // Ambil data dari URL
        $noNota = $request->input('noNota');
        $cartData = $request->input('cartData');
        $totalHarga = $request->input('totalHarga');

        // Tampilkan halaman cetak dengan membawa data yang diperlukan
        return view('kasir.print', compact('noNota', 'cartData', 'totalHarga'));
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
