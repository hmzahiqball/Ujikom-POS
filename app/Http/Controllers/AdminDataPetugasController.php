<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\HttpHelper;

class AdminDataPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $karyawanResponse = Http::get('http://localhost:1111/api/karyawan/');
            $shiftsResponse = Http::get('http://localhost:1111/api/shifts/');

            if ($karyawanResponse->successful() && $shiftsResponse->successful()) {
                return view('admin.datapetugas', [
                    'petugas' => $karyawanResponse['data'],
                    'shifts' => $shiftsResponse['data'],
                    'success' => $karyawanResponse['message'],
                ]);
            } else {
                return view('admin.datapetugas', [
                    'petugas' => [],
                    'shifts' => [],
                    'error' => 'Gagal mengambil data dari API',
                ]);
            }
        } catch (\Exception $e) {
            return view('admin.datapetugas', [
                'petugas' => [],
                'shifts' => [],
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
    public function update(Request $request)
    {
        // Validate the request...
        $request->validate([
            'id_editpetugas' => 'required|numeric',
            'idUser_editpetugas' => 'required|numeric',
            'contact_editpetugas' => 'required|numeric',
            'password_editpetugas' => 'nullable',
            'role_editpetugas' => 'required',
            'posisi_editpetugas' => 'required',
            'gaji_editpetugas' => 'required|numeric',
            'alamat_editpetugas' => 'required',
            'shift_editpetugas' => 'required|numeric',
            'foto_editpetugas' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $idKaryawan = $request->id_editpetugas;
            $idUser = $request->idUser_editpetugas;

            // 1. Update ke endpoint Karyawan
            $karyawanResponse = Http::put("http://localhost:1111/api/karyawan/{$idKaryawan}", [
                'p_posisiKaryawan' => $request->posisi_editpetugas,
                'p_gajiKaryawan'   => $request->gaji_editpetugas,
                'p_alamatKaryawan' => $request->alamat_editpetugas,
                'p_idShifts'       => $request->shift_editpetugas,
            ]);

            // 2. Update ke endpoint User dengan atau tanpa gambar
            $userPayload = [
                'p_contactUsers'  => $request->contact_editpetugas,
                'p_passwordUsers' => $request->password_editpetugas,
                'p_roleUsers'     => $request->role_editpetugas,
            ];

            $userResponse = HttpHelper::putMultipart(
                "http://localhost:1111/api/users/{$idUser}",
                $userPayload,
                'p_gambarUser',
                $request->file('foto_editpetugas')
            );

            // Cek status response dari kedua API
            if ($karyawanResponse->successful() && $userResponse->successful()) {
                return redirect('admin/datapetugas')->with('success', 'Data berhasil diperbarui!');
            } else {
                return back()->with('error', 'Gagal update ke salah satu endpoint');
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

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
