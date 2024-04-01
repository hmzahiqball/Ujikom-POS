<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(request $request)
    {

        // Ambil input email dan password dari request
        $username = $request->input('input_usernamepetugas');
        $password = $request->input('input_passwordpetugas');

        // Panggil stored procedure dengan parameter email sebagai username dan password sebagai password
        $result = DB::select('CALL sp_login_petugas(?, ?)', array($username, $password));

        // Cek apakah hasil tidak kosong
        if (!empty($result)) {
            // Jika berhasil, kembalikan data petugas
            $petugas = $result[0];
            Session::put('petugas', $petugas);

            dd(session( 'petugas'));
        } else {
            // Jika tidak berhasil, kembalikan pesan error
            return response()->json(['error' => 'Username atau password salah'], 401);
        }
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
