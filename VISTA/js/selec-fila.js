$('#producto tr').click(function(e) {
    $('#producto tr').removeClass('highlighted');
    $(this).addClass('highlighted');
});