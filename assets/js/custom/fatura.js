"use strict";

$(document).ready(function () {
    
    $("#page-loader").hide();

    $("#tableBody").on('keydown', '.quantidadeProduto', function(e) {
        console.log("entrou!!");
        
        let value = $(this).val();

        if(e.key === 'Enter' || e.keyCode === 13) {
            console.log(parseFloat($('.precoFinalProduto').text()));
            console.log(parseFloat(value));
            $('.precoFinalProduto').text(Math.round((parseFloat($('.precoFinalProduto').text()) * parseFloat(value)) * 100) / 100);
        }
    });

    $('#serviceSelect').on('change', function(event) {

        console.log('Changed!');
        console.log($('#serviceSelect').val());

        if($('#serviceSelect').val() != "") {
            
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
                                    <td scope="row"><input class="form-control" type="text" value="${data[0]['servico_codigo']}" disabled></td>
                                    <td>${data[0]['servico_descricao']}</td>
                                    <td><input class="form-control quantidadeProduto" type="text"></td>
                                    <td>${data[0]['servico_unidade_id']}</td>
                                    <td>${data[0]['servico_preco_sem_iva']}</td>
                                    <td><input class="form-control" type="text" name="descontoProduto"></td>
                                    <td class="precoFinalProduto">${Math.round((parseFloat(data[0]['servico_preco_sem_iva']) + (parseFloat(data[0]['servico_preco_sem_iva']) * 0.23)) * 100) / 100}</td>
                                </tr>
                            `);

                            $('#serviceSelect').val("");
                            $('#serviceSelect').text("");

                            document.getElementById("totalBrutoValor").innerHTML = parseFloat(document.getElementById("totalBrutoValor").innerHTML) + parseFloat(data[0]['servico_preco_sem_iva']);
                    // }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);

                    notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                }
            });
        }
    });

    var settings = {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    };

    $.ajax({
        type: "get",
        url: `${baseURL}products/getAllProducts`,
        success: function (data) {
            if (data.length === 0) {
                settigs.options.push({value: 0, text: "no items found"})
            } 
            else {
                data.forEach(element => {
                    console.log(element);

                    var newItem = {value: element.servico_codigo, text: element.servico_codigo}
                    settings.options.push(newItem);
                });

                new TomSelect('#serviceSelect', settings);
                $(".ts-dropdown").css("z-index", "9999");
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
});