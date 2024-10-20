"use strict"
$(document).ready(function () {
    $('#stripe-element').addClass('d-none');
})
// Set your Stripe public key
var stripe = Stripe(stripe_key);

// Create a Stripe Element for the card field
var elements = stripe.elements();

var cardElement = elements.create('card', {
    style: {
        base: {
            iconColor: '#454545',
            color: '#454545',
            fontWeight: '500',
            lineHeight: '50px',
            fontSmoothing: 'antialiased',
            backgroundColor: '#f2f2f2',
            ':-webkit-autofill': {
                color: '#454545',
            },
            '::placeholder': {
                color: '#454545',
            },
        }
    },
});
// Add an instance of the card Element into the `card-element` div
cardElement.mount('#stripe-element');

// Send the token to your server
function stripeTokenHandler(token) {
    // Add the token to the form data before submitting to the server
    var form = document.getElementById('payment');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    // Submit the form to your server
    form.submit();
}
