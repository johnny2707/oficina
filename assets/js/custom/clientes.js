"use strict";

$(document).ready(function () {

    $("#page-loader").hide();

    function showResult(result)
    {
        $(".clienteLocalidade").val("");
        $(".clienteCodigoPostal").val("");
        $(".clientePais").val("");
        $(".clienteZona").val("");
        
        result["features"].forEach(element => {

            console.log(element);

            $(".clienteLocalidade").val(element["properties"]["city"]);
            $(".clienteCodigoPostal").val(element["properties"]["postcode"]);
            $(".clientePais").val(element["properties"]["country"]);
            $(".clienteZona").val(element["properties"]["county"]);

        });
    }

    let controller = null;

    $("input[name='clienteMorada']").on("keyup", function(){

        console.log("entrou!!!!");

        if(controller) {
            // controller.abort("Cancelling previous request");
        }

        controller = new AbortController();
        const signal = controller.signal;

        let inputText = $(this).val();
        
        let requestOptions = {
            signal,
            method: 'GET',
        };

        console.log(inputText);

        fetch("https://api.geoapify.com/v1/geocode/autocomplete?text="+ inputText +"&type=street&apiKey=e94e44ae271e4a0ea83445285bef3aa5", requestOptions)
            .then(response => response.json())
            .then(result => {
                showResult(result);
            })
            .catch(error => {
                if (error.name === 'AbortError') {
                    // console.log('Request was deliberately cancelled:', error.message);
                }
                else {
                    // console.error('Fetch error:', error);
                }
            })
            .finally(() => {
                controller = null;
            });
    });

});
