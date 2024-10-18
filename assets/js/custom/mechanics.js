"use strict"

$(document).ready(function(){

    $("#page-loader").hide();

    $(document).on('click', '.createMechanic', function(e){

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let name = $('input[name=name]').val();

        let phoneNumber = $('input[name=phoneNumber]').val();
        let emailAddress = $('input[name=emailAddress]').val();

        $.ajax({
            url: `${baseURL}mechanics/createMechanic`,
            method: "POST",
            dataType: 'json',
            data : {
                'name': name,
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
                    location.reload();
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
        let mechanicId = $(this).data('mechanic-id');

        $.ajax({
            type: "post",
            url: `${baseURL}mechanics/deleteMechanic`,
            data: {
                mechanicId
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

    $(document).on('click', '.updateMechanicInfoButton', function(e){
        console.log('entrou');

        let name = $("input[name='mechanicModalName']").val();
        let phoneNumber = $("input[name='mechanicModalPhoneNumber']").val();
        let emailAddress = $("input[name='mechanicModalEmailAddress']").val();
        let role = $("input[name='mechanicModalRole']").val();

        let mechanicInfo = {
            'name': name,
            'phone_number': phoneNumber,
            'email_address': emailAddress,
            'role': role
        };

        $.ajax({
            type: "post",
            url: `${baseURL}mechanics/updateMechanicInfo`,
            data: mechanicInfo,
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

    new DataTable('#mechanicList');

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