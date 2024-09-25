"use strict"

$(document).ready(function(){

    $("#page-loader").hide();

    var contactNum = 0;
    var carNum = 1;

    $(document).on('click', '.addContact', function(e){

        contactNum = contactNum + 1;

        $('.contactForm').append(`<div>
                            <h3>contact ${contactNum}</h3>
                            
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <input type="text" class="form-control" placeholder="description" name="description${contactNum}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">phone number</label>
                                <input type="text" class="form-control" placeholder="phone number" name="phoneNumber${contactNum}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">email address</label>
                                <input type="text" class="form-control" placeholder="email address" name="emailAddress${contactNum}">
                            </div>
                            </div>`);

    });

    $(document).on('click', '.addCar', function(e){

        carNum = carNum + 1;

        $('.carForm').append(`<div>
                            <h3>car${carNum} details</h3>
                            <div class="mb-3">
                                <label class="form-label">vin</label>
                                <input type="text" class="form-control" placeholder="vin" name="vin${carNum}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">license plate</label>
                                <input type="text" class="form-control" placeholder="license plate" name="licensePlate${carNum}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">model</label>
                                <input type="text" class="form-control" placeholder="model" name="model${carNum}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">year</label>
                                <input type="text" class="form-control" placeholder="year" name="year${carNum}">
                            </div>
                            </div>`);

    });

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

        clientInfo['contacts'] = [];
        
        clientInfo['contacts'].push({
            'description': description,
            'phoneNumber': phoneNumber,
            'emailAddress': emailAddress
        });

        for(let i=1; i<=contactNum; i++)
        {
            let description = $(`input[name=description${i}]`).val();
            let phoneNumber = $(`input[name=phoneNumber${i}]`).val();
            let emailAddress = $(`input[name=emailAddress${i}]`).val();

            clientInfo['contacts'].push({
                'description': description,
                'phoneNumber': phoneNumber,
                'emailAddress': emailAddress
            });
        }

        let vin = $('input[name=vin]').val();
        let licensePlate = $('input[name=licensePlate]').val();
        let model = $('input[name=model]').val();
        let year = $('input[name=year]').val();

        clientInfo['cars'] = [];

        clientInfo['cars'].push({
            'vin': vin,
            'licensePlate': licensePlate,
            'model': model,
            'year': year
        });

        for(let i=2; i<=carNum; i++)
        {
            let vin = $(`input[name=vin${i}]`).val();
            let licensePlate = $(`input[name=licensePlate${i}]`).val();
            let model = $(`input[name=model${i}]`).val();
            let year = $(`input[name=year${i}]`).val();

            clientInfo['cars'].push({
                'vin': vin,
                'licensePlate': licensePlate,
                'model': model,
                'year': year
            });
        }

        console.log(clientInfo);
        

        $.ajax({
            url: `${baseURL}clients`,
            method: "POST",
            dataType: 'json',
            contentType: 'application/json',
            data : JSON.stringify({
                clientInfo: clientInfo,
                contactNum: contactNum,
                carNum: carNum
            }),
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
});