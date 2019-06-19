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
  <form action="{{route('location_store')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="country" placeholder="country"/>
    <input type="text" name="state" placeholder="state">
    <input type="text" name="branch" placeholder="branch">
    <input type="double" name="rate" placeholder="rate">
    <button type="submit">Continue</button>

  </form>
  </body>
</html>
