<!DOCTYPE html>
<html>
<head>
  <title>CART</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/lucky.css')}}">
</head>
<body>
  <table>
    <tr>
      <th>Item Image</th>
      <th>Item Name</th>
      <th>Quantity</th>
      <th>Item Price(for 1 item)</th>
      <th>Total Price(for selected quantity item)</th>
    </tr>
    
    

    @foreach($usercart as $key=>$product)
    {{$price=$product['price']}}
    {{$totalQuantity=$product['quantity']}}
    {{$totalPrice=$price * $totalQuantity}}
    <tr>
    
      <td><img src="{{asset('uploadedimages/' . $product['image'])}}" height="200px" width="150px" ></td>
      <td>{{$product['name']}}</td>
      <td>{{$product['quantity']}}</td> 
      <td>{{$product['price']}}</td>
      <td>{{$totalPrice}}</td>
      <td><a href="{{route('deleteCartItem',['cartItem'=> $product['name']])}}">REMOVE</a></td>
    </tr>
      @endforeach

  </table>
  <div>
    <a href="{{url('/pata')}}"><button>CONTINUE SHOPPING</button></a>
    <a href="{{url('orderhandler')}}"><button>PROCEED TO CHECKOUT</button></a>
  </div>

</body>
</html>
  
  