<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {

        return view('login');
    }

    public function login(request $request)
    {
        $contact = $request->input('input_contactpetugas');
        $password = $request->input('input_passwordpetugas');

        // Panggil stored procedure
        $result = DB::select('CALL sp_login_petugas(?, ?)', [$contact, $password]);

        if (!empty($result)) {
            $data = (array) $result[0]; // Konversi ke array untuk akses lebih mudah

            if (isset($data['keterangan']) && $data['keterangan'] === 'Login berhasil') {
                // Simpan semua data ke session
                Session::put('tb_petugas', $data);
                Session::put('foto_petugas', $data['gambar_user']);

                // Redirect berdasarkan role
                if ($data['role_user'] === 'admin') {
                    return redirect('admin/dashboard');
                } elseif ($data['role_user'] === 'kasir') {
                    return redirect('kasir/dashboard');
                } else {
                    return redirect('/'); // default fallback
                }
            } else {
                // Jika keterangan bukan "Login berhasil"
                return back()->with('error', $data['keterangan']);
            }
        } else {
            return back()->with('error', 'Terjadi kesalahan sistem.');
        }
    }

    public function logout(Request $request)
    {
        // Hapus session petugas
        $request->session()->forget('tb_petugas');

        // Logout pengguna menggunakan Auth::logout()
        Auth::logout();

        // Redirect ke halaman login
        return redirect('/');
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
        //
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
