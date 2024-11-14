"use strict";

$(document).ready(function() {

    $("#page-loader").hide();

    // TOM SELECT
    let selectRole = document.querySelector('.select-role');
    if (selectRole) {
        new TomSelect(selectRole,{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    }

    let usersTable = $('.usersTable').DataTable({
        responsive  : true,
        paging      : true,
        bPaginate   : true,
        bAutoWidth  : false,
        processing  : true,
        stateSave   : true,
        dom         : 't<"card-footer card-footer-webmovel d-flex align-items-center u-fo"<"col-md-8 text-muted" i><"col-md-4 text-end"p>>',
        ajax: {
            url: baseURL + '/users/table'
        },
        columnDefs: [
            { "orderable": false, "targets": [4,5] },
            { "className": "dt-center", "targets": [4,5] },
            { "width": "25%", "targets": 0 },
            { "width": "15%", "targets": 1 },
            { "width": "20%", "targets": 2 },
            { "width": "20%", "targets": 3 },
            { "width": "10%", "targets": 4 },
            { "width": "10%", "targets": 5 }
        ],
        language: tablesLanguange
    });

    $(document).on('click', '.createNewUser', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        $.confirm({
            title: 'Atenção!',
            content: 'Pretende criar este utilizador?',
            buttons: {
                Confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-success',
                    keys: ['enter'],
                    action: function(){

                        let name = $('input[name=name]').val();
                        let username = $('input[name=username]').val();
                        let email = $('input[name=email]').val();
                        let role = $('select[name=role]').val();
                        let password = $('input[name=password]').val();
                        let confirmPassword = $('input[name=confirm-password]').val();

                        $.ajax({
                            url: baseURL + '/users/create',
                            method: "POST",
                            dataType: 'json',
                            data: {
                                name,
                                username,
                                email,
                                role,
                                password,
                                confirmPassword
                            },
                            beforeSend: function () {
                                $("#page-loader").css("display", "flex");
                            },
                            complete: function () {
                                $("#page-loader").css("display", "none");
                            },
                            success: function(data) {
                                if (data.error == true) {
                                    $.each( data.popUpMessages, function( key, value ) {
                                        notyf.error(value);
                                    });
                                } else {
                                    notyf.success(data.popUpMessages[0]);
                                    window.location.href = baseURL + 'users';
                                }
                            },
                            error: function(xhr, status, error){
                                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                            }
                        });
                    }

                },
                Cancelar: {
                    text: 'Cancelar',
                    btnClass: 'btn-danger'
                }
            }
        });

    });

    $(document).on('click', '.updateUser', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        $.confirm({
            title: 'Atenção!',
            content: 'Pretende editar este utilizador?',
            buttons: {
                Confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-success',
                    keys: ['enter'],
                    action: function(){

                        let id = $(element).data('id');
                        let name = $('input[name=name]').val();
                        let username = $('input[name=username]').val();
                        let email = $('input[name=email]').val();
                        let role = $('select[name=role]').val();

                        $.ajax({
                            url: baseURL + '/users/'+id+'/update',
                            method: "POST",
                            dataType: 'json',
                            data: {
                                name,
                                username,
                                email,
                                role
                            },
                            beforeSend: function () {
                                $("#page-loader").css("display", "flex");
                            },
                            complete: function () {
                                $("#page-loader").css("display", "none");
                            },
                            success: function(data) {
                                if (data.error == true) {
                                    $.each( data.popUpMessages, function( key, value ) {
                                        notyf.error(value);
                                    });
                                } else {
                                    notyf.success(data.popUpMessages[0]);
                                    window.location.href = baseURL + 'users';
                                }
                            },
                            error: function(xhr, status, error){
                                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                            }
                        });
                    }

                },
                Cancelar: {
                    text: 'Cancelar',
                    btnClass: 'btn-danger'
                }
            }
        });

    });

    $(document).on('click', '.activateUser', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let userID = element.data('id');

        $.confirm({
            title: 'Atenção!',
            content: 'Pretende ativar este utilizador?',
            buttons: {
                Confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-success',
                    keys: ['enter'],
                    action: function(){

                        $.ajax({
                            url: baseURL + '/users/' + userID + '/activate',
                            method: "POST",
                            dataType: 'json',
                            beforeSend: function () {
                                $("#page-loader").css("display", "flex");
                            },
                            complete: function () {
                                $("#page-loader").css("display", "none");
                            },
                            success: function(data) {
                                if (data.error == true) {
                                    $.each( data.popUpMessages, function( key, value ) {
                                        notyf.error(value);
                                    });
                                } else {
                                    notyf.success(data.popUpMessages[0]);
                                    usersTable.ajax.reload();
                                }
                            },
                            error: function(xhr, status, error){
                                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                            }
                        });
                    }

                },
                Cancelar: {
                    text: 'Cancelar',
                    btnClass: 'btn-danger'
                }
            }
        });

    });

    $(document).on('click', '.inactivateUser', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let userID = element.data('id');

        $.confirm({
            title: 'Atenção!',
            content: 'Pretende inativar este utilizador?',
            backgroundDismiss: true,
            theme: 'bootstrap',
            buttons: {
                Confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-success',
                    keys: ['enter'],
                    action: function(){

                        $.ajax({
                            url: baseURL + '/users/' + userID + '/inactivate',
                            method: "POST",
                            dataType: 'json',
                            beforeSend: function () {
                                $("#page-loader").css("display", "flex");
                            },
                            complete: function () {
                                $("#page-loader").css("display", "none");
                            },
                            success: function(data) {
                                if (data.error == true) {
                                    $.each( data.popUpMessages, function( key, value ) {
                                        notyf.error(value);
                                    });
                                } else {
                                    notyf.success(data.popUpMessages[0]);
                                    usersTable.ajax.reload();
                                }
                            },
                            error: function(xhr, status, error){
                                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                            }
                        });
                    }

                },
                Cancelar: {
                    text: 'Cancelar',
                    btnClass: 'btn-danger'
                }
            }
        });

    });

    $(document).on('click', '.updateMyPassword', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        $.confirm({
            title: 'Atenção!',
            content: 'Pretende alterar a sua password?',
            buttons: {
                Confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-success',
                    keys: ['enter'],
                    action: function(){
                        
                        let oldPassword = $('input[name=old-password]').val();
                        let newPassword = $('input[name=new-password]').val();
                        let confirmNewPassword = $('input[name=confirm-new-password]').val();

                        $.ajax({
                            url: baseURL + '/users/my-password',
                            method: "POST",
                            dataType: 'json',
                            data: {
                                oldPassword,
                                newPassword,
                                confirmNewPassword
                            },
                            beforeSend: function () {
                                $("#page-loader").css("display", "flex");
                            },
                            complete: function () {
                                $("#page-loader").css("display", "none");
                            },
                            success: function(data) {
                                if (data.error == true) {
                                    $.each( data.popUpMessages, function( key, value ) {
                                        notyf.error(value);
                                    });
                                } else {
                                    notyf.success(data.popUpMessages[0]);
                                    window.location.href = baseURL;
                                }
                            },
                            error: function(xhr, status, error){
                                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                            }
                        });
                    }

                },
                Cancelar: {
                    text: 'Cancelar',
                    btnClass: 'btn-danger'
                }
            }
        });

    });

});