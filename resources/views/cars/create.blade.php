<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <!-- <#?php foreach($_SESSION as $session_var): ?>
      <li><#?php echo $session_var; ?></li>
    <#?php endforeach; ?> -->
  </ul>
  <hr>
  <form action="{{route('cars_store')}}" method="post">
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
  </body>
</html>
