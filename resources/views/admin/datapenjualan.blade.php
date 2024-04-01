@extends('app')
<link rel="icon" href="{{ URL::asset('images/logo/favicon.png') }}" type="image/png" />
@section('styles')
    <style>
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
                            <tr>
                                <td>1</td>
                                <td>PR-280505</td>
                                <td>Bobi</td>
                                <td>2015/04/15 05:06</td>
                                <td>Bobi</td>
                                <td>Rp. 122.000</td>
                                <td>Berhasil</td>
                                <td>
                                    <button class="btn btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#viewpenjualanModal">View</button>
                                    <button class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deletepenjualanModal">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>PR-280505</td>
                                <td>Bobi</td>
                                <td>2016/04/15 05:06</td>
                                <td>Bobo</td>
                                <td>Rp. 122.000</td>
                                <td>Berhasil</td>
                                <td>
                                    <button class="btn btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#viewpenjualanModal">View</button>
                                    <button class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deletepenjualanModal">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @extends('admin.modal.viewpenjualan')
    @extends('admin.modal.deletepenjualan')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tableTransaksi').DataTable({
                layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
            });
        });
    </script>
@endsection
