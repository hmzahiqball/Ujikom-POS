<!-- Modal -->
<div class="modal fade" id="addmemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_addmember"
                                    placeholder="Isi Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email_addmember"
                                    placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">No. Telp</label>
                                <input type="number" class="form-control" id="telp_addmember"
                                    placeholder="081234567890">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat_addmember"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgllahir_addmember"
                                    placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" id="gender_addmember">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
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
