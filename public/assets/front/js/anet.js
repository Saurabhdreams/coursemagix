"use strict";

function sendPaymentDataToAnet() {
    // Set up authorisation to access the gateway.
    var authData = {};
    authData.clientKey = clientKey;
    authData.apiLoginID = loginId;

    var cardData = {};
    cardData.cardNumber = document.getElementById("anetCardNumber").value;
    cardData.month = document.getElementById("anetExpMonth").value;
    cardData.year = document.getElementById("anetExpYear").value;
    cardData.cardCode = document.getElementById("anetCardCode").value;

    // Now send the card data to the gateway for tokenisation.
    // The responseHandler function will handle the response.
    var secureData = {};
    secureData.authData = authData;
    secureData.cardData = cardData;
    Accept.dispatchData(secureData, responseHandler);
}

function responseHandler(response) {
    if (response.messages.resultCode === "Error") {
        var i = 0;
        let errorLists = ``;
        while (i < response.messages.message.length) {
            errorLists += `<li class="text-danger">${response.messages.message[i].text}</li>`;

            i = i + 1;
        }
        $("#anetErrors").show();
        $("#anetErrors").html(errorLists);
    } else {
        paymentFormUpdate(response.opaqueData);
    }
}

function paymentFormUpdate(opaqueData) {
    document.getElementById("opaqueDataDescriptor").value = opaqueData.dataDescriptor;
    document.getElementById("opaqueDataValue").value = opaqueData.dataValue;
    document.getElementById("my-checkout-form").submit();
}

$(document).ready(function() {
    $("#my-checkout-form").on('submit', function(e) {
        e.preventDefault();
        let val = $("#payment-gateway").val();
        if (val == 'Authorize.net') {
            sendPaymentDataToAnet();
        }else if(val == 'Stripe') {
            //stripe
            stripe.createToken(cardElement).then(function (result) {
                if (result.error) {
                    // Display errors to the customer
                    var errorElement = document.getElementById('stripe-errors');
                    errorElement.textContent = result.error.message;
                    //button replace
                    document.getElementById('confirmBtn').innerHTML = 'Place Order';
                    document.getElementById('confirmBtn').disabled = false;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
            //stripe
        }
        else{
            $(this).unbind(' ').submit();
        }
    });
});


