<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDataProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get_kategori = DB::select('CALL sp_get_datakategori()'); //mengambil data kategori dari database melalui stored procedure di mysql
        $get_produk = DB::select('CALL sp_get_dataproduk()'); //mengambil data produk dari database melalui stored procedure di mysql
        return view('admin.dataproduk' , ['produk' => $get_produk, 'kategori' => $get_kategori]);
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
        // Validate the request...
        $request->validate([
            'nama_addproduk' => 'required',
            'kategori_addproduk' => 'required',
            'diskon_addproduk' => 'required|numeric',
            'harga_addproduk' => 'required|numeric',
            'stok_addproduk' => 'required|numeric',
            'lokasi_addproduk' => 'required',
            'status_addproduk' => 'required',
            'foto_addproduk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload...
        $fileName = time(). '.'. $request->foto_addproduk->extension();
        $request->foto_addproduk->move(public_path('uploads'), $fileName);

        // Ambil semua data yang dikirimkan oleh formulir
        $nama_produk = $request->input('nama_addproduk');
        $kategori = $request->input('kategori_addproduk');
        $diskon_produk = $request->input('diskon_addproduk');
        $harga_produk = $request->input('harga_addproduk');
        $stok_produk = $request->input('stok_addproduk');
        $lokasi_produk = $request->input('lokasi_addproduk');
        $status_produk = $request->input('status_addproduk');
        $foto_produk = $fileName;

        // Panggil stored procedure untuk update
        DB::statement("CALL sp_add_dataproduk(?, ?, ?, ?, ?, ?, ?, ?)", array(
            $kategori,
            $nama_produk,
            $stok_produk,
            $diskon_produk,
            $harga_produk,
            $lokasi_produk,
            $status_produk,
            $foto_produk
        ));

        return redirect('admin/dataproduk');
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
