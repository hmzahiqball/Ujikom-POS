@extends('app')
@section('styles')
<style>
    body {
        font-family: 'Madimi One', cursive;
    }
    .btn-circle{
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 12px;
        background-size: cover;
        text-align: center;
    }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-8">
      <!-- Bagian kiri untuk menampilkan card produk -->
      <h3>Produk</h3>

      <!-- Filter kategori -->
      <div class="mb-3">
        <button type="button" class="btn btn-dark btn-circle" data-category="all">All</button>
        <button type="button" class="btn btn-dark btn-circle" data-category="jam">Jaket</button>
        <button type="button" class="btn btn-dark btn-circle" data-category="kamera">Kaos</button>
        <button type="button" class="btn btn-dark btn-circle" data-category="sepatu">Celana</button>
        <button type="button" class="btn btn-dark btn-circle" data-category="headset">Sepatu</button>
        <button type="button" class="btn btn-dark btn-circle" data-category="headset">Acc</button>
      </div>
      <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari produk...">
    </div>
        <hr>
      <div class="row">
        <div class="col mb-3">
          <div class="card" style="width: 180px;" id="cardproduct">
            <img src="{{asset('images/product1.jpeg')}}" class="card-img-top" alt="Jaket1">
            <div class="card-body">
              <h5 class="card-title product-name">Jaket 1</h5>
              <p class="card-text">Rp. 100.000</p>
              <button class="btn btn-success add-to-cart-button" data-name="Jaket 1" data-price="10000000" data-stock="10">Add</button>
              <span id="stokbrg" class="form-text">
                Stok : 10
              </span>
            </div>
          </div>
        </div>
        <div class="col mb-3">
          <div class="card" style="width: 180px" id="cardproduct">
            <img src="{{asset('images/product2.jpeg')}}" class="card-img-top" alt="Kaos1">
            <div class="card-body">
              <h5 class="card-title">Kaos 1</h5>
              <p class="card-text">Rp. 7.299.000</p>
              <button class="btn btn-success add-to-cart-button" data-name="Kaos 1" data-price="7299000" data-stock="20">Add</button>
              <span id="stokbrg" class="form-text">
                Stok : 20
              </span>
            </div>
          </div>
        </div>
        <div class="col mb-3">
          <div class="card" style="width: 180px" id="cardproduct">
            <img src="{{asset('images/product3.jpeg')}}" class="card-img-top" alt="Jaket2">
            <div class="card-body">
              <h5 class="card-title">Jaket 2</h5>
              <p class="card-text">Rp. 3.999.000</p>
              <button class="btn btn-success add-to-cart-button" data-name="Jaket 2" data-price="3999000" data-stock="30">Add</button>
              <span id="stokbrg" class="form-text">
                Stok : 30
              </span>
            </div>
          </div>
        </div>
        <div class="col mb-3">
          <div class="card" style="width: 180px" id="cardproduct">
            <img src="{{asset('images/product4.jpeg')}}" class="card-img-top" alt="Jaket3">
            <div class="card-body">
              <h5 class="card-title" id="judulcard">Jaket 3</h5>
              <p class="card-text">Rp. 199.000</p>
              <button class="btn btn-success add-to-cart-button" data-name="Jaket 3" data-price="199000" data-stock="40">Add</button>
              <span id="stokbrg" class="form-text">
                Stok : 40
              </span>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-4">
    <h3>Keranjang</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Keranjang</h5>
            <form id="checkoutForm">
                <!-- Informasi barang -->
                <div class="mb-1" id="card-details">
                    <label class="form-label">Barang</label>
                </div>

                <!-- Total Harga -->
                <hr>
                <div class="mb-3">
                    <label class="form-label">Total Harga :</label>
                    <input type="text" class="form-control-plaintext border-0" id="totalPrice" readonly>
                </div>
                <hr>
                <!-- Total Bayar dan Kembalian -->
                <div class="mb-3">
                    <label for="totalPayment" class="form-label">Total Bayar :</label>
                    <input type="text" class="form-control border-0" id="totalPayment">
                </div>
                <div class="mb-3">
                    <label for="change" class="form-label">Kembalian :</label>
                    <input type="text" class="form-control-plaintext border-0" id="change" readonly>
                </div>
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                <!-- Tombol Clear Keranjang -->
                <button type="button" class="btn btn-danger" id="clearCart">Clear Keranjang</button>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){

    // Function to add product to cart
    function addToCart(product) {
        var productName = product.data('name');
        var productPrice = parseFloat(product.data('price'));

        // Kurangi stok barang
        var stok = parseInt(product.siblings('#stokbrg').text().trim().split(':')[1].trim());
        if (stok <= 0) {
            alert('Stok barang habis!');
            return;
        }
        stok--;
        product.siblings('#stokbrg').text('Stok : ' + stok);

        // Append product details to cart
        $('#card-details').append(
            '<div class="mb-1">' +
            '<div class="row">' +
            '<div class="col-md-5">' +
            '<input type="text" class="form-control-plaintext border-0" value="' + productName + '" readonly>' +
            '</div>' +
            '<div class="col-md-5">' +
            '<input type="text" class="form-control-plaintext border-0 product-price" value="Rp. ' + productPrice.toFixed(2) + '"  readonly>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<input type="text" class="form-control-plaintext border-0 product-quantity" value="1x" readonly>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
            // Recalculate total price
            calculateTotalPrice();
    }

    // Function to calculate total price
    function calculateTotalPrice() {
            var totalPrice = 0;
            $('.product-price').each(function() {
                var price = parseFloat($(this).val().replace('Rp. ', ''));
                var quantity = parseInt($(this).closest('.row').find('.product-quantity').val());
                totalPrice += price * quantity;
            });
            $('#totalPrice').val('Rp. ' + totalPrice.toFixed(2));
        }

        // Event listener for 'Tambahkan ke Keranjang' button click
        $('.add-to-cart-button').click(function(){
            var product = $(this);
            addToCart(product);
        });

        // Event listener for change in product quantity
        $(document).on('input', '.product-quantity', function() {
            calculateTotalPrice();
        });

        // Event listener for total payment change
        $("#totalPayment").change(function(){
            calculateChange();
        });

        // Function to calculate change
        function calculateChange() {
            var totalPayment = parseFloat($("#totalPayment").val());
            var totalPrice = parseFloat($("#totalPrice").val().replace('Rp. ', ''));
            var change = totalPayment - totalPrice;
            $("#change").val(change.toFixed(2));
        }

        // Event listener for form submission
        $("#checkoutForm").submit(function(event){
            event.preventDefault(); // Prevent form submission

            // Perform any other action you need here, like submitting the data to the server
            // For now, let's just log the data
            console.log("Nama Barang: " + $("#productName").val());
            console.log("Harga Barang: " + $("#productPrice").val());
            console.log("Quantity: " + $("#quantity").val());
            console.log("Total Harga: " + $("#totalPrice").val());
            console.log("Total Bayar: " + $("#totalPayment").val());
            console.log("Kembalian: " + $("#change").val());
        });

        // Event listener for Clear Keranjang button click
        $("#clearCart").click(function(){
            $('#card-details').empty(); // Clear the cart details
            $('#totalPrice').val('Rp. 0.00'); // Reset total price
            $("#totalPayment").val(''); // Reset total payment
            $("#change").val(''); // Reset change
            // Reset stok barang ke nilai awal
            $('.add-to-cart-button').each(function() {
                var stock = $(this).data('stock');
                $(this).siblings('#stokbrg').text('Stok : ' + stock);
            });
        });
});

</script>

@endsection

