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
            calculateTotal(data.subTotal,data.discount);
        }
    });
}

function updateQuantity(product_id, variant_id, type)
{
    const quantity = $('#quantity-'+product_id+'-'+variant_id);
    if (parseInt(quantity.val()) == 1 && type === 1) {
        confirm('Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng?') ? removeProduct(id) : '';
        return;
    }
    let value = parseInt(quantity.val()) + (type == 2 ? 1 : -1);
    quantity.val(value);
    console.log(type,value);
    updateProduct(product_id, value, variant_id);
}

function removeProduct(element_id, id, variation_id) {
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
            calculateTotal(data.subTotal,data.discount);
            console.log(data.subTotal,data.discount);
            console.log(data);
        }
    });
}

function calculateTotal(subTotal,discount = 0) {
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
