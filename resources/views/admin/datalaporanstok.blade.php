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
                                <th>Kode Laporan</th>
                                <th>Produk | Pengurangan Stok</th>
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
                                <td>{{ $item['kode_laporan'] }}</td>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($item['produk'] as $produk)
                                        <li>{{ $produk['nama_produk'] }} | {{ $produk['perubahan_stok'] }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $item['alasan_perubahan'] }}</td>
                                <td>{{ $item['nama_karyawan'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.datastokproduk.bulkdelete') }}">
                                        @csrf
                                        @foreach($item['ids'] as $id)
                                            <input type="hidden" name="ids[]" value="{{ $id }}">
                                        @endforeach
                                        <button class="btn btn-danger w-100 deleteSwal">Delete</button>
                                    </form>
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
            const d = new Date();
            const tanggal = `Data Laporan Stok-${('0' + d.getDate()).slice(-2)}${('0' + (d.getMonth() + 1)).slice(-2)}${d.getFullYear()}`;
            $('#tableLaporanStok').DataTable({
                layout: {
                    topStart: {
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: tanggal
                        },
                        {
                            extend: 'excelHtml5',
                            title: tanggal
                        },
                        {
                            extend: 'pdfHtml5',
                            title: tanggal
                        },
                        {
                            extend: 'csvHtml5',
                            title: tanggal
                        }
                    ]
                }
            },
            });
        });
    </script>
@endsection
