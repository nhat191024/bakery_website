<script>
    let subTotal = {{ isset($subTotal) ? $subTotal : 0 }};

    function removeDiscount() {
        $.ajax({
            url: "{{ route('client.cart.removeVoucher') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                calculateTotal(data.subTotal, data.discount);
            }
        });
    }

    $(document).ready(function() {
        var quantitiy = 0;

        $('#addVoucher').click(function(e) {
            e.preventDefault();
            var voucher_code = $('#voucherCode').val();
            $.ajax({
                url: "/cart/applyVoucher",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    'voucher_code': voucher_code
                },
                success: function(res) {
                    $('#discountPrice').text('0đ');
                    calculateTotal(res.subTotal);
                    if (currentLang == 'en') {
                        $('#voucherError').text('You have not entered a discount code');
                        switch (parseInt(res.status)) {
                            case -1:
                                $('#voucherError').text(
                                    'You have not entered a discount code');
                                break;
                            case -2:
                                $('#voucherError').text('Discount code is not available');
                                break;
                            case -3:
                                $('#voucherError').text('Discount code has expired');
                                break;
                            case -4:
                                $('#voucherError').text('Discount code has been used up');
                                break;
                            case -5:
                                $('#voucherError').text(
                                    'Discount code has not been deployed, please use it next time'
                                );
                                break;
                            case -6:
                                $('#voucherError').text('Discount code has expired');
                                break;
                            case -7:
                                $('#voucherError').text(
                                    'The order has not reached the minimum value to apply this voucher'
                                );
                                break;
                            case 0:
                                $('#voucherError').text('');
                                break;
                            default:
                                $('#voucherError').text('');
                                $('#discountPrice').text(new Intl.NumberFormat('de-DE')
                                    .format(
                                        res.discount) + 'đ');
                                calculateTotal(res.subTotal, res.discount);
                                break;
                        }
                    } else {
                        $('#voucherError').text('Bạn chưa nhập mã giảm giá');
                        switch (parseInt(res.status)) {
                            case -1:
                                $('#voucherError').text('Bạn chưa nhập mã giảm giá');
                                break;
                            case -2:
                                $('#voucherError').text('Mã giảm giá không có sẵn');
                                break;
                            case -3:
                                $('#voucherError').text('Mã giảm giá đã hết hiệu lực');
                                break;
                            case -4:
                                $('#voucherError').text('Mã giảm giá đã hết lượt sử dụng');
                                break;
                            case -5:
                                $('#voucherError').text(
                                    'Mã giảm giá chưa triển khai, hãy sử dụng vào lần tới nhé'
                                );
                                break;
                            case -6:
                                $('#voucherError').text('Mã giảm giá đã hết hạn sử dụng');
                                break;
                            case -7:
                                $('#voucherError').text(
                                    'Đơn hàng chưa đạt giá trị tối thiểu để áp dụng voucher này'
                                );
                                break;
                            case 0:
                                $('#voucherError').text('');
                                break;
                            default:
                                $('#voucherError').text('');
                                $('#discountPrice').text(new Intl.NumberFormat('de-DE')
                                    .format(
                                        res.discount) + 'đ');
                                calculateTotal(res.subTotal, res.discount);
                                break;
                        }
                    }
                }
            });
        });
    });
</script>
