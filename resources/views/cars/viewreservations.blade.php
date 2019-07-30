@extends('master')
@section('content')
<h3>Here's your reservation:</h3>
<table class="reservations" name="reservations">
  <tr>
  <th>Reservation Nr.</th>
  <th>Full Name</th>
  <th>Email</th>
  <!-- <th>Address</th> -->
  <!-- <th>Zipcode</th> -->
  <th>Creditcard Number</th>
  <th>Pickup Location</th>
  <th>Return Location</th>
  <th>Pickup date</th>
  <th>Return Date</th>
  <th>Car Category</th>
  <th>Ammount to pay</th>
  <th>Extras</th>
</tr>
  {{csrf_field()}}
<tr value="{{$r->id}}">
<td>{{$r->id}}</td>
<td>{{$r->fullname}}</td>
<!-- <td>{{$r->email}}</td>
<td>{{$r->address}}</td> -->
<td>{{$r->zipcode}}</td>
<td>{{$r->creditcard}}</td>
<td>{{$r->pickup_id}}</td>
<td>{{$r->return_id}}</td>
<td>{{$r->pickup_date}}</td>
<td>{{$r->return_date}}</td>
<td>{{$r->category_id}}</td>
<td>{{$r->cost}}</td>
<td>{{$r->extras}}</td>
</tr>
</table>
@endsection
