@extends('master')
@section('content')
      <div class="jumbotron" style="background-color:red;">
        <div class="avisTitle">
          <h3>Welcome administrator of avis</h3>
      </div>
</div>
    <form class="" action="{{route('admin_createlocation')}}" method="get">
    <button type="submit">Locations</button>
    </form>
    <form class="" action="{{route('admin_createcategory')}}" method="get">
    <button type="submit">Categories</button>
    </form>
    <form class="" action="{{route('admin_viewreservation')}}" method="get">
    <button type="submit">Reservations</button>
    </form>

    <hr>
    <form class="" action="{{route('homepage')}}" method="get">
      <button type="submit">Go to homepage</button>
    </form>
    <hr>
@endsection
