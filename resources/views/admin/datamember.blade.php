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
        <h3>Data Member</h3>
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
                                    <button class="btn btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#editmemberModal">View</button>
                                    <button class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deletememberModal">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @extends('admin.modal.editmember')
    @extends('admin.modal.deletemember') --}}
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
