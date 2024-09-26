"use strict"

$(document).ready(function(){

    $("#page-loader").hide();

    $(document).on('click', '.createClient', function(e){

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let clientInfo = {};

        let nif = $('input[name=nif]').val();
        let name = $('input[name=name]').val();

        clientInfo['client'] = {
            'nif': nif, 
            'name': name
        };

        let description = $('input[name=description]').val();
        let phoneNumber = $('input[name=phoneNumber]').val();
        let emailAddress = $('input[name=emailAddress]').val();

        clientInfo['contacts'] = {
            'description': description,
            'phoneNumber': phoneNumber,
            'emailAddress': emailAddress
        };

        $.ajax({
            url: `${baseURL}clients`,
            method: "POST",
            dataType: 'json',
            data : {
                clientInfo: clientInfo,
            },
            success: function(data) {
                if (data.error == true) {
                    $.each( data.popUpMessages, function( key, value ) {
                        notyf.error(value);
                    });
                } else {
                    notyf.success(data.popUpMessages[0]);a
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