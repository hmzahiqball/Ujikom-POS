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
                                <input type="hidden" class="form-control" id="id_editpetugas">
                                <input type="text" class="form-control" id="kd_editpetugas"
                                    placeholder="MK-001">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_editpetugas"
                                    placeholder="Makanan 01">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">No. Telp</label>
                                <input type="number" class="form-control" id="telp_editpetugas"
                                    placeholder="081234567890">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Alamat E-mail</label>
                                <input type="text" class="form-control" id="email_editpetugas"
                                    placeholder="email@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Username Petugas</label>
                                <input type="text" class="form-control" id="username_editpetugas"
                                    placeholder="MK-001">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Password Petugas</label>
                                <input type="text" class="form-control" id="password_editpetugas"
                                    placeholder="Makanan 01">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Status Petugas</label>
                                <select class="form-select" aria-label="Default select example" id="status_editpetugas">
                                    <option selected>Pilih Status Produk</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Foto Petugas</label>
                                <input type="file" class="form-control" id="foto_editpetugas">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Alamat Petugas</label>
                                <textarea class="form-control" id="alamat_editpetugas"></textarea>
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
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#editpetugasModal').on('show.bs.modal', function(event) {
            var btn = $(event.relatedTarget),
                idpetugas = btn.data('idpetugas'),
                kodepetugas = btn.data('kodepetugas'),
                namapetugas = btn.data('namapetugas'),
                telppetugas = btn.data('telppetugas'),
                emailpetugas = btn.data('emailpetugas'),
                usernamepetugas = btn.data('usernamepetugas'),
                passwordpetugas = btn.data('passwordpetugas'),
                statuspetugas = btn.data('statuspetugas'),
                alamatpetugas = btn.data('alamatpetugas'),
                rolepetugas = btn.data('rolepetugas');

            $('#editpetugasModal').find('#id_editpetugas').val(idpetugas);
            $('#editpetugasModal').find('#kd_editpetugas').val(kodepetugas);
            $('#editpetugasModal').find('#nama_editpetugas').val(namapetugas);
            $('#editpetugasModal').find('#telp_editpetugas').val(telppetugas);
            $('#editpetugasModal').find('#email_editpetugas').val(emailpetugas);
            $('#editpetugasModal').find('#username_editpetugas').val(usernamepetugas);
            $('#editpetugasModal').find('#password_editpetugas').val(passwordpetugas);
            $('#editpetugasModal').find('#status_editpetugas').val(statuspetugas);
            $('#editpetugasModal').find('#alamat_editpetugas').val(alamatpetugas);
        });
    });
</script>
