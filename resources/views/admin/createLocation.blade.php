@extends('master')
@section('content')
<h3>Please fill the following to create a new location</h3>
<hr/>
  <form action="{{route('location_store')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="country" placeholder="country"/>
    <input type="text" name="state" placeholder="state">
    <input type="text" name="branch" placeholder="branch">
    <input type="double" name="rate" placeholder="rate">
    <input type="number" name="is_airport" placeholder="is_airport"/>
    <button type="submit">Continue</button>
  </form>
  <hr/>
  <br/>
  <h3>Current active locations:</h3>
  <table class="category_id" name="locations">
    <tr>
    <th>Country</th>
    <th>State</th>
    <th>Branch</th>
    <th>Rate</th>
    <th>Airport</th>
  </tr>
    {{csrf_field()}}
  @foreach($location as $l)
  <tr value="{{$l->id}}">
  <td>{{$l->country}}</td>
  <td>{{$l->state}}</td>
  <td>{{$l->branch}}</td>
  <td>{{$l->rate}}</td>
  <td>{{$l->is_airport}}</td>
  <td>
    <form action="{{route('location_delete')}}" method="get">
      <input type="hidden" name="id" value="{{$l->id}}">
      <button type="submit">DELETE</button>
    </form>
  </td>
  </tr>
  @endforeach
</table>
@endsection
