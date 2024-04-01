<!-- Modal -->
<div class="modal fade" id="editprodukModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">ID Produk</label>
                                <input type="text" class="form-control" id="nama_addmember"
                                    placeholder="MK-001">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="email_addmember"
                                    placeholder="Makanan 01">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" id="gender_addmember">
                                    <option selected>Pilih Jenis Kategori</option>
                                    <option value="1">Baju</option>
                                    <option value="2">Jaket</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Diskon</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="tgllahir_addmember"
                                    placeholder="0">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Harga Jual Produk</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" class="form-control" id="nama_addmember"
                                    placeholder="122.000">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Stok Produk</label>
                                <input type="number" class="form-control" id="email_addmember"
                                    placeholder="999">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Lokasi Produk</label>
                                <input type="text" class="form-control" id="nama_addmember"
                                    placeholder="Rak Pertama">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Status Produk</label>
                                <select class="form-select" aria-label="Default select example" id="gender_addmember">
                                    <option selected>Pilih Status Produk</option>
                                    <option value="1">Tersedia</option>
                                    <option value="2">Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Foto Produk</label>
                                <input type="file" class="form-control" id="nama_addmember">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
