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
        <h3>Data Riwayat Transaksi</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tableTransaksi">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>No. Transaksi</th>
                                <th>Kasir</th>
                                <th>Tanggal dan Waktu</th>
                                <th>Member</th>
                                <th>Total Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->no_transaksi }}</td>
                                    <td>{{ $item->nama_petugas }}</td>
                                    <td>{{ $item->tgl_transaksi }}</td>
                                    <td>{{ $item->nama_member }}</td>
                                    <td>Rp. {{ number_format($item->total_transaksi, 0, ',', '.') }}</td>
                                    <td>{{ $item->status_transaksi }}</td>
                                    <td>
                                        <button class="btn btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#viewpenjualanModal"
                                        data-idtransaksi="{{ $item->id_transaksi }}"
                                        data-idtransaksidet="{{ $item->no_transaksidet }}"
                                        data-notransaksi="{{ $item->no_transaksi }}"
                                        data-namapetugas="{{ $item->nama_petugas }}"
                                        data-tgltransaksi="{{ $item->tgl_transaksi }}"
                                        data-namamember="{{ $item->nama_member }}"
                                        data-totaltransaksi="{{ number_format($item->total_transaksi, 0, ',', '.') }}"
                                        data-totalbayar="{{ number_format($item->total_bayar, 0, ',', '.') }}"
                                        data-kembaliantransaksi="{{ number_format($item->kembalian, 0, ',', '.') }}"
                                        data-statustransaksi="{{ $item->status_transaksi }}"
                                        data-namaproduk="{{ $item->nama_produk }}"
                                        data-stokproduk="{{ $item->stok_produk }}"
                                        data-hargaproduk="{{ $item->harga_produk }}"
                                        data-diskonproduk="{{ $item->diskon_produk }}">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('kasir.modal.addmember')
    @extends('kasir.modal.viewpenjualan')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#tableTransaksi').DataTable({
                layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
            });
        });
    </script>
@endsection
