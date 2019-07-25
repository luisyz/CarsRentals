@extends('master')
@section('content')
    <form class="" action="{{route('cars_pinfo')}}" method="get">
      <h1>Select the type of car you need:</h1>
      {{csrf_field()}}
      <select class="category_id" name="category_id">
      @foreach($categories as $c)
      <option value="{{$c->id}}">{{$c->name}} ${{$c->cost}}</option>
      @endforeach
      </select>
      <button type="submit">Continue</button>
    </form>
@endsection
