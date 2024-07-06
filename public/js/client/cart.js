function updateProduct(id, quantity, variant_id) {
    $.ajax({
        url: "/cart/update",
        method: "POST",
        data: {
            _token: csrfToken,
            'product_id': id,
            'variant_id': variant_id,
            'quantity': quantity
        },
        success: function (data) {
            // Update the subtotal element in the UI immediately
            $('#subTotal').text(new Intl.NumberFormat('de-DE').format(data.subTotal) + 'đ');
            $('#total-' + id).text(new Intl.NumberFormat('de-DE').format(data.price * quantity) + 'đ');
            subTotal = data.subTotal;
            calculateTotal(data.discount);
        }
    });
}

function updateQuantity(id, variant_id) {
    const quantity = $('#quantity-' + id);
    let value = parseInt(quantity.val())+1;
    quantity.val(value);

    updateProduct(id, value, variant_id);
}

function calculateTotal(discount = 0) {
    if (discount > 0) $('#removeDiscount').text('Xoá voucher');
    else $('#removeDiscount').text('');
    $('#totalPrice')
        .text(subTotal - discount < 0 ? 0 : new Intl.NumberFormat('de-DE').format(subTotal - discount) + 'đ');

    $('#subTotal')
        .text(subTotal < 0 ? 0 : new Intl.NumberFormat('de-DE').format(subTotal) + 'đ');

    $('#discountPrice')
        .text((discount < 0 ? 0 : (new Intl.NumberFormat('de-DE').format(discount))) + 'đ');
}
