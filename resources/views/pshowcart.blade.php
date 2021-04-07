

<!DOCTYPE html>
<html>
<head>
  <title>CART</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/lucky.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/lucky.css')}}">
</head>
<body>
   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

  <table>
    <tr>
       <th>Item Image</th>
      <th>Item Name</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
    
    

    @foreach($cartItems as $item)
    
    <tr>
      
      <td><img src="{{asset('uploadedimages/' . $item->id)}}" height="200px" width="150px" ></td>
      <td>
      	{{$item->name}}
      </td>
      
      <td>
      	{{Cart::session('_token')->get($item->id)->getPriceSum()}}
      </td>

      <td>
      	<form action="{{route('update.price',$item->id)}}">
      	<input type="number" value="{{$item->quantity}}" name="quantity">
      	<button type="submit">Update</button>
      </form>
      </td>

      <td>
      	<a href="{{route('pdeleteCartItem',['cartItem'=> $item->id])}}">REMOVE</a></td>
    </tr>
      @endforeach

  </table>
  <h2>TOTAL COST: Kshs. {{Cart::session('_token')->getTotal()}}</h2>
  <div>
    <a href="{{url('/pata')}}"><button>CONTINUE SHOPPING</button></a>
    <a href="{{url('/choose-checkout-method')}}"><button>PROCEED TO CHECKOUT</button></a>
  </div>

</body>
</html>
  
