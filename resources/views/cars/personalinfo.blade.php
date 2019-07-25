@extends('master')
@section('content')
    <form class="" action="{{route('homepage')}}" method="get">
      <h1>Please fill your personal information</h1>
      <label for="fullname">Full name:</label>
      <input type="text" name="fullname" placeholder="fullname" id="fullname"/>
      <label for="email">Email address::</label>
      <input type="text" name="email" placeholder="email@example" id="email"/>
      <label for="address">Personal Address:</label>
      <input type="text" name="address" placeholder="address" id="address">
      <label for="zipcode">Zipcode:</label>
      <input type="number" name="zipcode" placeholder="zipcode" id="zipcode">
      <br/>
      <hr/>
      <h5>If you would like to pay the same day you receive your car, please fill the next area:</h5>
      <label for="creditcard">Creditcard number:</label>
      <input type="text" name="creditcard" placeholder="creditcard" id="creditcard">
      <strong><i>You will have to use this card when you pay at the avis' frontdesk</i></strong>
      <hr/>
      <br/>
      <h5>If you would like to pay now with 5% discount, please fill the next area:</h5>
      <hr/>
      <br/>
      <button type="submit">Continue</button>
    </form>
@endsection
