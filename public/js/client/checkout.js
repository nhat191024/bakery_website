let accessory_id;

$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        checkout();
    });

    $('.accessories').change(function () {
        if ($(this).is(':checked')) {
            var accessoryId = $(this).data('id');
            var accessoryPrice = $(this).val();
            accessory_id = accessoryId;
            total = parseInt($('#subTotal').data('price')) + parseInt(accessoryPrice);
            $('#totalPrice').text(new Intl.NumberFormat('de-DE').format(total) + 'đ');
            $('#cartAccessory').text(new Intl.NumberFormat('de-DE').format(accessoryPrice) + 'đ');
        }
    });
})

function checkout() {
    const fullName = $('#fullName');
    const address = $('#address');
    const district = $('#district');
    const ward = $('#ward');
    const phone = $('#phone');
    const email = $('#email');
    const delivery = $('#delivery');
    var payment = 2;

    var selectedValue = $('input[type="radio"][name="payment"]:checked').val();
    payment = selectedValue ? selectedValue : payment;

    $.ajax({
        url: "/checkout/confirm",
        method: "POST",
        data: {
            _token: csrfToken,
            'fullName': fullName.val(),
            'address': address.val(),
            'district': district.val(),
            'ward': ward.val(),
            'phone': phone.val(),
            'email': email.val(),
            'delivery': delivery.val(),
            'payment': payment,
            'accessory_id' : accessory_id
        },
        success: function (data) {
            if (data.message === 'success') {
                window.location.href = '/';
            }
        }
    });
}

$(document).ready(function() {
    console.log('ready');
    $('.accessories').change(function() {
        if ($(this).is(':checked')) {
            var accessoryId = $(this).data('id');
            var accessoryPrice = $(this).val();
            accessory_id = accessoryId;
            total = parseInt($('#subTotal').data('price')) + parseInt(accessoryPrice);
            $('#totalPrice').text(new Intl.NumberFormat('de-DE').format(total) + 'đ');
        }
    });
})


