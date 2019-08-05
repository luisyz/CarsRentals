@extends('master')
@section('content')
<h3>Please fill the following to create a new category</h3>
<hr/>
  <form action="{{route('category_store')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="name" placeholder="name"/>
    <input type="text" name="capacity" placeholder="capacity">
    <input type="number" name="cost" placeholder="cost">
    <button type="submit">Continue</button>
  </form>
  <hr/>
  <br/>
  <h3>Current active categories:</h3>
  <table class="category_id" name="locations">
    <tr>
    <th>Name</th>
    <th>Capacity</th>
    <th>Cost</th>
    <th>Delete</th>
  </tr>
    {{csrf_field()}}
  @foreach($categories as $c)
  <tr value="{{$c->id}}">
  <td>{{$c->name}}</td>
  <td>{{$c->capacity}}</td>
  <td>{{$c->cost}}</td>
  <td>
  <form action="{{route('category_delete')}}" method="get">
    <input type="hidden" name="id" value="{{$c->id}}">
    <button type="submit">DELETE</button>
  </form>
  </td>
  </tr>
  @endforeach
</table>
@endsection
