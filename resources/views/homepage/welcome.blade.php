@extends('master')
@section('content')
    <form class="" action="{{route('cars_seedates')}}" method="get">
      <div class="jumbotron" style="background-color:red;">
        <div class="avisTitle">
          <h1>Welcome to AVIS</h1>
        <h5>Let us be a part of your journey</h5>
      </div>
</div>
      <button type="submit">Rent a car</button>
    </form>
@endsection
