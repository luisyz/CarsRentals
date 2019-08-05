<?php
session_start();
$_SESSION["cost"]=$_POST["cost"];
$_SESSION["toPay"]=$_SESSION["cost"];
 ?>
@extends('master')
@section('content')
    <h1>Your total is ${{$_SESSION["cost"]}}</h1>
    <hr/>
    <h3>If you want to pay right now with a 10% discount, please fill the following:</h3>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="{{route('payment')}}" method="get" id="payment-form">
   <label for="card-element">
     Credit or debit card
   </label>
   <div id="card-element">
     <!-- A Stripe Element will be inserted here. -->
   </div>

   <!-- Used to display form errors. -->
   <div id="card-errors" role="alert"></div>
   <input type="hidden" name="fullname" value="{{$_SESSION['fullname']}}">
   <input type="hidden" name="email" value="{{$_SESSION['email']}}">
   <input type="hidden" name="creditcard" value="{{$_SESSION['creditcard']}}">
   <input type="hidden" name="pickup_id" value="{{$_SESSION['pickup_location']}}">
   <input type="hidden" name="return_id" value="{{$_SESSION['return_location']}}">
   <input type="hidden" name="pickup_date" value="{{$_SESSION['pickup_date']}}">
   <input type="hidden" name="return_date" value="{{$_SESSION['return_date']}}">
   <input type="hidden" name="category_id" value="{{$_SESSION['category_id']}}">
   <input type="hidden" name="extra1" value="{{$_SESSION['extra1']}}">
   <input type="hidden" name="extra2" value="{{$_SESSION['extra2']}}">
   <input type="hidden" name="extra3" value="{{$_SESSION['extra3']}}">
   <input type="hidden" name="cost" value="{{$_SESSION['cost']}}">
   <input type="hidden" name="toPay" value="0">
 <button>Submit Payment</button>
          </form>
        </div>

      </div>

    </div>
    <hr/>

    <form action="{{route('reservation_store')}}" method="get">
    <h3>Else</h3>
    <h4>Pay at the front desk:</h4>
    <input type="hidden" name="fullname" value="{{$_SESSION['fullname']}}">
    <input type="hidden" name="email" value="{{$_SESSION['email']}}">
    <input type="hidden" name="creditcard" value="{{$_SESSION['creditcard']}}">
    <input type="hidden" name="pickup_id" value="{{$_SESSION['pickup_location']}}">
    <input type="hidden" name="return_id" value="{{$_SESSION['return_location']}}">
    <input type="hidden" name="pickup_date" value="{{$_SESSION['pickup_date']}}">
    <input type="hidden" name="return_date" value="{{$_SESSION['return_date']}}">
    <input type="hidden" name="category_id" value="{{$_SESSION['category_id']}}">
    <input type="hidden" name="extra1" value="{{$_SESSION['extra1']}}">
    <input type="hidden" name="extra2" value="{{$_SESSION['extra2']}}">
    <input type="hidden" name="extra3" value="{{$_SESSION['extra3']}}">
    <input type="hidden" name="cost" value="{{$_SESSION['cost']}}">
    <input type="hidden" name="toPay" value="{{$_SESSION['toPay']}}">
    <button type="submit">Pay at the front desk</button>
    <hr/>
  </form>


<script type="text/javascript">
var stripe = Stripe('pk_test_UQflVpbVMAUh6OOqVqCS17hE00Zh58ghcA');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  console.log(token);
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection
