@extends('master')
@section('content')
    <form class="" action="{{route('admin_nav')}}" method="get">
      <div class="jumbotron" style="background-color:red;">
        <div class="avisTitle">
          <h3>Please fill the following areas</h3>
        <input type="text" name="username" placeholder="username" id="username"/>
        <input type="password" name="password" placeholder="password" id="password"/>
      </div>
</div>
      <button type="submit">login</button>
    </form>

    <hr>
    <form class="" action="{{route('homepage')}}" method="get">
      <button type="submit">Go to homepage</button>
    </form>
    <hr>
@endsection
