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
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>MN-001</td>
                                <td>Minuman</td>
                                <td>Minuman 01</td>
                                <td>999</td>
                                <td>Rp. 10.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('kasir.modal.addmember')
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
