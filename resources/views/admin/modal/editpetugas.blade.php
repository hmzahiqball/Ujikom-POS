<!-- Modal -->
<div class="modal fade" id="editpetugasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/datapetugas/update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_editpetugas" name="id_editpetugas">
                                <input type="text" class="form-control" id="kd_editpetugas" placeholder="ID Petugas" name="kd_editpetugas" required>
                                <label for="kd_editpetugas">ID Petugas</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_editpetugas" placeholder="Nama Petugas" name="nama_editpetugas" required>
                                <label for="nama_editpetugas">Nama Lengkap</label>
                            </div>
                        </div>
                    </div><div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="telp_editpetugas" placeholder="No. Telp" name="telp_editpetugas" required>
                                <label for="telp_editpetugas">No. Telp</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email_editpetugas" placeholder="Alamat E-Mail" name="email_editpetugas" required>
                                <label for="email_editpetugas">Alamat E-Mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username_editpetugas" placeholder="Username Petugas" name="username_editpetugas" required>
                                <label for="username_editpetugas">Username Petugas</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password_editpetugas" placeholder="Password Petugas" name="password_editpetugas" required>
                                <label for="password_editpetugas">Password Petugas</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="status_editpetugas"
                                    name="status_editpetugas" required>
                                    <option selected>Pilih Status Petugas</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                <label for="status_editpetugas">Status Petugas</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="role_editpetugas"
                                    name="role_editpetugas" required>
                                    <option selected>Hak Akses Petugas</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                                <label for="role_editpetugas">Hak Akses Petugas</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Alamat Petugas" id="alamat_editpetugas" name="alamat_editpetugas"></textarea>
                                <label for="alamat_editpetugas">Alamat Petugas</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Foto Petugas</label>
                                <div class="d-flex align-items-center">
                                    <img id="foto_preview" src="" alt="Foto Petugas" class="me-3" width="200">
                                    <input type="file" class="form-control" id="foto_editpetugas" name="foto_editpetugas">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editbutton_swal">Save changes</button>
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
                rolepetugas = btn.data('rolepetugas'),
                fotopetugas = btn.data('fotopetugas');

            $('#editpetugasModal').find('#id_editpetugas').val(idpetugas);
            $('#editpetugasModal').find('#kd_editpetugas').val(kodepetugas);
            $('#editpetugasModal').find('#nama_editpetugas').val(namapetugas);
            $('#editpetugasModal').find('#telp_editpetugas').val(telppetugas);
            $('#editpetugasModal').find('#email_editpetugas').val(emailpetugas);
            $('#editpetugasModal').find('#username_editpetugas').val(usernamepetugas);
            $('#editpetugasModal').find('#password_editpetugas').val(passwordpetugas);
            $('#editpetugasModal').find('#status_editpetugas').val(statuspetugas);
            $('#editpetugasModal').find('#alamat_editpetugas').val(alamatpetugas);
            $('#editpetugasModal').find('#role_editpetugas').val(rolepetugas);
            $('#editpetugasModal').find('#foto_preview').attr('src', "{{ asset('uploads/') }}/" + fotopetugas);
            $('#editbutton_swal').data('namapetugasswal', namapetugas);
        });

        // SweetAlert confirmation
        $('#editbutton_swal').click(function() {
        var current_object = $(this);

            Swal.fire({
                title: 'Yakin Untuk Mengubah Data ' + current_object.data('namapetugasswal') + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Ubah Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user menekan "Yes, delete it!", submit form
                    $('#editpetugasModal form').submit();
                }
            });
        });
    });
</script>
