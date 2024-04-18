<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDataMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get_kategori = DB::select('CALL sp_get_datakategori()'); //mengambil data kategori dari database melalui stored procedure di mysql
        $get_member = DB::select('CALL sp_get_datamember()'); //mengambil data member dari database melalui stored procedure di mysql
        return view('admin.datamember' , ['member' => $get_member, 'kategori' => $get_kategori]);
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

        return redirect('admin/datamember');
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
            'id_editmember' => 'required|numeric',
            'nama_editmember' => 'required',
            'tgllahir_editmember' => 'required',
            'telp_editmember' => 'required|numeric',
            'email_editmember' => 'required',
            'gender_editmember' => 'required',
            'status_editmember' => 'required',
            'alamat_editmember' => 'required'
        ]);

        // Ambil semua data yang dikirimkan oleh formulir
        $id_member = $request->input('id_editmember');
        $nama_member = $request->input('nama_editmember');
        $tgllahir_member = $request->input('tgllahir_editmember');
        $telp_member = $request->input('telp_editmember');
        $email_member = $request->input('email_editmember');
        $gender_member = $request->input('gender_editmember');
        $status_member = $request->input('status_editmember');
        $alamat_member = $request->input('alamat_editmember');

        // Panggil stored procedure untuk update
        DB::statement("CALL sp_edit_datamember(?, ?, ?, ?, ?, ?, ?, ?)", array(
            $id_member,
            $nama_member,
            $alamat_member,
            $telp_member,
            $email_member,
            $tgllahir_member,
            $gender_member,
            $status_member,
        ));

        return redirect('admin/datamember');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Ambil semua data yang dikirimkan oleh formulir
        $id_member = $request->input('id_deletemember');

        // Panggil stored procedure untuk update
        DB::statement("CALL sp_delete_datamember(?)", array(
            $id_member,
        ));

        return redirect('admin/datamember');
    }
}
