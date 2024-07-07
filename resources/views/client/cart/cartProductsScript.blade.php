<script>
    let subTotal = {{ $subTotal }};

    function removeDiscount() {
        $.ajax({
            url: "{{ route('client.cart.removeVoucher') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                calculateTotal(data.subTotal,data.discount);
            }
        });
    }

    // function removeProduct(id) {
    //     $.ajax({
    //         url: "{{ route('client.cart.remove') }}",
    //         method: "POST",
    //         data: {
    //             _token: "{{ csrf_token() }}",
    //             'product_id': id
    //         },
    //         success: function(data) {

    //             $('#product-' + id).css('display', 'none');
    //             // Check if the cart is empty after removing the product
    //             if (data.cartCount === 0) {
    //                 subTotal = 0; // Reset subtotal if the cart is empty
    //             } else {
    //                 subTotal = subTotal - $('#product-' + id).find('.total').text().replace('đ', '')
    //                     .replace(
    //                         ',', '').replace('.', '');
    //             }

    //             calculateTotal(data.discount);
    //         }
    //     });
    // }

    // function updateProduct(id, quantity) {
    //     $.ajax({
    //         url: "{{ route('client.cart.update') }}",
    //         method: "POST",
    //         data: {
    //             _token: "{{ csrf_token() }}",
    //             'product_id': id,
    //             'quantity': quantity
    //         },
    //         success: function(data) {
    //             // Update the subtotal element in the UI immediately
    //             $('#subTotal').text(new Intl.NumberFormat('de-DE').format(data.subTotal) + 'đ');
    //             // $('#total-' + id).attr('value')
    //             $('#total-' + id).text(new Intl.NumberFormat('de-DE').format(data.real_price) + 'đ');
    //             console.log(data);
    //             subTotal = data.subTotal;
    //             calculateTotal(data.discount);
    //         }
    //     });
    // }

    // function calculateTotal(discount = 0) {
    //     if (discount > 0) $('#removeDiscount').text('Xoá voucher');
    //     else $('#removeDiscount').text('');
    //     $('#totalPrice')
    //         .text(subTotal - discount < 0 ? 0 : new Intl.NumberFormat('de-DE').format(subTotal - discount) + 'đ');

    //     $('#subTotal')
    //         .text(subTotal < 0 ? 0 : new Intl.NumberFormat('de-DE').format(subTotal) + 'đ');

    //     $('#discountPrice')
    //         .text((discount < 0 ? 0 : (new Intl.NumberFormat('de-DE').format(discount))) + 'đ');
    // }

    $(document).ready(function() {
        // calculateTotal({{ $discount }});

        var quantitiy = 0;

        // $('.quantity-right-plus').click(function(e) {
        //     e.preventDefault();
        //     const productId = $(this).data('id');
        //     const quantityInput = $('#quantity-' + productId);
        //     let quantity = parseInt(quantityInput.val()) + 1;

        //     console.log(quantity);
        //     quantity = Math.max(1, quantity);
        //     quantityInput.val(quantity);
        //     updateProduct(productId, quantity);
        // });

        // $('.quantity-left-minus').click(function(e) {
        //     e.preventDefault();
        //     const productId = $(this).data('id');
        //     const quantityInput = $('#quantity-' + productId);

        //     let quantity = parseInt(quantityInput.val()) - 1;

        //     if (quantity >= 1) {
        //         quantityInput.val(quantity);
        //         updateProduct(productId, quantity);
        //     } else {
        //         if (confirm('Xoá sản phẩm này khỏi giỏ hàng?')) {
        //             removeProduct(productId);
        //         }
        //     }
        // });

        $('#addVoucher').click(function(e) {
            e.preventDefault();
            var voucher_code = $('#voucherCode').val();

            $.ajax({
                url: "{{ route('client.cart.applyVoucher') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    'voucher_code': voucher_code
                },
                beforeSend: function() {},
                success: function(res) {
                    $('#discountPrice').text('0đ');
                    calculateTotal(0,0);
                    switch (res) {
                        case '-1':
                            $('#voucherError').text('Bạn chưa nhập mã giảm giá');
                            break;
                        case '-2':
                            $('#voucherError').text('Mã giảm giá không có sẵn');
                            break;
                        case '-3':
                            $('#voucherError').text('Mã giảm giá đã hết hiệu lực');
                            break;
                        case '-4':
                            $('#voucherError').text('Mã giảm giá đã hết lượt sử dụng');
                            break;
                        case '-5':
                            $('#voucherError').text(
                                'Mã giảm giá chưa triển khai, hãy sử dụng vào lần tới nhé'
                            );
                            break;
                        case '-6':
                            $('#voucherError').text('Mã giảm giá đã hết hạn sử dụng');
                            break;
                        case '-7':
                            $('#voucherError').text(
                                'Đơn hàng chưa đạt giá trị tối thiểu để áp dụng voucher này'
                            );
                            break;
                        case '0':
                            $('#voucherError').text('');
                            break;
                        default:
                            $('#voucherError').text('');
                            $('#discountPrice').text(new Intl.NumberFormat('de-DE').format(
                                res) + 'đ');
                            calculateTotal(res.subTotal,res.discount);
                            break;
                    }
                },
                error: function(e) {}
            });
        });
    });
</script>
