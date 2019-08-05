@extends('master')
@section('content')
    <form class="" action="{{route('cars_reservationtable')}}" method="get">
      <h1>Fill the following to check your reservation's info:</h1>
      {{csrf_field()}}
      <label for="reservation_id">Reservation's Number:</label>
      <input type="number" name="reservation_id" placeholder="reservation's nr." id="reservation_id"/>
      <label for="fullname">Full name (as you wrote on your reservation):</label>
      <input type="text" name="fullname" placeholder="fullname" id="fullname"/>
      <button type="submit">Check</button>
    </form>
@endsection
