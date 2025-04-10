<!-- Modal -->
<div class="modal fade" id="editprodukModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/admin/dataproduk/update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_editproduk" name="id_editproduk">
                                <input type="text" class="form-control" id="kd_editproduk" placeholder="ID Produk" name="kd_editproduk" readonly required>
                                <label for="kd_editproduk">ID Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_editproduk" placeholder="Nama Produk" name="nama_editproduk" readonly required>
                                <label for="nama_editproduk">Nama Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="kategori_editproduk"
                                    name="kategori_editproduk" required>
                                    <option selected>Pilih Jenis Kategori</option>
                                    @foreach ($kategori_unik as $kat)
                                        <option value="{{ $kat->id_kategori }}"
                                            data-db-value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="kategori_editproduk">Kategori</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="subkategori_editproduk"
                                    name="subkategori_editproduk" required>
                                    <option selected>Pilih Jenis Sub-Kategori</option>
                                    @foreach ($kategori as $sub)
                                        <option value="{{ $sub->id_subkategori }}" data-kategori-id="{{ $sub->id_kategori }}"
                                            data-db-value="{{ $sub->id_subkategori }}">{{ $sub->nama_subkategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="subkategori_editproduk">Sub-Kategori</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <div class="form-floating is-invalid">
                                    <input type="text" class="form-control" id="hargaModal_editproduk"
                                        name="hargaModal_editproduk" placeholder="100" required>
                                    <label for="hargaModal_editproduk">Harga Modal Produk</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <div class="form-floating is-invalid">
                                    <input type="text" class="form-control" id="hargaJual_editproduk"
                                        name="hargaJual_editproduk" placeholder="100" required>
                                    <label for="hargaJual_editproduk">Harga Jual Produk</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="form-floating is-invalid">
                                    <input type="number" class="form-control" id="diskon_editproduk"
                                        name="diskon_editproduk" placeholder="100" required>
                                    <label for="diskon_editproduk">Diskon Produk</label>
                                </div>
                                <span class="input-group-text" id="basic-addon1">%</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="hargaDiskon_editproduk" placeholder="Harga Diskon" name="hargaDiskon_editproduk" required>
                                <label for="hargaDiskon_editproduk">Harga Setelah Diskon</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="stok_editproduk" placeholder="Stok Produk" name="stok_editproduk" required>
                                <label for="stok_editproduk">Stok Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="stokMin_editproduk" placeholder="Stok Produk" name="stokMin_editproduk" required>
                                <label for="stokMin_editproduk">Stok Minimum</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="barcode_editproduk" placeholder="Barcode Produk" name="barcode_editproduk" required>
                                <label for="barcode_editproduk">Barcode Produk</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="status_editproduk"
                                    name="status_editproduk" required>
                                    <option selected>Pilih Status Produk</option>
                                    <option value="Available">Tersedia</option>
                                    <option value="Kosong">Tidak Tersedia</option>
                                </select>
                                <label for="status_editproduk">Status Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="deskripsi_editproduk" placeholder="Deskripsi Produk" name="deskripsi_editproduk" required></textarea>
                                <label for="deskripsi_editproduk">Deskripsi Produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="foto_editproduk">Foto Produk</label>
                                <div class="d-flex align-items-center">
                                    <img id="foto_preview" src="" alt="Foto Produk" class="me-3" width="100">
                                    <input type="file" class="form-control" id="foto_editproduk" placeholder="Foto Produk" name="foto_editproduk">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editbutton_swal" data-namaprodukswal="">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function unformatNumber(num) {
        return num.toString().replace(/\./g, "");
    }

    function hitungHargaDiskon() {
        const hargaJualInput = document.getElementById('hargaJual_editproduk');
        const diskonInput = document.getElementById('diskon_editproduk');
        const hargaDiskonInput = document.getElementById('hargaDiskon_editproduk');

        const hargaJual = parseInt(unformatNumber(hargaJualInput.value)) || 0;
        const diskon = parseFloat(unformatNumber(diskonInput.value)) || 0;
        
        const hasilDiskon = hargaJual - (hargaJual * (diskon / 100));
        hargaDiskonInput.value = formatNumber(Math.floor(hasilDiskon));
    }

    // Tambahkan event listener dinamis
    document.getElementById('hargaJual_editproduk').addEventListener('input', hitungHargaDiskon);
    document.getElementById('diskon_editproduk').addEventListener('input', hitungHargaDiskon);

    document.addEventListener('DOMContentLoaded', function () {
        const hargaJualInput = document.getElementById('hargaJual_editproduk');
        const hargaModalInput = document.getElementById('hargaModal_editproduk');
        const diskonInput = document.getElementById('diskon_editproduk');

        [hargaJualInput, hargaModalInput, diskonInput].forEach(input => {
            input.addEventListener('input', function (e) {
                const raw = unformatNumber(e.target.value);
                if (!isNaN(raw)) {
                    e.target.value = formatNumber(raw);
                }
            });
        });

        $('#editprodukModal').on('show.bs.modal', function(event) {
            var btn = $(event.relatedTarget),
                idproduk = btn.data('idproduk'),
                idkategori = btn.data('idkategori'),
                idsubkategori = btn.data('idsubkategori'),
                kodeproduk = btn.data('kodeproduk'),
                namakategori = btn.data('namakategori'),
                namasubkategori = btn.data('namasubkategori'),
                namaproduk = btn.data('namaproduk'),
                barcodeproduk = btn.data('barcodeproduk'),
                deskripsiproduk = btn.data('deskripsiproduk'),
                hargaproduk = btn.data('hargaproduk'),
                modalproduk = btn.data('modalproduk'),
                diskonproduk = btn.data('diskonproduk'),
                stokproduk = btn.data('stokproduk'),
                stokminimumproduk = btn.data('stokminimumproduk'),
                statusproduk = btn.data('statusproduk'),
                fotoproduk = btn.data('fotoproduk');

            // Hitung harga diskon
            var hargaDiskon = hargaproduk - (hargaproduk * (diskonproduk / 100));

            // Format angka sebelum ditampilkan
            var hargaFormatted = formatNumber(hargaproduk);
            var modalFormatted = formatNumber(modalproduk);
            var diskonFormatted = formatNumber(diskonproduk);
            var hargaDiskonFormatted = formatNumber(Math.floor(hargaDiskon));

            $('#editprodukModal').find('#id_editproduk').val(idproduk);
            $('#editprodukModal').find('#kd_editproduk').val(kodeproduk);
            $('#editprodukModal').find('#nama_editproduk').val(namaproduk);
            $('#editprodukModal').find('#kategori_editproduk').val(idkategori);
            $('#editprodukModal').find('#subkategori_editproduk').val(idsubkategori);
            $('#editprodukModal').find('#barcode_editproduk').val(barcodeproduk);
            $('#editprodukModal').find('#diskon_editproduk').val(diskonFormatted);
            $('#editprodukModal').find('#hargaModal_editproduk').val(modalFormatted);
            $('#editprodukModal').find('#hargaJual_editproduk').val(hargaFormatted);
            $('#editprodukModal').find('#hargaDiskon_editproduk').val(hargaDiskonFormatted);
            $('#editprodukModal').find('#stok_editproduk').val(stokproduk);
            $('#editprodukModal').find('#stokMin_editproduk').val(stokminimumproduk);
            $('#editprodukModal').find('#status_editproduk').val(statusproduk);
            $('#editprodukModal').find('#deskripsi_editproduk').val(deskripsiproduk);
            $('#editprodukModal').find('#foto_preview').attr('src', "{{ asset('uploads/') }}/" + fotoproduk);
            $('#editbutton_swal').data('namaprodukswal', namaproduk);

            const selectedKategoriId = $('#kategori_editproduk').val();
            const allSubkategoriOptions = $('#subkategori_editproduk option').clone().slice(1);
            $('#subkategori_editproduk').html('<option selected disabled>Pilih Jenis Sub-Kategori</option>');
            allSubkategoriOptions.each(function () {
                if ($(this).data('kategori-id') == selectedKategoriId) {
                    $('#subkategori_editproduk').append($(this));
                }
            });
            $('#subkategori_editproduk').val(idsubkategori);
        });

        // Unformat angka sebelum submit
        $('#editprodukModal form').on('submit', function () {
            $('#hargaJual_editproduk').val(unformatNumber($('#hargaJual_editproduk').val()));
            $('#hargaModal_editproduk').val(unformatNumber($('#hargaModal_editproduk').val()));
            $('#diskon_editproduk').val(unformatNumber($('#diskon_editproduk').val()));
        });

        // SweetAlert confirmation
        $('#editbutton_swal').click(function() {
        var current_object = $(this);

            Swal.fire({
                title: 'Yakin Untuk Mengubah Data ' + current_object.data('namaprodukswal') + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Ubah Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user menekan "Yes, delete it!", submit form
                    $('#editprodukModal form').submit();
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kategoriSelect = document.getElementById('kategori_editproduk');
        const subkategoriSelect = document.getElementById('subkategori_editproduk');

        // Simpan semua opsi subkategori di awal
        const allSubkategoriOptions = Array.from(subkategoriSelect.options).slice(1); // Skip "Pilih Jenis Sub-Kategori"

        kategoriSelect.addEventListener('change', function () {
            const selectedKategoriId = this.value;

            // Reset subkategori
            subkategoriSelect.innerHTML = '<option selected disabled>Pilih Jenis Sub-Kategori</option>';

            // Filter subkategori sesuai id_kategori yang dipilih
            const filteredOptions = allSubkategoriOptions.filter(option => {
                return option.dataset.kategoriId === selectedKategoriId;
            });

            // Tambahkan opsi yang lolos filter
            filteredOptions.forEach(option => {
                subkategoriSelect.appendChild(option);
            });
        });
    });
</script>
