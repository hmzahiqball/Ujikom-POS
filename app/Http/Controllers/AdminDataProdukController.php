<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Helpers\ProdukHelper;

class AdminDataProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data produk dari API
        $produkResponse = Http::get('http://localhost:1111/api/produk/');
        $kategoriResponse = Http::get('http://localhost:1111/api/kategori/');

        if ($produkResponse->successful() && $kategoriResponse->successful()) {
            $produk = $produkResponse['data'];
            $kategori = $kategoriResponse['data'];

            return view('admin.dataproduk', [
                'produk' => $produk,
                'kategori' => $kategori,
            ]);
        }

        return back()->with('error', 'Gagal mengambil data dari API.');
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
        // Validasi input dari form
        $request->validate([
            'nama_addproduk'        => 'required',
            'subkategori_addproduk' => 'required',
            'hargaModal_addproduk'  => 'required|numeric',
            'hargaJual_addproduk'   => 'required|numeric',
            'diskon_addproduk'      => 'required|numeric',
            'stok_addproduk'        => 'required|numeric',
            'stokMin_addproduk'     => 'required|numeric',
            'status_addproduk'      => 'required',
            'deskripsi_addproduk'   => 'required',
            'foto_addproduk'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate SKU dan Barcode
        $sku = ProdukHelper::generateSKU($request->nama_addproduk);
        $barcode = ProdukHelper::generateBarcode($request->subkategori_addproduk, $sku);

        // Ambil file gambar
        $image = $request->file('foto_addproduk');

        // Kirim request ke API eksternal dengan form-data (termasuk file)
        $response = Http::attach(
            'p_gambarProduk',
            fopen($image->getPathname(), 'r'),
            $image->getClientOriginalName()
        )->post('http://localhost:1111/api/produk', [
            'p_idKategori'         => $request->subkategori_addproduk,
            'p_namaProduk'         => $request->nama_addproduk,
            'p_skuProduk'          => $sku,
            'p_barcodeProduk'      => $barcode,
            'p_deskripsiProduk'    => $request->deskripsi_addproduk,
            'p_hargaProduk'        => $request->hargaJual_addproduk,
            'p_modalProduk'        => $request->hargaModal_addproduk,
            'p_diskonProduk'       => $request->diskon_addproduk,
            'p_stokProduk'         => $request->stok_addproduk,
            'p_stokMinimumProduk'  => $request->stokMin_addproduk,
            'p_statusProduk'       => $request->status_addproduk,
        ]);

        // Cek hasil respon dari API
        if ($response->successful()) {
            return redirect('admin/dataproduk')->with('success', 'Produk berhasil ditambahkan ke server API');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $response->body());
        }
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
    public function update(Request $request)
    {
        // Validate the request...
        $request->validate([
            'id_editproduk' => 'required|numeric',
            'kategori_editproduk' => 'required',
            'kd_editproduk' => 'required',
            'nama_editproduk' => 'required',
            'stok_editproduk' => 'required|numeric',
            'diskon_editproduk' => 'required|numeric',
            'harga_editproduk' => 'required|numeric',
            'lokasi_editproduk' => 'required',
            'status_editproduk' => 'required',
            'foto_editproduk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil semua data yang dikirimkan oleh formulir
        $id_produk = $request->input('id_editproduk');
        $kategori = $request->input('kategori_editproduk');
        $kode_produk = $request->input('kd_editproduk');
        $nama_produk = $request->input('nama_editproduk');
        $stok_produk = $request->input('stok_editproduk');
        $diskon_produk = $request->input('diskon_editproduk');
        $harga_produk = $request->input('harga_editproduk');
        $lokasi_produk = $request->input('lokasi_editproduk');
        $status_produk = $request->input('status_editproduk');

        if ($request->hasFile('foto_editproduk')) {
            $fileName = time(). '.'. $request->foto_editproduk->extension();
            $request->foto_editproduk->move(public_path('uploads'), $fileName);
            $foto_produk = $fileName;

            // Panggil stored procedure untuk update
            DB::statement("CALL sp_edit_dataproduk(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $id_produk,
                $kategori,
                $kode_produk,
                $nama_produk,
                $stok_produk,
                $diskon_produk,
                $harga_produk,
                $lokasi_produk,
                $status_produk,
                $foto_produk
            ));
        } else {
            // Panggil stored procedure untuk update
            DB::statement("CALL sp_edit_dataproduk(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $id_produk,
                $kategori,
                $kode_produk,
                $nama_produk,
                $stok_produk,
                $diskon_produk,
                $harga_produk,
                $lokasi_produk,
                $status_produk,
                ''
            ));
        }

        return redirect('admin/dataproduk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Ambil semua data yang dikirimkan oleh formulir
        $id_produk = $request->input('id_deleteproduk');

        // Panggil stored procedure untuk update
        DB::statement("CALL sp_delete_dataproduk(?)", array(
            $id_produk,
        ));

        return redirect('admin/dataproduk');
    }
}
