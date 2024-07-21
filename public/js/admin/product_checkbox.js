var selectedSizeList = [];

$(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
        selectedSizeList = checkSelectedSize();
        console.log('selected variation', selectedSizeList);
    });
    $('input[type="number"]').change(function() {
        selectedSizeList = checkSelectedSize();
        console.log('selected variation', selectedSizeList);
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
