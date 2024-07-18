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
        }
    });
})

$('#loader')

function checkout() {
    $('#checkout-loader').css('visibility', 'visible');
    $('body').append('<div id="overlay"></div>');
    $('#overlay').css({
        position: 'fixed',
        width: '100%',
        height: '100%',
        top: '0',
        left: '0',
        right: '0',
        bottom: '0',
        backgroundColor: 'rgba(0,0,0,0.5)',
        zIndex: '2',
        cursor: 'pointer'
    });
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
            'accessory_id': accessory_id
        },
        success: function (data) {
            $('#checkout-loader').css('visibility', 'hidden');
            $('#overlay').remove();
            if (data.message === 'success' && payment == 2) {
                const imageUrl = "https://api.vietqr.io/image/970436-0941000019966-w4UqEbj.jpg" + data.QR;
                $('#myModal').modal('show');
                $('#modalImage').attr('src', imageUrl);
                // $('#total').text(new Intl.NumberFormat('de-DE').format(data.total) + 'đ');
                // $('#description').text("Odouceurs_bill_#"+data.description);
            } else {
                window.location.href = '/';
            }
        }
    });
}

function home() {
    window.location.href = '/';
}
