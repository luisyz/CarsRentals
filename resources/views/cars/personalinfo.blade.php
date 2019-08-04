  <?php
  session_start();
  $_SESSION["category_id"]=$_GET["category_id"];
   ?>
@extends('master')
@section('content')
    <form class="" action="{{route('cars_viewreservations')}}" method="get">
      <h1>Please fill your personal information</h1>
      <label for="fullname">Full name:</label>
      <input type="text" name="fullname" placeholder="fullname" id="fullname"/>
      <label for="email">Email address:</label>
      <input type="text" name="email" placeholder="email@example" id="email"/>
      <br/>
      <label>Extras (Cost per day):</label>
      @foreach($extras as $e)
      <br/>
      <input type="checkbox" name="extra{{$e->id}}" value="{{$e->ecost}}" id="extra{{$e->id}}">{{$e->ename}} ${{$e->ecost}}</input>
      @endforeach
      <br/>
      <label for="creditcard">Creditcard number:</label>
      <input type="number" name="creditcard" placeholder="creditcard" id="creditcard">
      <strong><i>You will show this card at the avis' frontdesk</i></strong>
      <hr/>
      <br/>
      <button type="submit">Continue</button>
    </form>
    <hr/>
    <h5>Your reservation so far:</h5>
    <table class="reservations" name="reservations">
      <tr>
      <th>Pickup place</th>
      <th>Pickup date</th>
      <th>Dropoff place</th>
      <th>Dropoff date</th>
      <th>Model</th>
    </tr>
    <tr>
      <td>{{\App\Location::find($_SESSION['pickup_location'])->branch}}</td>
      <td>{{$_SESSION["pickup_date"]}}</td>
      <td>{{\App\Location::find($_SESSION["return_location"])->branch}}</td>
      <td>{{$_SESSION["return_date"]}}</td>
    <td>{{\App\Category::find($_SESSION["category_id"])->name}}</td>
    </tr>
    </table>
@endsection
