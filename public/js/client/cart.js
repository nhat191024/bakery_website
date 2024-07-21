function updateProduct(id, quantity, variant_id) {
    $.ajax({
        url: "/cart/update",
        method: "POST",
        data: {
            _token: csrfToken,
            'product_id': id,
            'variation_id': variant_id,
            'quantity': quantity
        },
        success: function (data) {
            $('#subTotal').text(new Intl.NumberFormat('de-DE').format(data.subTotal) + 'đ');
            $('#total-' + id + '-' + variant_id).text(new Intl.NumberFormat('de-DE').format(data.price * quantity) + 'đ');
            calculateTotal(data.subTotal, data.discount);
        }
    });
}

function updateQuantity(product_id, variant_id, type) {
    const quantity = $('#quantity-' + product_id + '-' + variant_id);
    if (parseInt(quantity.val()) == 1 && type === 1) {
        if (currentLang == 'en')
            confirm('Are you sure you want to remove this product from the cart?') ? removeProduct(product_id, variant_id) : '';
        else
            confirm('Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng?') ? removeProduct(product_id, variant_id) : '';
        return;
    }
    let value = parseInt(quantity.val()) + (type == 2 ? 1 : -1);
    quantity.val(value);
    updateProduct(product_id, value, variant_id);
}

function removeProduct(id, variation_id) {
    $.ajax({
        url: "/cart/remove",
        method: "POST",
        data: {
            _token: csrfToken,
            'product_id': id,
            'variation_id': variation_id
        },
        success: function (data) {
            $('#product-' + id + '-' + variation_id).css('display', 'none');
            calculateTotal(data.subTotal, data.discount);
        }
    });
}

function calculateTotal(subTotal, discount = 0) {
    if (discount > 0) $('#removeDiscount').text('Xoá voucher');
    else $('#removeDiscount').text('');
    $('#totalPrice')
        .text(subTotal - discount < 0 ? 0 : new Intl.NumberFormat('de-DE').format(subTotal - discount) + 'đ');

    $('#subTotal')
        .text(subTotal < 0 ? 0 : new Intl.NumberFormat('de-DE').format(subTotal) + 'đ');

    $('#discountPrice')
        .text((discount < 0 ? 0 : (new Intl.NumberFormat('de-DE').format(discount))) + 'đ');
    updateCartCount();
}

function checkout() {
    $.ajax({
        url: "/cart/getCount",
        method: "GET",
        success: function (data) {
            $('#cartAmount').text(data);
            if (data <= 0) {
                location.href = '/shop';
                return;
            }
            location.href = '/checkout';
        }
    });
}
