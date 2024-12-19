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

    $('.registerClient').on('click', function(e){

        console.log("Entrou!");

        client = [
            clientCode = $(".clientCode").val(),
            clientName = $(".clientName").val(),
            clientTaxPayer = $(".clientTaxPayer").val(),
            clientAddress = $(".clientAddress").val(),
            clientCity = $(".clientCity").val(),
            clientPostCode = $(".clientPostCode").val(),
            clientCountry = $(".clientCountry").val(),
            clientCounty = $(".clientCounty").val(),
            clientLanguage = $(".clientLanguage").val(),
            clientEmail = $(".clientEmail").val(),
            clientPhoneNumber = $(".clientPhoneNumber").val(),
            clientGroup = $(".clientGroup").val()
        ];

        vehicle = [
            vehicleLicensePlate = $(".vehicleLicensePlate").val(),
            vehicleBrand = $(".vehicleBrand").val(),
            vehicleModel = $(".vehicleModel").val(),
            vehicleYear = $(".vehicleYear").val(),
            vehicleChassi = $(".vehicleChassi").val(),
            vehicleObservations = $(".vehicleObservations").val()
        ];

        clientData = [client, vehicle];

        $.ajax({
            type: "post",
            url: `${baseURL}clients/createClient`,
            data: clientData,
            dataType: "json",
            success: function (response) {
                notyf.success("Sucesso!");
            }
        });

    });
});
