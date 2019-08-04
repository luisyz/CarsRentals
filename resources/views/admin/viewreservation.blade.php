@extends('master')
@section('content')
<h3>Current active locations:</h3>
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
<td>{{$r->creditcard}}</td>
<td>{{$location->name}}</td>
<td>{{$location->name}}</td>
<td>{{$r->pickup_date}}</td>
<td>{{$r->return_date}}</td>
<td>{{$r->category_id}}</td>
<td>{{$r->cost}}</td>
<td>{{$r->toPay}}</td>
<td>{{$r->extras_id}}</td>
</tr>
@endforeach
</table>

@endsection
