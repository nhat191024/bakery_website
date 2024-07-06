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

function updateQuantity(id, variant_id, type) {
    const quantity = $('#quantity-' + id);
    if (parseInt(quantity.val()) == 1 && type === 1) {
        confirm('Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng?') ? removeProduct(id) : '';
        return;
    }
    let value = parseInt(quantity.val()) + (type == 2 ? 1 : -1);
    quantity.val(value);
    updateProduct(id, value, variant_id);
}

function removeProduct(id) {
    $.ajax({
        url: "/cart/remove",
        method: "POST",
        data: {
            _token: csrfToken,
            'product_id': id
        },
        success: function (data) {
            $('#product-' + id).css('display', 'none');
            // Check if the cart is empty after removing the product
            if (data.cartCount === 0) {
                subTotal = 0; // Reset subtotal if the cart is empty
            } else {
                subTotal = subTotal - $('#product-' + id).find('.total').text().replace('đ', '').replace(',', '').replace('.', '');
            }
            calculateTotal(data.discount);
        }
    });
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
