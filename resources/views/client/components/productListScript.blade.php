<script>
    console.log(currentLang);

    function addToCart(product_id) {
        // var product_id = $(this).data('product_id');
        $.ajax({
            url: "{{ route('client.cart.add') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: product_id
            },
            beforeSend: function() {
                if (currentLang == 'en') {
                    $('#addingToCart' + product_id).text('Adding');
                } else {
                    $('#addingToCart' + product_id).text('Đang thêm');
                }
            },
            success: function(response) {
                if (currentLang == 'en') {
                    $('#addingToCart' + product_id).text('Added to cart!');
                } else {
                    $('#addingToCart' + product_id).text('Đã thêm vào giỏ hàng!');
                }
                updateCartCount();
                setTimeout(function() {
                    if (currentLang == 'en') {
                        $('#addingToCart' + product_id).text('Add more');
                    } else {
                        $('#addingToCart' + product_id).text('Mua thêm');
                    }
                }, 1000);
            },
            error: function(error) {
                alert(error.message);
            }
        });
    }
</script>
