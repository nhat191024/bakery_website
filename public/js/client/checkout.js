function checkout() {
    const fullName = $('#fullName');
    const address = $('#address');
    const district = $('#district');
    const ward = $('#ward');
    const phone = $('#phone');
    const email = $('#email');
    const delivery = $('#delivery');
    var payment = 'banking';

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
            'payment': payment
        },
        success: function (data) {
            if (data.message === 'success') {
                window.location.href = '/';
            }
        }
    });
}
