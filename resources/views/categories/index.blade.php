<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Laravel Test</title>
  </head>
  <body>
    <table>
      @foreach($categories as $c)
      <tr>
        <td>{{$c->name}}</td>
        <td>{{$c->cars->count()}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
