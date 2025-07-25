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
            <h3>Data Promo</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addpromoModal">Add Data Promo</button>
        </div>
        <form action="/admin/datapromo/setpajak" method="POST" id="setPajakForm">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <div class="input-group mb-3">
                   @if(isset($tax[0]['id_settings']))
                        <input type="hidden" name="idsetting" value="{{ $tax[0]['id_settings'] }}">
                    @else
                        <input type="hidden" name="idsetting" value="999">
                    @endif
                    <input type="number" class="form-control" placeholder="Pajak" aria-label="Pajak" aria-describedby="button-set-pajak" id="pajak" name="pajak" 
                           @if(isset($tax[0]['value'])) value="{{ $tax[0]['value'] }}" @endif>
                    <span class="input-group-text" id="basic-addon1">%</span>
                    <button class="btn btn-primary" type="button" id="button-set-pajak">Set Pajak</button>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tablePromo">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama Promo</th>
                                <th>Kode Promo</th>
                                <th>Tipe Promo</th>
                                <th>Total Promo</th>
                                <th>Kuota Promo</th>
                                <th>Minimal Belanja</th>
                                <th>Status Promo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promos as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item['nama_promo'] }}</td>
                                <td>{{ $item['kode_promo'] }}</td>
                                <td>{{ $item['tipe_promo'] }}</td>
                                <td>{{ $item['total_promo'] }}</td>
                                <td>{{ $item['kuota_promo'] }}</td>
                                <td>Rp. {{ number_format($item['min_belanja'], 0, ',', '.') }}</td>
                                <td>{{ $item['status_promo'] }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updatepromoModal"
                                            data-idpromo="{{ $item['id_promo'] }}"
                                            data-namapromo="{{ $item['nama_promo'] }}"
                                            data-kodepromo="{{ $item['kode_promo'] }}"
                                            data-tipepromo="{{ $item['tipe_promo'] }}"
                                            data-totalpromo="{{ $item['total_promo'] }}"
                                            data-kuotapromo="{{ $item['kuota_promo'] }}"
                                            data-tanggalmulai="{{ $item['tanggal_mulai'] }}"
                                            data-tanggalakhir="{{ $item['tanggal_akhir'] }}"
                                            data-minbelanja="{{ $item['min_belanja'] }}"
                                            data-statuspromo="{{ $item['status_promo'] }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger w-100 deleteSwal"
                                            data-idpromo="{{ $item['id_promo'] }}"
                                            data-namapromo="{{ $item['nama_promo'] }}"
                                            data-action="{{ route('admin.datapromo.delete', $item['id_promo']) }}">
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
    @extends('admin.modal.promo.addpromo')
    @extends('admin.modal.promo.editpromo')
    @extends('admin.modal.promo.deletepromo')
@endsection
@section('scripts')
    <script>
        $('#button-set-pajak').click(function() {
            Swal.fire({
                title: 'Set Pajak?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Unformat dulu sebelum submit
                    $('#loadingOverlay').fadeIn(200);
 
                    $('#setPajakForm').submit();
                }
            });
        });
        $(document).ready(function() {
            const d = new Date();
            const tanggal = `Data Promo-${('0' + d.getDate()).slice(-2)}${('0' + (d.getMonth() + 1)).slice(-2)}${d.getFullYear()}`;
            $('#tablePromo').DataTable({
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

