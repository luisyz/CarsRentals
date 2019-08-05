<?php
session_start();
$_SESSION["fullname"]=$_GET["fullname"];
$_SESSION["email"]=$_GET["email"];
if(isset($_GET["extra1"])&&$_GET["extra1"]!=1){
  $_SESSION["extra1"]=$_GET["extra1"];
}
else{
  $_SESSION["extra1"]=0;
}
if(isset($_GET["extra2"])&&$_GET["extra2"]!=2){
$_SESSION["extra2"]=$_GET["extra2"];
}
else{
  $_SESSION["extra2"]=0;
}
if(isset($_GET["extra3"])&&$_GET["extra3"]!=3){
$_SESSION["extra3"]=$_GET["extra3"];
}
else{
  $_SESSION["extra3"]=0;
}
$_SESSION["creditcard"]=$_GET["creditcard"];

$inicio=$_SESSION["pickup_date"];
$fin=$_SESSION["return_date"];
$costoe1=$_SESSION["extra1"];
$costoe2=$_SESSION["extra2"];
$costoe3=$_SESSION["extra3"];
$isA=$_SESSION["airport"];
$costom= \App\Category::find($_SESSION["category_id"])->cost;


    $inicio = new DateTime($inicio);
    $fin = new DateTime($fin);
    $difdias = date_diff($inicio, $fin)->days;

$costocalc=function($difdias, $costoe1, $costoe2, $costoe3, $costom, $isA)
{
    $costototal = ($difdias*($costoe1+$costoe2+$costoe3+$costom));
    if($isA==1){
      $costototal= $costototal*1.10;
      return round($costototal);
    }
    else{
    return round($costototal);
    }
};

 ?>
@extends('master')
@section('content')
<h3>Is the following information about your reservation ok?</h3>
<form action="{{route('cars_payment')}}" method="post">
<table class="reservations" name="reservations">
  <tr>
  <th>Full Name</th>
  <th>Email</th>
  <th>Creditcard Number</th>
  <th>Pickup Location</th>
  <th>Return Location</th>
  <th>Pickup date</th>
  <th>Return Date</th>
  <th>Car Category</th>
  <th>Cost</th>
  <th>Extras</th>
</tr>
  {{csrf_field()}}
  <tr>
    <td>{{$_SESSION["fullname"]}}</td>
    <td>{{$_SESSION["email"]}}</td>
    <td>{{$_SESSION["creditcard"]}}</td>
    <td>{{\App\Location::find($_SESSION['pickup_location'])->branch}}</td>
    <td>{{\App\Location::find($_SESSION['return_location'])->branch}}</td>
    <td>{{$_SESSION["pickup_date"]}}</td>
    <td>{{$_SESSION["return_date"]}}</td>
    <td>{{\App\Category::find($_SESSION["category_id"])->name}}</td>
    <td>${{$costocalc($difdias, $costoe1, $costoe2, $costoe3, $costom, $isA)}}</td>
    <?php
    $ex="extra";
    for($i=1;$i<=3;$i++){
    if($_SESSION[$ex.$i]>0){
      ?>
    <td>{{\App\Extra::find($i)->ename}}</td>
    <?php
    }
    }
     ?>
  </tr>
</table>
<input type="hidden" name="cost" value="{{$costocalc($difdias, $costoe1, $costoe2, $costoe3, $costom, $isA)}}">
<button type="submit">Proceed to Payment</button>

</form>
@endsection
