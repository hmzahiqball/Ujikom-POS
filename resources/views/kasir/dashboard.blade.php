@extends('app')
@section('styles')
<style>
    body {
        font-family: 'Madimi One', cursive;
    }
</style>
@endsection
@section('content')
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    // Function to add product to cart
    function addToCart(product) {
        var productName = product.data('name');
        var productPrice = parseFloat(product.data('price'));

        // Append product details to cart
        $('#card-details').append(
            '<div class="mb-1">' +
            '<div class="row">' +
            '<div class="col">' +
            '<input type="text" class="form-control border-0" value="' + productName + '" readonly>' +
            '</div>' +
            '<div class="col">' +
            '<input type="text" class="form-control border-0 product-price" value="Rp. ' + productPrice.toFixed(2) + '" readonly>' +
            '</div>' +
            '<div class="col">' +
            '<input type="text" class="form-control border-0 product-quantity" value="1x" readonly>' +
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
});

</script>

@endsection

