@extends('app')
<link rel="icon" href="{{ URL::asset('images/logo/favicon.png') }}" type="image/png" />
@section('styles')
    <style>
    </style>
@endsection
@section('content')
    <div class="container">
        <h3>Data Produk</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tableProduk">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>ID Produk</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Stok Produk</th>
                                <th>Harga Jual</th>
                                <th>Status Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>MK-001</td>
                                <td>Makanan</td>
                                <td>Makanan 01</td>
                                <td>999</td>
                                <td>Rp. 12.000</td>
                                <td>Tersedia</td>
                                <td>
                                    <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#editprodukModal">Edit</button>
                                    <button class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteprodukModal">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>MN-001</td>
                                <td>Minuman</td>
                                <td>Minuman 01</td>
                                <td>0</td>
                                <td>Rp. 10.000</td>
                                <td>Habis</td>
                                <td>
                                    <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#editprodukModal">Edit</button>
                                    <button class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteprodukModal">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('admin.modal.editproduk')
    @extends('admin.modal.deleteproduk')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tableProduk').DataTable({
                layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
            });
        });
    </script>
@endsection
