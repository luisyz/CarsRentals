@extends('master')
@section('content')
<?php
$r= \App\Reservation::find($_GET["reservation_id"]);
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
<?php
  }
  else{
     ?>
     <h3>There is no matching reservation to the data you gave us :(</h3>
     <?php
  }
 ?>
 <hr/>
 <?php
 $inicio= date('Y/m/d');
 $fin= $r->pickup_date;
 $inicio = new DateTime($inicio);
 $fin = new DateTime($fin);
 if($inicio<$fin){
 $difdias = date_diff($inicio, $fin)->days;
 if($difdias>=2){
  ?>
  <h5>ATTENTION, by canceling your reservation now you will be charged with 50% of the cost</h5>
 <h3>ONLY IF you want to CANCEL your reservation please press the button:</h3>

 <form action="{{route('reservation_delete')}}" method="get">
   <input type="hidden" name="id" value="{{$r->id}}">
   <button type="submit">DELETE</button>
 </form>
 <?php
  }
  elseif($difdias<2){
   ?>
   <h5>ATTENTION, by canceling your reservation now you will be charged with 25% of the cost</h5>
  <h3>ONLY IF you want to CANCEL your reservation please press the button:</h3>

  <form action="{{route('reservation_delete')}}" method="get">
    <input type="hidden" name="id" value="{{$r->id}}">
    <button type="submit">DELETE</button>
  </form>
  <?php
   }

  ?>

  <?php
}
   ?>
@endsection
