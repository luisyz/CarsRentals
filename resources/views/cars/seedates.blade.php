@extends('master')
@section('content')
    <form class="" action="{{route('cars_categories')}}" method="get">
      <h1>Select the dates you will use our car:</h1>
      <label for="pickup_location">Pickup Location:</label>
      <select class="pickup_location" name="pickup_location" id="pickup_location">
      @foreach($location as $l)
      <option value="{{$l->id}}">{{$l->country}}, {{$l->state}}, {{$l->branch}}</option>
      @endforeach
      </select>
      <label for="pickup_date">Pickup Date:</label>
      <input type="date" name="pickup_date" placeholder="pickup_date" id="pickup_date"/>
      <label for="return_location">Return Location:</label>
      <select class="return_location" name="return_location" id="return_location">
      @foreach($location as $l)
      <option value="{{$l->id}}">{{$l->country}}, {{$l->state}}, {{$l->branch}}</option>
      @endforeach
      </select>
      <label for="return_date">Return Date:</label>
      <input type="date" name="return_date" placeholder="return_date" id="return_date">
      <button type="submit">Continue</button>
    </form>
    <hr>
    <h5>Note: Selecting airports or different pickup-return locations has an extra fee</h5>
@endsection
