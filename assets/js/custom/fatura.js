"use strict";

$(document).ready(function () {
    
    $("#page-loader").hide();

    $('#tableBody').sortable({
        cursor: 'move',
        animation: 150,
    });

    $("#tableBody").on('keydown', '.quantidadeProduto', function(e) {
        
        let value = $(this).val();

        if(e.key === 'Enter' && value != "") {

            let element = $(this).closest('tr').find('.precoFinalProduto');

            element.text(Math.round((element.text() * parseFloat(value)) * 100) / 100);
            $(this).prop('disabled', true);
            $(this).closest('tr').find('.descontoProduto').prop('disabled', false);            

            $("#totalBrutoValor").text("0");

            $(this).closest('tbody').find('tr').each(function() {

                let precoFinalProduto = parseFloat($(this).find('.precoFinalProduto').text());
                let totalBrutoValor = parseFloat($("#totalBrutoValor").text());
                
                if(!isNaN(precoFinalProduto)){
                    $("#totalBrutoValor").text((totalBrutoValor + precoFinalProduto).toFixed(2));
                }

                $("#totalLiquidoValor").text($("#totalBrutoValor").text());

            });
        }
    });

    $("#tableBody").on('keydown', '.descontoProduto', function(e) {
        
        let value = $(this).val();

        if(e.key === 'Enter' && value != "") {

            let element = $(this).closest('tr').find('.precoFinalProduto');

            element.text((element.text() - parseFloat(element.text()) * (parseFloat(value) / 100)).toFixed(2));
            $(this).prop('disabled', true);

            $("#totalBrutoValor").text("0");

            $(this).closest('tbody').find('tr').each(function() {
                                
                var totalBrutoValor = parseFloat($("#totalBrutoValor").text());
                var precoFinalProduto = parseFloat($(this).find('.precoFinalProduto').text());

                if(!isNaN(precoFinalProduto)){
                    $("#totalBrutoValor").text((totalBrutoValor + precoFinalProduto).toFixed(2));
                }

                $("#totalLiquidoValor").text(parseFloat($("#totalBrutoValor").text()) - parseFloat($("#totalBrutoValor").text()) * parseFloat($('.descontoGlobalValor').text()));
                $("#totalValor").text(parseFloat($("#totalBrutoValor").text()) - parseFloat($("#totalBrutoValor").text()) * parseFloat($('.descontoGlobalValor').text()));
            });
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
                                    <td>${data[0]['unidade_codigo']}</td>
                                    <td>${data[0]['servico_preco_sem_iva']}</td>
                                    <td><input class="form-control descontoProduto" type="text" disabled></td>
                                    <td class="precoFinalProduto">${(parseFloat(data[0]['servico_preco_sem_iva']) + (parseFloat(data[0]['servico_preco_sem_iva']) * 0.23)).toFixed(2)}</td>
                                </tr>
                            `);

                            $('.ts-control').find('.item').text("");
                            $('#serviceSelect').val("");
                            $('#serviceSelect').text("");

                            $("#totalBrutoValor").text((parseFloat($("#totalBrutoValor").text()) + parseFloat(data[0]['servico_preco_sem_iva'])).toFixed(2));
                            $("#totalLiquidoValor").text((parseFloat(data[0]['servico_preco_sem_iva']) + (parseFloat(data[0]['servico_preco_sem_iva']) * 0.23)).toFixed(2));
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