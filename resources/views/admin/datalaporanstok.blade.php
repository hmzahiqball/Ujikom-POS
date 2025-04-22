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
            <h3>Laporan Stok Produk</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tableLaporanStok">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Perubahan Stok</th>
                                <th>Alasan Perubahan</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal Perubahan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporanstok as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item['nama_produk'] }}</td>
                                <td>{{ $item['perubahan_stok'] }}</td>
                                <td>{{ $item['alasan_perubahan'] }}</td>
                                <td>{{ $item['nama_karyawan'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-danger w-100 deleteSwal"
                                            data-idLaporanStok="{{ $item['id_laporan_stok'] }}"
                                            data-namaProduk="{{ $item['nama_produk'] }}"
                                            data-action="{{ route('admin.datastokproduk.delete', $item['id_laporan_stok']) }}">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('admin.modal.laporanStok.deletelaporan')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tableLaporanStok').DataTable({
                layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
            });
        });
    </script>
@endsection
