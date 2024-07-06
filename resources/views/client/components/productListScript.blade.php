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
                    $('#addingToCart'+product_id).text('Adding...');
                },
                success: function(response) {
                    $('#addingToCart'+product_id).text('Added to cart!');
                    $('#cartAmount'+product_id).text(response);
                    // delay 1 sec
                    setTimeout(function() {
                        $('#addingToCart'+product_id).text('Add more');
                    }, 1000);
                    // alert(response);
                },
                error: function(error) {
                    alert(error.message);
                }
            });
        }
        $(document).ready(function() {
        $('#addToCart').click();
    });
</script>
