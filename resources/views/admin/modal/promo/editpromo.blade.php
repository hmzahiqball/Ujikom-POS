<!-- Modal -->
<div class="modal fade" id="updatepromoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Promo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/datapromo/update') }}" method="POST"
                enctype="application/json">
                @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_editpromo" name="id_editpromo">
                                <input type="text" class="form-control" id="namaPromo_updatepromo" placeholder="Nama Promo" name="namaPromo_updatepromo" required>
                                <label for="namaPromo_updatepromo">Nama Promo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kodePromo_updatepromo" placeholder="Kode Promo" name="kodePromo_updatepromo" required>
                                <label for="kodePromo_updatepromo">Kode Promo</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tipePromo_updatepromo" name="tipePromo_updatepromo" required>
                                    <option selected disabled>Pilih Tipe Promo</option>
                                    <option value="persen">Persen</option>
                                    <option value="nominal">Nominal</option>
                                </select>
                                <label for="tipePromo_updatepromo">Tipe Promo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="totalPromo_updatepromo" placeholder="Total Promo" name="totalPromo_updatepromo" required>
                                <label for="totalPromo_updatepromo">Total Promo</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="kuotaPromo_updatepromo" placeholder="Kuota Promo" name="kuotaPromo_updatepromo" required>
                                <label for="kuotaPromo_updatepromo">Kuota Promo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalMulai_updatepromo" placeholder="Tanggal Mulai" name="tanggalMulai_updatepromo" required>
                                <label for="tanggalMulai_updatepromo">Tanggal Mulai</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalAkhir_updatepromo" placeholder="Tanggal Akhir" name="tanggalAkhir_updatepromo" required>
                                <label for="tanggalAkhir_updatepromo">Tanggal Akhir</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <div class="form-floating is-invalid">
                                    <input type="text" class="form-control" id="minBelanja_updatepromo"
                                        name="minBelanja_updatepromo" placeholder="100" required>
                                    <label for="minBelanja_updatepromo">Minimal Belanja</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="statusPromo_updatepromo" name="statusPromo_updatepromo" required>
                                    <option selected disabled>Pilih Status Promo</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Tidak Aktif</option>
                                </select>
                                <label for="statusPromo_updatepromo">Status Promo</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updatebutton_swal">Update</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    // Format number
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function unformatNumber(num) {
        return num.toString().replace(/\./g, "").replace(/[^0-9]/g, "");
    }

    $(document).ready(function () {
    // Format angka saat input
    const minBelanjainput = document.getElementById('minBelanja_updatepromo');
    minBelanjainput.addEventListener('input', function (e) {
        const raw = unformatNumber(e.target.value);
        if (!isNaN(raw)) {
            e.target.value = formatNumber(raw);
        }
    });

    $('#updatepromoModal').on('show.bs.modal', function (event) {
        const btn = $(event.relatedTarget);
        const idpromo = btn.data('idpromo');
        const namapromo = btn.data('namapromo');
        const kodepromo = btn.data('kodepromo');
        const tipepromo = btn.data('tipepromo');
        const totalpromo = btn.data('totalpromo');
        const kuotapromo = btn.data('kuotapromo');
        const tanggalmulai = btn.data('tanggalmulai');
        const tanggalakhir = btn.data('tanggalakhir');
        const minbelanja = btn.data('minbelanja');
        const statuspromo = btn.data('statuspromo');

        $('#id_editpromo').val(idpromo);
        $('#namaPromo_updatepromo').val(namapromo);
        $('#kodePromo_updatepromo').val(kodepromo);
        $('#tipePromo_updatepromo').val(tipepromo);
        $('#totalPromo_updatepromo').val(totalpromo);
        $('#kuotaPromo_updatepromo').val(kuotapromo);
        $('#tanggalMulai_updatepromo').val(tanggalmulai);
        $('#tanggalAkhir_updatepromo').val(tanggalakhir);
        $('#minBelanja_updatepromo').val(minbelanja);
        $('#statusPromo_updatepromo').val(statuspromo);
    });

    $('#updatepromoModal form').on('submit', function () {
        $('#minBelanja_updatepromo').val(unformatNumber($('#minBelanja_updatepromo').val()));
    });

    $('#updatebutton_swal').click(function () {
        Swal.fire({
            title: 'Yakin Untuk Mengubah Data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Ubah Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#loadingOverlay').fadeIn(200);
                $('#updatepromoModal form').submit();
            }
        });
    });
});
</script>

