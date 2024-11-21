"use strict";

$(document).ready(function () {

    const rowTemplate = 
    `
        <tr>
            <td scope="row"><input class="form-control" type="text" name="" id=""></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    `
    
    $("#page-loader").hide();

    $('#serviceSelect').on('keypress', function(event) {
        if (event.which === 13) {
            // Enter key was pressed
            console.log('Enter key pressed!');
            console.log($('#serviceSelect').val());

            $.ajax({
                type: "post",
                url: `${baseURL}products/getProductByCode`,
                data: {
                    codigo: $('#serviceSelect').val()
                },
                dataType: "json",
                success: function(data) {
                    // if (data.error == true) {
                    //     $.each( data.popUpMessages, function( key, value ) {
                    //         notyf.error(value);
                    //     });
                    // } else {
                    //     notyf.success(data.popUpMessages[0]);

                            console.log(data);
                            $('#tableBody').append(`
                                <tr>
                                    <td scope="row"><input class="form-control" type="text" name="" id="" value="${data[0]['servico_codigo']}"></td>
                                    <td>${data[0]['servico_descricao']}</td>
                                    <td><input class="form-control" type="text" name="quantidadeProduto"></td>
                                    <td>${data[0]['servico_unidade_id']}</td>
                                    <td>${data[0]['servico_preco_sem_iva']}€</td>
                                    <td><input class="form-control" type="text" name="descontoProduto"></td>
                                    <td>-</td>
                                </tr>
                            `);

                            $('#serviceSelect').val("");
                    // }
                },
                error: function(xhr, status, error){
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
    
                    notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                }
            });
        }
    });

    var settings = {options: []};

    $.ajax({
        type: "get",
        url: `${baseURL}products/getAllProducts`,
        success: function (data) {
            // if (data.error == true) {
            //     $.each( data.popUpMessages, function( key, value ) {
            //         console.log(value);
            //     });
            // } else {
            //     notyf.success(data.popUpMessages[0]);

                data.forEach(element => {
                    console.log(element);

                    var newItem = {value: element.servico_id, text: element.servico_codigo}
                    settings['options'].push(newItem);
                });

                new TomSelect('#serviceSelect', settings);
            // }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });

});