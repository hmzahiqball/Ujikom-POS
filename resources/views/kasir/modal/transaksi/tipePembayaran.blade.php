<style>
    #paymentTypeGroup .btn-check:checked + .btn {
    background-color: #198754; /* Bootstrap green */
    color: white;
    border-color: #198754;
}
</style>

<!-- Modal -->
<div class="modal fade" id="paymentMethodModal" tabindex="-1" aria-labelledby="paymentMethodLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="paymentMethodLabel">Pilih Metode Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::asset('/kasir/transaksi/add-payment') }}" method="POST" id="paymentForm">
                    @csrf

                    <div class="d-flex flex-wrap gap-2 justify-content-center mb-3" id="paymentTypeGroup">
                        @php
                            $metode = ['Tunai', 'Kartu', 'QRIS', 'Lainnya'];
                        @endphp
                        @foreach ($metode as $tipe)
                            <input type="radio" class="btn-check" name="payment_type" id="payment_{{ strtolower($tipe) }}" value="{{ $tipe }}" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="payment_{{ strtolower($tipe) }}">{{ $tipe }}</label>
                        @endforeach
                    </div>

                    <!-- Hidden atau input lain bisa lo tambahin di sini -->
                    <input type="hidden" name="total_harga" value="{{ old('total_harga') }}" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="submitPayment">Bayar Sekarang</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#submitPayment').click(function () {
            const selected = $('input[name="payment_type"]:checked').val();

            if (!selected) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pilih Metode Pembayaran Dulu!',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }

            Swal.fire({
    title: 'Lanjutkan Pembayaran?',
    text: `Metode: ${selected}`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Ya, Bayar!',
    cancelButtonText: 'Batal',
    confirmButtonColor: '#198754',
    cancelButtonColor: '#6c757d'
}).then((result) => {
    if (result.isConfirmed) {
        // Tampilkan lagi verifikasi manual
        Swal.fire({
            title: 'Silakan Selesaikan Pembayaran',
            text: `Selesaikan pembayaran secara manual via metode: ${selected}`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sudah Dibayar',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#198754',
            cancelButtonColor: '#6c757d'
        }).then((confirmManual) => {
            if (confirmManual.isConfirmed) {
                // Inject payment type ke form utama
                $('#inputPaymentType').val(selected);

                // Submit form utama
                $('#checkoutForm').submit();
            }
        });
    }
});
        });
    });
</script>
