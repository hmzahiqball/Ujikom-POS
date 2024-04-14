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
            <h3>Data Member</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addmemberModal">Add Data Member</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tableMember">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Status Member</th>
                                <th>Nama Lengkap</th>
                                <th>No. Telp</th>
                                <th>Alamat Email</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->status_member }}</td>
                                <td>{{ $item->nama_member }}</td>
                                <td>{{ $item->telp_member }}</td>
                                <td>{{ $item->email_member }}</td>
                                <td>{{ $item->tgllahir_member }}</td>
                                <td>{{ $item->gender_member }}</td>
                                <td>
                                    <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#editmemberModal"
                                    data-idmember="{{ $item->id_member }}"
                                    data-namamember="{{ $item->nama_member }}"
                                    data-alamatmember="{{ $item->alamat_member }}"
                                    data-telpmember="{{ $item->telp_member }}"
                                    data-emailmember="{{ $item->email_member }}"
                                    data-tgllahirmember="{{ $item->tgllahir_member }}"
                                    data-gendermember="{{ $item->gender_member }}"
                                    data-statusmember="{{ $item->status_member }}">Edit</button>
                                    <button class="btn btn-danger mr-2 deleteSwal"
                                    data-idmember="{{ $item->id_member }}" data-namamember="{{ $item->nama_member }}"
                                    data-action="{{ route('admin.datamember.delete', $item->id_member) }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('admin.modal.addmember')
    @extends('admin.modal.editmember')
    @extends('admin.modal.deletemember')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tableMember').DataTable({
                layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
            });
        });
    </script>
@endsection
