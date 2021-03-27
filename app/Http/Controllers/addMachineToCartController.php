<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Machine;
use Illuminate\Http\Request;
use App\CartClass\Cart;

class addMachineToCartController extends Controller
{
    	 //Function to Add A Machine to the Cart
public function addMachine(Request $request,$id)
    {
        $prevCart = $request->session()->get('cart');
  $cart = new cart($prevCart); 
//Getting full details about the Wearable
$machine = Machine::find($id);
$cart->addMachine($id,$machine); //calling the addMachine function.
//Now creating the session.
$request->session()->put('cart',$cart);
//dump($cart); //Displaying the current contents of the cart
return redirect('Homeretrieve');//Possibly to your homepage

    }
    //Funtion to display the cart Items
    public function showCart()
    {
    	$cart = Session::get('cart');//getting the cart from the session. cart is the name of the session.
    	if($cart)//If the cart has items
    	{
      return view('cart',['cartItems' => $cart]);
       // return view("cart");
    	}
    	else//if cart is empty
    	{
    	//echo "Cart empty";
        return redirect('Homeretrieve');
    	}

    }
}
