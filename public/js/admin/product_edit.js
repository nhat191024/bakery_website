$('form').on('submit', function (e) {
    e.preventDefault();
    const form = event.target.form;
    const formData = new FormData(form);
    formData.append('_token', token);
    formData.append('id', $('#productId').val());
    formData.append('category_id', $('#categorySelect').val());
    formData.append('product_name', $('#productName').val());

    selectedSizeList.forEach(function(item, index) {
        formData.append(`product_price[${index}]`, JSON.stringify(item));
    });

    formData.append('product_description', $('#productDescription').val());
    formData.append('product_image', $('#customFile')[0].files[0]);

    $.ajax({
        url: "/admin/product/edit",
        method: "POST",
        data: formData,
        beforeSend: function() {
            $('#saveAdd').text('Đang lưu...');
        },
        error: function () {
            $('#error').text('Lỗi, vui bạn kiểm tra lại thông tin');
            $('#saveAdd').text('Lưu lại');
        },
        success: function (data) {
            window.location.href = '/admin/product/detail/?id=' + data;
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
