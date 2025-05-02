<!-- Modal -->
<div class="modal fade" id="addpembelianModal" tabindex="-1" aria-labelledby="addPembelianLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h1 class="modal-title fs-5" id="addPembelianLabel">Tambah Pembelian</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form id="form_addPembelian">
            @csrf
            <div class="mb-3">
              <label for="supplier" class="form-label">Supplier</label>
              <select class="form-select" id="supplier" name="p_idSuppliers" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach($supplier as $s)
                  <option value="{{ $s['id_suppliers'] }}">{{ $s['nama_suppliers'] }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal Pembelian</label>
              <input type="date" class="form-control" name="p_tanggal" id="tanggal" required>
            </div>

            <div class="mb-3">
              <label>Detail Produk</label>
              <table class="table table-bordered" id="detailPembelianTable">
                <thead class="table-dark">
                  <tr>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga Modal</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="5" class="text-center">
                      <button type="button" class="btn btn-success btn-sm w-100" id="addProdukRow">+ Tambah Produk</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="mb-3">
              <label for="totalHarga" class="form-label">Total Harga</label>
              <input type="number" class="form-control" name="p_totalHarga" id="totalHarga" readonly>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="submitPembelian">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const produkList = @json($produk);

    function hitungTotal() {
      let total = 0;
      $('#detailPembelianTable tbody tr').each(function () {
        const subtotal = parseFloat($(this).find('.subtotal').val()) || 0;
        total += subtotal;
      });
      $('#totalHarga').val(total);
    }

    $(document).ready(function () {
      // Tambah baris produk
      $('#addProdukRow').click(function () {
        let produkOptions = '';
        produkList.forEach(p => {
          produkOptions += `<option value="${p.id_produk}" data-harga="${p.modal_produk}">${p.nama_produk}</option>`;
        });

        $('#detailPembelianTable tbody').append(`
          <tr>
            <td>
              <select class="form-select produkSelect" name="p_detailPembelian[][p_idProduk]" required>
                <option value="">-- Pilih Produk --</option>
                ${produkOptions}
              </select>
            </td>
            <td><input type="number" class="form-control kuantitas" name="p_detailPembelian[][p_kuantitas]" min="1" value="1" required></td>
            <td><input type="number" class="form-control harga" name="p_detailPembelian[][p_harga]" readonly required></td>
            <td><input type="number" class="form-control subtotal" name="p_detailPembelian[][p_subTotal]" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm removeRowBtn">Hapus</button></td>
          </tr>
        `);
      });

      // Auto-set harga saat pilih produk
      $('#detailPembelianTable').on('change', '.produkSelect', function () {
        const harga = $(this).find(':selected').data('harga') || 0;
        const row = $(this).closest('tr');
        row.find('.harga').val(harga);

        const qty = parseInt(row.find('.kuantitas').val()) || 1;
        row.find('.subtotal').val(qty * harga);
        hitungTotal();
      });

      // Update subtotal saat kuantitas berubah
      $('#detailPembelianTable').on('input', '.kuantitas', function () {
        const row = $(this).closest('tr');
        const qty = parseFloat(row.find('.kuantitas').val()) || 0;
        const harga = parseFloat(row.find('.harga').val()) || 0;
        row.find('.subtotal').val(qty * harga);
        hitungTotal();
      });

      // Hapus baris produk
      $('#detailPembelianTable').on('click', '.removeRowBtn', function () {
        $(this).closest('tr').remove();
        hitungTotal();
      });

      // Submit ke API
      $('#submitPembelian').click(function () {
        const formData = $('#form_addPembelian').serializeArray();
        const payload = {
          p_idSuppliers: $('#supplier').val(),
          p_tanggal: $('#tanggal').val(),
          p_totalHarga: parseFloat($('#totalHarga').val()),
          p_detailPembelian: []
        };

        $('#detailPembelianTable tbody tr').each(function () {
          const idProduk = $(this).find('.produkSelect').val();
          if (idProduk) {
            payload.p_detailPembelian.push({
              p_idProduk: idProduk,
              p_kuantitas: $(this).find('.kuantitas').val(),
              p_harga: $(this).find('.harga').val(),
              p_subTotal: $(this).find('.subtotal').val(),
            });
          }
        });

        if (!payload.p_idSuppliers || !payload.p_tanggal || payload.p_detailPembelian.length === 0) {
          Swal.fire('Gagal', 'Data belum lengkap.', 'warning');
          return;
        }

        Swal.fire({
          title: 'Yakin ingin menambahkan pembelian?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Ya, Simpan'
        }).then(result => {
          if (result.isConfirmed) {
            $.ajax({
              url: 'http://localhost:1111/api/pembelian',
              method: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(payload),
              success: function (res) {
                Swal.fire('Berhasil', res.message, 'success').then(() => location.reload());
              },
              error: function (xhr) {
                const msg = xhr.responseJSON?.message || 'Gagal menyimpan pembelian';
                Swal.fire('Error', msg, 'error');
              }
            });
          }
        });
      });
    });
  </script>
