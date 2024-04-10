<!-- Modal -->
<div class="modal fade" id="addprodukModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/dataproduk/add') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_addproduk" name="nama_addproduk"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" id="kategori_addproduk"
                                    name="kategori_addproduk">
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
                                    <input type="number" class="form-control" id="diskon_addproduk"
                                        name="diskon_addproduk" required>
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
                                    <input type="number" class="form-control" id="harga_addproduk"
                                        name="harga_addproduk" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Stok Produk</label>
                                <input type="number" class="form-control" id="stok_addproduk" name="stok_addproduk"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Lokasi Produk</label>
                                <input type="text" class="form-control" id="lokasi_addproduk"
                                    name="lokasi_addproduk" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Status Produk</label>
                                <select class="form-select" aria-label="Default select example" id="status_addproduk"
                                    name="status_addproduk">
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
                                <input type="text" class="form-control" id="foto_addproduk" name="foto_addproduk" value="jaket.jpg">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addbutton_swal">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    // SweetAlert confirmation
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
                    // Jika user menekan "Yes, delete it!", submit form
                    $('#addprodukModal').submit();
                }
            });
        });
</script>

