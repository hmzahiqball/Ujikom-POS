<!-- Modal -->
<div class="modal fade" id="editprodukModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/dataproduk/update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">ID Produk</label>
                                <input type="hidden" class="form-control" id="id_editproduk" name="id_editproduk">
                                <input type="text" class="form-control" id="kd_editproduk" name="kd_editproduk"
                                    readonly required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_editproduk" name="nama_editproduk"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" id="kategori_editproduk"
                                    name="kategori_editproduk">
                                    <option selected>Pilih Jenis Kategori</option>
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->nama_kategori }}"
                                            data-db-value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Diskon</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="diskon_editproduk"
                                        name="diskon_editproduk" required>
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Harga Jual Produk</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" class="form-control" id="harga_editproduk"
                                        name="harga_editproduk" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Stok Produk</label>
                                <input type="number" class="form-control" id="stok_editproduk" name="stok_editproduk"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Lokasi Produk</label>
                                <input type="text" class="form-control" id="lokasi_editproduk"
                                    name="lokasi_editproduk" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Status Produk</label>
                                <select class="form-select" aria-label="Default select example" id="status_editproduk"
                                    name="status_editproduk">
                                    <option selected>Pilih Status Produk</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Foto Produk</label>
                                <input type="text" class="form-control" id="foto_editproduk" name="foto_editproduk" value="jaket.jpg">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editbutton_swal" data-namaprodukswal="">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#editprodukModal').on('show.bs.modal', function(event) {
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

            $('#editprodukModal').find('#id_editproduk').val(idproduk);
            $('#editprodukModal').find('#kd_editproduk').val(kodeproduk);
            $('#editprodukModal').find('#nama_editproduk').val(namaproduk);
            $('#editprodukModal').find('#kategori_editproduk').val(namakategori);
            $('#editprodukModal').find('#diskon_editproduk').val(diskonproduk);
            $('#editprodukModal').find('#harga_editproduk').val(hargaproduk);
            $('#editprodukModal').find('#stok_editproduk').val(stokproduk);
            $('#editprodukModal').find('#lokasi_editproduk').val(lokasiproduk);
            $('#editprodukModal').find('#status_editproduk').val(statusproduk);
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
                    $('#editprodukModal').submit();
                }
            });
        });
    });
</script>
