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
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_addproduk" placeholder="Nama Produk" name="nama_addproduk" required>
                                <label for="nama_addproduk">Nama Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="kategori_addproduk"
                                    name="kategori_addproduk" required>
                                    <option selected>Pilih Jenis Kategori</option>
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->nama_kategori }}"
                                            data-db-value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="kategori_addproduk">Kategori</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="form-floating is-invalid">
                                    <input type="number" class="form-control" id="diskon_addproduk"
                                        name="diskon_addproduk" placeholder="100" required>
                                    <label for="diskon_addproduk">Diskon Produk</label>
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
                                    <input type="number" class="form-control" id="harga_addproduk"
                                        name="harga_addproduk" placeholder="100" required>
                                    <label for="harga_addproduk">Harga Jual Produk</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="stok_addproduk" placeholder="Stok Produk" name="stok_addproduk" required>
                                <label for="stok_addproduk">Stok Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lokasi_addproduk" placeholder="Lokasi Produk" name="lokasi_addproduk" required>
                                <label for="lokasi_addproduk">Lokasi Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="status_addproduk"
                                    name="status_addproduk" required>
                                    <option selected>Pilih Status Produk</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                                <label for="kategori_addproduk">Status Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="foto_addproduk">Foto Produk</label>
                                <input type="file" class="form-control" id="foto_addproduk" placeholder="Foto Produk" name="foto_addproduk" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addbutton_swal">Save changes</button>
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
                    $('#addprodukModal form').submit();
                }
            });
        });
</script>

