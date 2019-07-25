@extends('master')
@section('content')
<h3>Please fill the following to create a new category</h3>
<hr/>
  <form action="{{route('category_store')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="brand" placeholder="brand"/>
    <input type="text" name="model" placeholder="model">
    <input type="number" name="year" placeholder="year">
    <select class="category_id" name="category_id">
      @foreach($categories as $c)
      <option value="{{$c->id}}">{{$c->name}}</option>
      @endforeach
    </select>
    <button type="submit">Continue</button>
  </form>
  <hr/>
  <br/>
  <h3>Current active locations:</h3>
  <table class="category_id" name="locations">
    <tr>
    <th>Name</th>
    <th>Capacity</th>
    <th>Cost</th>
  </tr>
    {{csrf_field()}}
  @foreach($categories as $c)
  <tr value="{{$c->id}}">
  <td>{{$c->name}}</td>
  <td>{{$c->capacity}}</td>
  <td>{{$c->cost}}</td>
  </tr>
  @endforeach
</table>
@endsection
