$(function () {
    $('.checkbox_parent').on('click', function () {
        $(this).parents('.card').find('.checkbox_chil').prop('checked', $(this).prop('checked'));
    });

    $('.checkbox_grand').on('click', function () {
        $(this).parents().find('.checkbox_parent').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_chil').prop('checked', $(this).prop('checked'));

    });

});
