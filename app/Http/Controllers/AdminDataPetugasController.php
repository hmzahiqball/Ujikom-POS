<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminDataPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $karyawanResponse = Http::get('http://localhost:1111/api/karyawan/');
            $kategoriResponse = Http::get('http://localhost:1111/api/kategori/');

            if ($karyawanResponse->successful() && $kategoriResponse->successful()) {
                return view('admin.datapetugas', [
                    'petugas' => $karyawanResponse['data'],
                    'kategori' => $kategoriResponse['data'],
                    'kategori_unik' => collect($kategoriResponse['data'])->unique('id_kategori'),
                    'success' => $karyawanResponse['message'],
                ]);
            } else {
                return view('admin.datapetugas', [
                    'petugas' => [],
                    'kategori' => [],
                    'kategori_unik' => [],
                    'error' => 'Gagal mengambil data dari API',
                ]);
            }
        } catch (\Exception $e) {
            return view('admin.datapetugas', [
                'petugas' => [],
                'kategori' => [],
                'kategori_unik' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate the request...
    //     $request->validate([
    //         'kd_addpetugas' => 'required',
    //         'nama_addpetugas' => 'required',
    //         'telp_addpetugas' => 'required|numeric',
    //         'email_addpetugas' => 'required',
    //         'username_addpetugas' => 'required',
    //         'password_addpetugas' => 'required',
    //         'status_addpetugas' => 'required',
    //         'role_addpetugas' => 'required',
    //         'alamat_addpetugas' => 'required',
    //         'foto_addpetugas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     // Handle the file upload...
    //     $fileName = time(). '.'. $request->foto_addpetugas->extension();
    //     $request->foto_addpetugas->move(public_path('uploads'), $fileName);

    //     // Ambil semua data yang dikirimkan oleh formulir
    //     $kd_petugas = $request->input('kd_addpetugas');
    //     $nama_petugas = $request->input('nama_addpetugas');
    //     $telp_petugas = $request->input('telp_addpetugas');
    //     $email_petugas = $request->input('email_addpetugas');
    //     $username_petugas = $request->input('username_addpetugas');
    //     $password_petugas = $request->input('password_addpetugas');
    //     $status_petugas = $request->input('status_addpetugas');
    //     $role_petugas = $request->input('role_addpetugas');
    //     $alamat_petugas = $request->input('alamat_addpetugas');
    //     $foto_petugas = $fileName;

    //     // Panggil stored procedure untuk update
    //     DB::statement("CALL sp_add_datapetugas(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
    //         $kd_petugas,
    //         $nama_petugas,
    //         $telp_petugas,
    //         $email_petugas,
    //         $username_petugas,
    //         $password_petugas,
    //         $status_petugas,
    //         $foto_petugas,
    //         $alamat_petugas,
    //         $role_petugas
    //     ));

    //     return redirect('admin/datapetugas');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request)
    // {
    //     // Validate the request...
    //     $request->validate([
    //         'id_editpetugas' => 'required',
    //         'kd_editpetugas' => 'required',
    //         'nama_editpetugas' => 'required',
    //         'telp_editpetugas' => 'required|numeric',
    //         'email_editpetugas' => 'required',
    //         'username_editpetugas' => 'required',
    //         'password_editpetugas' => 'required',
    //         'status_editpetugas' => 'required',
    //         'role_editpetugas' => 'required',
    //         'alamat_editpetugas' => 'required',
    //         'foto_editpetugas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     // Handle the file upload...
    //     $fileName = time(). '.'. $request->foto_editpetugas->extension();
    //     $request->foto_editpetugas->move(public_path('uploads'), $fileName);

    //     // Ambil semua data yang dikirimkan oleh formulir
    //     $id_petugas = $request->input('id_editpetugas');
    //     $kd_petugas = $request->input('kd_editpetugas');
    //     $nama_petugas = $request->input('nama_editpetugas');
    //     $telp_petugas = $request->input('telp_editpetugas');
    //     $email_petugas = $request->input('email_editpetugas');
    //     $username_petugas = $request->input('username_editpetugas');
    //     $password_petugas = $request->input('password_editpetugas');
    //     $status_petugas = $request->input('status_editpetugas');
    //     $role_petugas = $request->input('role_editpetugas');
    //     $alamat_petugas = $request->input('alamat_editpetugas');
    //     $foto_petugas = $fileName;

    //     // Panggil stored procedure untuk update
    //     DB::statement("CALL sp_edit_datapetugas(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
    //         $id_petugas,
    //         $kd_petugas,
    //         $nama_petugas,
    //         $telp_petugas,
    //         $email_petugas,
    //         $username_petugas,
    //         $password_petugas,
    //         $status_petugas,
    //         $foto_petugas,
    //         $alamat_petugas,
    //         $role_petugas
    //     ));

    //     return redirect('admin/datapetugas');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Request $request)
    // {
    //     // Ambil semua data yang dikirimkan oleh formulir
    //     $id_petugas = $request->input('id_deletepetugas');

    //     // Panggil stored procedure untuk update
    //     DB::statement("CALL sp_delete_datapetugas(?)", array(
    //         $id_petugas,
    //     ));

    //     return redirect('admin/datapetugas');
    // }
}
