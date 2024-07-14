<script>
        function addToCart(product_id){
            // var product_id = $(this).data('product_id');
            $.ajax({
                url: "{{route('client.cart.add')}}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id
                },
                beforeSend: function() {
                    $('#addingToCart'+product_id).text('Đang thêm');
                },
                success: function(response) {
                    $('#addingToCart'+product_id).text('Đã thêm vào giỏ hàng!');
                    updateCartCount();
                    setTimeout(function() {
                        $('#addingToCart'+product_id).text('Mua thêm');
                    }, 1000);
                },
                error: function(error) {
                    alert(error.message);
                }
            });
        }
</script>
