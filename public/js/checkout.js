function checkout(){
    $.ajax({
        // url: "/cart/remove",
        method: "POST",
        data: {
            _token: csrfToken,
            // 'product_id': id,
            // 'variation_id': variation_id
        },
        success: function (data) {
            
        }});
}
