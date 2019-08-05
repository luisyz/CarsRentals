<?php
session_start();
$currd= date('Y/m/d');
if($_GET["pickup_date"]>=$_GET["return_date"] or $_GET["pickup_date"]<$currd){
  dd('You can not rent a car with those dates');
}
$_SESSION["pickup_location"]=$_GET["pickup_location"];
$_SESSION["pickup_date"]=$_GET["pickup_date"];
$_SESSION["return_location"]=$_GET["return_location"];
$_SESSION["return_date"]=$_GET["return_date"];
$isAirport= \App\Location::find($_SESSION["pickup_location"])->is_airport;
$_SESSION["airport"]=$isAirport;

if($_SESSION["pickup_location"]!=$_SESSION["return_location"]){
  $_SESSION["difloc"]=1;
}
else{
  $_SESSION["difloc"]=0;
}
 ?>
@extends('master')
@section('content')
    <form class="" action="{{route('cars_pinfo')}}" method="get">
      <h1>Select the type of car you need:</h1>
      {{csrf_field()}}
      <select class="category_id" name="category_id" id="category_id">
      @foreach($categories as $c)
      <option value="{{$c->id}}">{{$c->name}} ${{$c->cost}}</option>
      @endforeach
      </select>
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
    </tr>
    <tr>
    <td>{{\App\Location::find($_SESSION['pickup_location'])->branch}}</td>
    <td>{{$_SESSION["pickup_date"]}}</td>
    <td>{{\App\Location::find($_SESSION["return_location"])->branch}}</td>
    <td>{{$_SESSION["return_date"]}}</td>
    </tr>
    </table>

@endsection
