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
            <h3>Data Produk</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addprodukModal">Add Data Produk</button>
        </div>
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
                            @foreach($produk as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->kode_produk }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->stok_produk }}</td>
                                <td>Rp. {{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                                <td>{{ $item->status_produk }}</td>
                                <td>
                                    <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#editprodukModal"
                                    data-idproduk="{{ $item->id_produk }}" data-kodeproduk="{{ $item->kode_produk }}"
                                    data-namakategori="{{ $item->nama_kategori }}" data-namaproduk="{{ $item->nama_produk }}"
                                    data-stokproduk="{{ $item->stok_produk }}" data-hargaproduk="{{ $item->harga_produk }}"
                                    data-diskonproduk="{{ $item->diskon_produk }}" data-lokasiproduk="{{ $item->lokasi_produk }}"
                                    data-fotoproduk="{{ $item->foto_produk }}" data-statusproduk="{{ $item->status_produk }}">Edit</button>
                                    <button class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteprodukModal"
                                    data-idproduk="{{ $item->id_produk }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('admin.modal.addproduk')
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
