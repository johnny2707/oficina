"use strict"

$(document).ready(function(){

    $("#page-loader").hide();

    $(document).on('click', '.createClient', function(e){

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let nif = $('input[name=nif]').val();
        let name = $('input[name=name]').val();

        let description = $('input[name=description]').val();
        let phoneNumber = $('input[name=phoneNumber]').val();
        let emailAddress = $('input[name=emailAddress]').val();

        $.ajax({
            url: `${baseURL}clients/createClient`,
            method: "POST",
            dataType: 'json',
            data : {
                'nif': nif,
                'name': name,
                'description': description,
                'phoneNumber': phoneNumber,
                'emailAddress': emailAddress
            },
            success: function(data) {
                if (data.error == true) {
                    $.each( data.popUpMessages, function( key, value ) {
                        notyf.error(value);
                    });
                } else {
                    notyf.success(data.popUpMessages[0]);
                }
            },
            error: function(xhr, status, error){
                console.log(xhr);
                console.log(status);
                console.log(error);

                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
            }
        });
    });

    $('#clientList').DataTable();
});