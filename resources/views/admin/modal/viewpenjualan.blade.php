<!-- Modal -->
<div class="modal fade" id="viewpenjualanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Penjualan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Tanggal dan Waktu</label>
                                <input type="datetime" class="form-control" id="tgl_viewtransaksi"
                                    placeholder="2016/04/15 05:06" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">No. Transaksi</label>
                                <input type="hidden" class="form-control" id="id_viewtransaksi" readonly>
                                <input type="text" class="form-control" id="no_viewtransaksi"
                                    placeholder="PR15042015" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Status Transaksi</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="status_viewtransaksi"
                                    placeholder="Berhasil" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Diskon Transaksi</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="diskon_viewtransaksi"
                                    placeholder="12" readonly>
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Total Transaksi</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" class="form-control" id="total_viewtransaksi"
                                    placeholder="122.000" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Kasir</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="petugas_viewtransaksi"
                                    placeholder="Bobi" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label  class="form-label">Member</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="member_viewtransaksi"
                                    placeholder="Bobo" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#viewpenjualanModal').on('show.bs.modal', function(event) {
            var btn = $(event.relatedTarget),
                idtransaksi = btn.data('idtransaksi'),
                notransaksi = btn.data('notransaksi'),
                namapetugas = btn.data('namapetugas'),
                tgltransaksi = btn.data('tgltransaksi'),
                namamember = btn.data('namamember'),
                diskontransaksi = btn.data('diskontransaksi'),
                totaltransaksi = btn.data('totaltransaksi'),
                statustransaksi = btn.data('statustransaksi');

            $('#viewpenjualanModal').find('#id_viewtransaksi').val(idtransaksi);
            $('#viewpenjualanModal').find('#no_viewtransaksi').val(notransaksi);
            $('#viewpenjualanModal').find('#petugas_viewtransaksi').val(namapetugas);
            $('#viewpenjualanModal').find('#tgl_viewtransaksi').val(tgltransaksi);
            $('#viewpenjualanModal').find('#member_viewtransaksi').val(namamember);
            $('#viewpenjualanModal').find('#diskon_viewtransaksi').val(diskontransaksi);
            $('#viewpenjualanModal').find('#total_viewtransaksi').val(totaltransaksi);
            $('#viewpenjualanModal').find('#status_viewtransaksi').val(statustransaksi);
        });
    });
</script>
