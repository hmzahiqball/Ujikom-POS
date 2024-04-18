<!-- Modal -->
<div class="modal fade" id="editmemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/datamember/update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_editmember" name="id_editmember">
                                <input type="text" class="form-control" id="nama_editmember" placeholder="Nama Lengkap Member" name="nama_editmember" required>
                                <label for="nama_editmember">Nama Lengkap Member</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tgllahir_editmember" placeholder="Tanggal Lahir Member" name="tgllahir_editmember" required>
                                <label for="tgllahir_editmember">Tanggal Lahir Member</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="telp_editmember" placeholder="No. Telp  Member" name="telp_editmember" required>
                                <label for="telp_editmember">No. Telp  Member</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email_editmember" placeholder="Email  Member" name="email_editmember" required>
                                <label for="email_editmember">Email  Member</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="gender_editmember" name="gender_editmember">
                                    <option>Pilih Gender Member</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <label for="gender_editmember">Gender Member</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="status_editmember" name="status_editmember">
                                    <option>Pilih Status Member</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                <label for="status_editmember">Status Member</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Alamat Member</label>
                                <textarea class="form-control" id="alamat_editmember" name="alamat_editmember"></textarea>
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
        $('#editmemberModal').on('show.bs.modal', function(event) {
            var btn = $(event.relatedTarget),
                idmember = btn.data('idmember'),
                namamember = btn.data('namamember'),
                alamatmember = btn.data('alamatmember'),
                telpmember = btn.data('telpmember'),
                emailmember = btn.data('emailmember'),
                tgllahirmember = btn.data('tgllahirmember'),
                gendermember = btn.data('gendermember'),
                statusmember = btn.data('statusmember');

            $('#editmemberModal').find('#id_editmember').val(idmember);
            $('#editmemberModal').find('#nama_editmember').val(namamember);
            $('#editmemberModal').find('#alamat_editmember').val(alamatmember);
            $('#editmemberModal').find('#telp_editmember').val(telpmember);
            $('#editmemberModal').find('#email_editmember').val(emailmember);
            $('#editmemberModal').find('#tgllahir_editmember').val(tgllahirmember);
            $('#editmemberModal').find('#gender_editmember').val(gendermember);
            $('#editmemberModal').find('#status_editmember').val(statusmember);
            $('#editbutton_swal').data('namamemberswal', namamember);
        });

        // SweetAlert confirmation
        $('#editbutton_swal').click(function() {
        var current_object = $(this);

            Swal.fire({
                title: 'Yakin Untuk Mengubah Data ' + current_object.data('namamemberswal') + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Ubah Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user menekan "Yes, delete it!", submit form
                    $('#editmemberModal form').submit();
                }
            });
        });
    });
</script>
