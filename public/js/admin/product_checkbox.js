var selectedSizeList = [];

$(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
        selectedSizeList = checkSelectedSize();
    });
    $('input[type="number"]').change(function() {
        selectedSizeList = checkSelectedSize();
    });

});
function checkSelectedSize() {
    var selectedSizeList = [];
    $('input[type="checkbox"]:checked').each(function() {
        selectedSizeList.push({
            id: $(this).attr('data-id'),
            price: $('#size_price_' + $(this).attr('data-id')).val(),
        });
    });
    return selectedSizeList;
}
