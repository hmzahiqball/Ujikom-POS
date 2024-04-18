<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirDataMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'nama_addmember' => 'required',
            'tgllahir_addmember' => 'required',
            'telp_addmember' => 'required|numeric',
            'email_addmember' => 'required',
            'gender_addmember' => 'required',
            'alamat_addmember' => 'required'
        ]);

        // Ambil semua data yang dikirimkan oleh formulir
        $nama_member = $request->input('nama_addmember');
        $tgllahir_member = $request->input('tgllahir_addmember');
        $telp_member = $request->input('telp_addmember');
        $email_member = $request->input('email_addmember');
        $gender_member = $request->input('gender_addmember');
        $status_member = 'Aktif';
        $alamat_member = $request->input('alamat_addmember');

        // Panggil stored procedure untuk update
        DB::statement("CALL sp_add_datamember(?, ?, ?, ?, ?, ?, ?)", array(
            $nama_member,
            $alamat_member,
            $telp_member,
            $email_member,
            $tgllahir_member,
            $gender_member,
            $status_member,
        ));

        return redirect('kasir/dashboard');
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
