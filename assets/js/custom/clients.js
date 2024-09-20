"use strict"

$(document).ready(function(){

    $("#page-loader").hide();

    var contactNum = 0;

    $(document).on('click', '.addContact', function(e){

        contactNum = contactNum + 1;

        $('.contactForm').apppend(`
                            <h3>main contact</h3>
                            
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <input type="text" class="form-control" placeholder="description" name="description`+ contactNum +`">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">phone number</label>
                                <input type="text" class="form-control" placeholder="phone number" name="phoneNumber`+ contactNum +`">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">email address</label>
                                <input type="text" class="form-control" placeholder="email address" name="emailAddress`+ contactNum +`">
                            </div>
                            `);

    });

});