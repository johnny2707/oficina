$(document).ready(function() {

    $("#page-loader").hide();

    $(document).on('keypress', function(e) {
        if (e.which == 13 && $('input:focus').length > 0) {
            $('.submitButtonWebmovel').trigger('click');
        }
    });

}); 