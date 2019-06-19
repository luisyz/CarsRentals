<!-- // if (empty($_GET['pickup_date']) || empty($_GET['pickup_location']) || empty($_GET['return_date']) || empty($_GET['return_location'])){
//    return redirect('/cars/reservations/seedates')->withLocation($location);
//   // echo 'No llenaste todos los datos';
//
// } -->



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="get">
      <h1>Select the type of car you need:</h1>
      {{csrf_field()}}
      <select class="category_id" name="category_id">
      @foreach($categories as $c)
      <option value="{{$c->id}}">{{$c->name}} ${{$c->cost}}</option>
      @endforeach
      </select>
      <button type="submit">Continue</button>
    </form>
  </body>
</html>
