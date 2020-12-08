<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Hola mundo</h1>
    <p> Estimado/a {{$order->user->name}}, Le enviamos los datos de su compra realizada en Cupcake Mio el día {{$order->created_at}}</p>

    <table>
      <thead>
        <tr>
          <th>Producto</th>
          <th>Costo</th>
        </tr>
      </thead>

      <tbody>
        @foreach($order->products as $product)
        <tr>
          <td>{{$product->pivot->quantity . ' x ' . $product->name}}</td>
          <br>
          <td>{{$product->price}}</td>
        </tr>
        @endforeach

        <tr>
          <td>Total</td>
          <td>{{$order->amount}}</td>
        </tr>
      </tbody>
    </table>



  </body>
</html>
