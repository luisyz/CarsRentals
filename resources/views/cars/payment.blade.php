<?php
session_start();
$_SESSION["cost"]=$_POST["cost"];
$_SESSION["toPay"]=$_SESSION["cost"];
 ?>
@extends('master')
@section('content')
    <h1>Your total is ${{$_SESSION["cost"]}}</h1>
    <hr/>
    <h3>If you want to pay right now with a discount, please fill the following:</h3>
    <hr/>

    <form class="" action="{{route('cars_viewreservations')}}" method="post">
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

@endsection
