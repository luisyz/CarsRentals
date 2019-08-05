@extends('master')
@section('content')
<?php
$r= \App\Reservation::find($_GET["reservation_id"]);
if($r){

if($r->fullname==$_GET["fullname"]){


 ?>
<h3>Details of your reservation:</h3>
<table class="reservations" name="reservations">
  <tr>
  <th>Reservation Nr.</th>
  <th>Full Name</th>
  <th>Email</th>
  <th>Creditcard Number</th>
  <th>Pickup Location</th>
  <th>Return Location</th>
  <th>Pickup date</th>
  <th>Return Date</th>
  <th>Car Category</th>
  <th>Cost</th>
  <th>Ammount left to Pay</th>
  <th>Extras</th>
</tr>
  {{csrf_field()}}


<tr value="{{$r->id}}">
<td>{{$r->id}}</td>
<td>{{$r->fullname}}</td>
<td>{{$r->email}}</td>
<td>{{$r->creditcard}}</td>
<td>{{\App\Location::find($r->pickup_id)->branch}}</td>
<td>{{\App\Location::find($r->return_id)->branch}}</td>
<td>{{$r->pickup_date}}</td>
<td>{{$r->return_date}}</td>
<td>{{\App\Category::find($r->category_id)->name}}</td>
<td>{{$r->cost}}</td>
<td>{{$r->toPay}}</td>
<?php
$ex="extra";
for($i=1;$i<=3;$i++){
if($i==1 && $r->extra1 >0){
  ?>
<td>{{\App\Extra::find($i)->ename}}</td>
<?php
}
elseif($i==2 && $r->extra2 >0){
  ?>
<td>{{\App\Extra::find($i)->ename}}</td>
<?php
}
elseif($i==3 && $r->extra3 >0){
  ?>
<td>{{\App\Extra::find($i)->ename}}</td>
<?php
}
}
 ?>
</tr>
</table>
 <hr/>
 <?php
 $inicio= date('Y/m/d');
 $fin= $r->pickup_date;
 $inicio = new DateTime($inicio);
 $fin = new DateTime($fin);
 if($inicio<$fin){
 $difdias = date_diff($inicio, $fin)->days;

 $fechacr= $r->created_at;
 $difcreacion= date_diff($fechacr, $inicio)->days;

if(($difdias>=2) && ($difcreacion<=1)){
 ?>
 <h5>ATTENTION, if you already paid, by canceling your reservation now, you will receive a 100% refund, minus a five dollar fine</h5>
<h3>ONLY IF you want to CANCEL your reservation please press the button:</h3>

<form action="{{route('reservation_delete')}}" method="get">
  <input type="hidden" name="id" value="{{$r->id}}">
  <button type="submit">DELETE</button>
</form>
<?php
 }
 elseif($difdias>=2){
  ?>
  <h5>ATTENTION, if you already paid, by canceling your reservation now, you will only receive a 50% refund, minus a five dollar fine</h5>
 <h3>ONLY IF you want to CANCEL your reservation please press the button:</h3>

 <form action="{{route('reservation_delete')}}" method="get">
   <input type="hidden" name="id" value="{{$r->id}}">
   <button type="submit">DELETE</button>
 </form>
 <?php
  }
  elseif($difdias<2){
   ?>
   <h5>ATTENTION, if you already paid, by canceling your reservation now, you will only receive a 25% refund, minus a five dollar fine</h5>
  <h3>ONLY IF you want to CANCEL your reservation please press the button:</h3>

  <form action="{{route('reservation_delete')}}" method="get">
    <input type="hidden" name="id" value="{{$r->id}}">
    <button type="submit">DELETE</button>
  </form>
  <?php
   }

  ?>

  <?php

   ?>
   <br>
   <?php
    $toP=$r->toPay;
      if(($difdias>0) && ($toP>0)){

    ?>
    <hr>
   <h3>You still owe ${{$r->toPay}}</h3>
   <h3>If you want to pay right now with a 10% discount, please fill the following:</h3>
   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3">

         <form action="{{route('paymentres')}}" method="get" id="payment-form">
  <label for="card-element">
    Credit or debit card
  </label>
  <div id="card-element">
    <!-- A Stripe Element will be inserted here. -->
  </div>

  <!-- Used to display form errors. -->
  <div id="card-errors" role="alert"></div>
  <input type="hidden" name="id" value="{{$r->id}}">
  <input type="hidden" name="cost" value="{{$r->cost}}">
  <input type="hidden" name="toPay" value="0">
<button>Submit Payment</button>
         </form>
       </div>

     </div>

   </div>
   <?php

    }
  }
}
}
  else{
     ?>
     <h3>There is no matching reservation to the data you gave us :(</h3>
     <?php
  }
 ?>
 <hr>
 <form class="" action="{{route('homepage')}}" method="get">
   <button type="submit">Go to homepage</button>
 </form>
 <hr>
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
