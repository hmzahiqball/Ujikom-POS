<!-- Modal -->
<div class="modal fade" id="viewprodukModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_editproduk" name="id_editproduk">
                                <input type="text" class="form-control" id="kd_editproduk" placeholder="ID Produk" name="kd_editproduk" readonly readonly>
                                <label for="kd_editproduk">ID Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_editproduk" placeholder="Nama Produk" name="nama_editproduk" readonly readonly>
                                <label for="nama_editproduk">Nama Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kategori_editproduk" placeholder="Kategori Produk" name="kategori_editproduk" readonly>
                                <label for="kategori_editproduk">Kategori Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="form-floating is-invalid">
                                    <input type="number" class="form-control" id="diskon_editproduk"
                                        name="diskon_editproduk" placeholder="100" readonly>
                                    <label for="diskon_editproduk">Diskon Produk</label>
                                </div>
                                <span class="input-group-text" id="basic-addon1">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <div class="form-floating is-invalid">
                                    <input type="number" class="form-control" id="harga_editproduk"
                                        name="harga_editproduk" placeholder="100" readonly>
                                    <label for="harga_editproduk">Harga Jual Produk</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="stok_editproduk" placeholder="Stok Produk" name="stok_editproduk" readonly>
                                <label for="stok_editproduk">Stok Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lokasi_editproduk" placeholder="Lokasi Produk" name="lokasi_editproduk" readonly>
                                <label for="lokasi_editproduk">Lokasi Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="status_editproduk" placeholder="Status Produk" name="status_editproduk" readonly>
                                <label for="status_editproduk">Status Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="foto_editproduk">Foto Produk</label>
                                <div class="d-flex align-items-center">
                                    <img id="foto_preview" src="" alt="Foto Produk" class="me-3" width="300">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#viewprodukModal').on('show.bs.modal', function(event) {
            var btn = $(event.relatedTarget),
                idproduk = btn.data('idproduk'),
                kodeproduk = btn.data('kodeproduk'),
                namakategori = btn.data('namakategori'),
                namaproduk = btn.data('namaproduk'),
                stokproduk = btn.data('stokproduk'),
                hargaproduk = btn.data('hargaproduk'),
                statusproduk = btn.data('statusproduk'),
                diskonproduk = btn.data('diskonproduk'),
                lokasiproduk = btn.data('lokasiproduk'),
                fotoproduk = btn.data('fotoproduk');

            $('#viewprodukModal').find('#id_editproduk').val(idproduk);
            $('#viewprodukModal').find('#kd_editproduk').val(kodeproduk);
            $('#viewprodukModal').find('#nama_editproduk').val(namaproduk);
            $('#viewprodukModal').find('#kategori_editproduk').val(namakategori);
            $('#viewprodukModal').find('#diskon_editproduk').val(diskonproduk);
            $('#viewprodukModal').find('#harga_editproduk').val(hargaproduk);
            $('#viewprodukModal').find('#stok_editproduk').val(stokproduk);
            $('#viewprodukModal').find('#lokasi_editproduk').val(lokasiproduk);
            $('#viewprodukModal').find('#status_editproduk').val(statusproduk);
            $('#viewprodukModal').find('#foto_preview').attr('src', "{{ asset('uploads/') }}/" + fotoproduk);
            $('#editbutton_swal').data('namaprodukswal', namaproduk);
        });

        // SweetAlert confirmation
        $('#editbutton_swal').click(function() {
        var current_object = $(this);

            Swal.fire({
                title: 'Yakin Untuk Mengubah Data ' + current_object.data('namaprodukswal') + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Ubah Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user menekan "Yes, delete it!", submit form
                    $('#viewprodukModal form').submit();
                }
            });
        });
    });
</script>
