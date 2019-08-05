@extends('master')
@section('content')
<h3>Current active reservations:</h3>
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
@foreach($reservations as $r)
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
@endforeach
</table>

@endsection
