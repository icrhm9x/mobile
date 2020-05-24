$(document).ready(function () {
    $('.checkbox_wrapper').on('click', function () {
        $(this).parents('.card_wrapper').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
    })
});
