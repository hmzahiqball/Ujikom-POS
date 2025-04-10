@extends('app')
<link rel="icon" href="{{ URL::asset('images/logo/favicon.png') }}" type="image/png" />
@section('styles')
<style>
    body {
        font-family: 'Outfit', sans-serif;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Data Petugas</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addpetugasModal">Add Data Petugas</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tablePetugas">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>ID Petugas</th>
                                <th>Nama Petugas</th>
                                <th>Hak Akses</th>
                                <th>Status Petugas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($petugas as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->kode_user }}</td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->role_user }}</td>
                                <td>{{ $item->status_user }}</td>
                                <td>
                                    <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#editpetugasModal"
                                    data-idpetugas="{{ $item->id_karyawan }}" data-iduser="{{ $item->id_user }}" data-kodepetugas="{{ $item->kode_user }}"
                                    data-namapetugas="{{ $item->nama_user }}" data-telppetugas="{{ $item->contact_user }}" data-rolepetugas="{{ $item->role_user }}"
                                    data-statuspetugas="{{ $item->status_user }}" data-fotopetugas="{{ $item->gambar_user }}" data-posisipetugas="{{ $item->posisi_karyawan }}"
                                    data-gajipetugas="{{ $item->gaji_karyawan }}" data-alamatpetugas="{{ $item->alamat_karyawan }}" data-idshifts="{{ $item->id_shifts }}"
                                    data-namashifts="{{ $item->nama_shifts }}" data-starttime="{{ $item->start_time }}" data-endtime="{{ $item->end_time }}">Edit</button>
                                    <button class="btn btn-danger mr-2 deleteSwal"
                                    data-idpetugas="{{ $item->id_karyawan }}" data-namapetugas="{{ $item->nama_user }}"
                                    data-action="{{ route('admin.datapetugas.delete', $item->id_karyawan) }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @extends('admin.modal.addpetugas')
    @extends('admin.modal.editpetugas')
    @extends('admin.modal.deletepetugas') --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tablePetugas').DataTable({
                layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
            });
        });
    </script>
@endsection
