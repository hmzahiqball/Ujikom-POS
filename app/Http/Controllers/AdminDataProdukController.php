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
            'kategori_addproduk' => 'required',
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
        $sku = ProdukHelper::generateSKU($request->kategori_addproduk,$request->subkategori_addproduk,$request->nama_addproduk);
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
        $request->validate([
            'id_editproduk'       => 'required|numeric',
            'hargaModal_editproduk'    => 'required|numeric',
            'hargaJual_editproduk'    => 'required|numeric',
            'diskon_editproduk'   => 'required|numeric',
            'stok_editproduk'     => 'required|numeric',
            'stokMin_editproduk'  => 'required|numeric',
            'status_editproduk'   => 'required',
            'deskripsi_editproduk'=> 'required',
            'foto_editproduk'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id_produk = $request->input('id_editproduk');

        // Siapkan data
        $data = [
            'p_modalProduk'        => $request->hargaModal_editproduk,
            'p_hargaProduk'        => $request->hargaJual_editproduk,
            'p_diskonProduk'       => $request->diskon_editproduk,
            'p_stokProduk'         => $request->stok_editproduk,
            'p_stokMinimumProduk'  => $request->stokMin_editproduk,
            'p_statusProduk'       => $request->status_editproduk,
            'p_deskripsiProduk'    => $request->deskripsi_editproduk,
        ];

        // Siapkan permintaan HTTP dengan atau tanpa file
        $url = "http://localhost:1111/api/produk/{$id_produk}";
        // dd($url, $data);

        if ($request->hasFile('foto_editproduk')) {
            $image = $request->file('foto_editproduk');

            $response = Http::withHeaders([
                'Content-Type' => 'multipart/form-data',
            ])->attach(
                'p_gambarProduk',
                fopen($image->getPathname(), 'r'),
                $image->getClientOriginalName()
            )->put($url, $data);
        } else {
            $response = Http::asForm()->put($url, $data);
        }

        if ($response->successful()) {
            return redirect('admin/dataproduk')->with('success', 'Produk berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui produk: ' . $response->json()['message']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id_deleteproduk' => 'required|numeric',
        ]);

        $id_produk = $request->input('id_deleteproduk');

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->delete("http://localhost:1111/api/produk/{$id_produk}");

            if ($response->successful()) {
                return redirect('admin/dataproduk')->with('success', 'Produk berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $response->json()['message']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus produk: ' . $e->getMessage());
        }
    }
}
