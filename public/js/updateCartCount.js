$(document).ready(function() {
    updateCartCount();
})

function updateCartCount() {
    $.ajax({
        url: "/cart/getCount",
        method: "GET",
        success: function(data) {
            $('#cartAmount').text(data);
        }
    });
}
