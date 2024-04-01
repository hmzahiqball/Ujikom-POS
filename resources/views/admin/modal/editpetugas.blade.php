<!-- Modal -->
<div class="modal fade" id="editpetugasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">ID Petugas</label>
                                <input type="text" class="form-control" id="nama_addmember"
                                    placeholder="MK-001">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="email_addmember"
                                    placeholder="Makanan 01">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">No. Telp</label>
                                <input type="number" class="form-control" id="nama_addmember"
                                    placeholder="081234567890">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Alamat E-mail</label>
                                <input type="text" class="form-control" id="email_addmember"
                                    placeholder="email@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Status Petugas</label>
                                <select class="form-select" aria-label="Default select example" id="gender_addmember">
                                    <option selected>Pilih Status Produk</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Foto Petugas</label>
                                <input type="file" class="form-control" id="email_addmember">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Alamat Petugas</label>
                                <textarea class="form-control" id="nama_addmember"></textarea>
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
