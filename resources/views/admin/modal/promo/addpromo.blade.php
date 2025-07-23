<!-- Modal -->
<div class="modal fade" id="addpromoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Promo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/datapromo/add') }}" method="POST"
                enctype="application/json">
                @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="namaPromo_addpromo" placeholder="Nama Promo" name="namaPromo_addpromo" required>
                                <label for="namaPromo_addpromo">Nama Promo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kodePromo_addpromo" placeholder="Kode Promo" name="kodePromo_addpromo" required>
                                <label for="kodePromo_addpromo">Kode Promo</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tipePromo_addpromo" name="tipePromo_addpromo" required>
                                    <option selected disabled>Pilih Tipe Promo</option>
                                    <option value="persen">Persen</option>
                                    <option value="nominal">Nominal</option>
                                </select>
                                <label for="tipePromo_addpromo">Tipe Promo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="totalPromo_addpromo" placeholder="Total Promo" name="totalPromo_addpromo" required>
                                <label for="totalPromo_addpromo">Total Promo</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="kuotaPromo_addpromo" placeholder="Kuota Promo" name="kuotaPromo_addpromo" required>
                                <label for="kuotaPromo_addpromo">Kuota Promo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalMulai_addpromo" placeholder="Tanggal Mulai" name="tanggalMulai_addpromo" required>
                                <label for="tanggalMulai_addpromo">Tanggal Mulai</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalAkhir_addpromo" placeholder="Tanggal Akhir" name="tanggalAkhir_addpromo" required>
                                <label for="tanggalAkhir_addpromo">Tanggal Akhir</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <div class="form-floating is-invalid">
                                    <input type="text" class="form-control" id="minBelanja_addpromo"
                                        name="minBelanja_addpromo" placeholder="100" required>
                                    <label for="minBelanja_addpromo">Minimal Belanja</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="statusPromo_addpromo" name="statusPromo_addpromo" required>
                                    <option selected disabled>Pilih Status Promo</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Tidak Aktif</option>
                                </select>
                                <label for="statusPromo_addpromo">Status Promo</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addbutton_swal">Save changes</button>
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

    // Format angka saat input
    const hargaModalInput = document.getElementById('minBelanja_addpromo');
    hargaModalInput.addEventListener('input', function (e) {
        const raw = unformatNumber(e.target.value);
        if (!isNaN(raw)) {
            e.target.value = formatNumber(raw);
        }
    });
    $('#addbutton_swal').click(function() {
        Swal.fire({
            title: 'Yakin Untuk Menambah Data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Tambah Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Unformat dulu sebelum submit
                $('#loadingOverlay').fadeIn(200);
                $('#minBelanja_addpromo').val(unformatNumber($('#minBelanja_addpromo').val()));

                $('#addpromoModal form').submit();
            }
        });
    });
</script>


