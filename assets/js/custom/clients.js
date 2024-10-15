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

    $(document).on('click', '.deleteButton', function (e) {
        let id = $(this).data('client-id');

        $.ajax({
            type: "post",
            url: `${baseURL}clients/deleteClient`,
            data: {
                id
            },
            dataType: "json",
            success: function (data) {
                if (data.error == true) {
                    $.each( data.popUpMessages, function( key, value ) {
                        notyf.error(value);
                    });
                } else {
                    notyf.success(data.popUpMessages[0]);
                    location.reload();
                }
            },
            error: function (xhr, status, error) { 
                console.log(xhr);
                console.log(status);
                console.log(error);

                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
            }
        });
    });

    $(document).on('click', '.updateClientInfoButton', function(e){
        console.log('entrou');


        let id = $("#clientModal").data('id');
        let nif = $("input[name='modalClientNif']").val();
        let name = $("input[name='modalClientName']").val();

        let clientInfo = {
            'id': id,
            'nif': nif,
            'name': name
        };

        $.ajax({
            type: "post",
            url: `${baseURL}clients/updateClientInfo`,
            data: clientInfo,
            dataType: "json",
            success: function (data) {
                console.log('sucesso!');
                
                if (data.error == true) {
                    $.each( data.popUpMessages, function(key, value ) {
                        notyf.error(value);
                    });
                } else {
                    notyf.success(data.popUpMessages[0]);
                    location.reload();
                }
            },
            error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);

                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
            }
        });
    });

    new DataTable('#clientList');

    // $(document).on('keyup', 'input[name="clientSearch"]', function(e){

    //     document.getElementById("clientSearchListData").innerHTML = "";
    //     var delay = setTimeout('');

    //     var inputText = $('input[name="clientSearch"]').val();

    //     $.ajax({
    //         type: "post",
    //         url: `${baseURL}clients/clientSearch`,
    //         data: {
    //             inputText
    //         },
    //         dataType: "json",
    //         success: function (data) {
    //             if (data.error == true) {
    //                 $.each( data.popUpMessages, function( key, value ) {
    //                     notyf.error(value);
    //                 });
    //             } else {
    //                 var clientData = data.clientInfo;

    //                 clientData.forEach(element => {
    //                     document.getElementById("clientSearchListData").innerHTML += (`
    //                             <tr>
    //                             <td>${element['id']}</td>
    //                             <td>${element['nif']}</td>
    //                             <td>${element['name']}</td>
    //                             <td>${element['creation_date']}</td>
    //                             </tr>
    //                         `);
    //                 });
    //             }
    //         },
    //         error: function(xhr, status, error){
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);

    //             notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
    //         }
    //     });
    // });
});