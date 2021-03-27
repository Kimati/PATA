<?php

namespace App\Http\Controllers;
use App\Phone;
use App\Wearable;
use App\Bike;
use App\Machine;
//use Darryldecode\cart\cart;
use Illuminate\Http\Request;

class pAddToCartController extends Controller
{
    //Functions to add Items to Cart
    public function addPhone(Phone $product)
    {
     // dd($product);
      // add the product to cart
  \Cart::session('_token')->add(array(
    'id' => $product->image,
    'name' => $product->name,
    'price' => $product->price,
    'quantity' => 1,
    'image' => $product->image
             ));
  return redirect('/Homeretrieve');

    }

    //Function to display the cart
    public function showcart()
    {
    	$cartItems = \Cart::session('_token')->getContent();
    	return view('pshowcart',compact('cartItems',$cartItems));
    }

    //Function to delete an item from the cart
    public function deleteItem($cartItem)
    {
     \Cart::session('_token')->remove($cartItem);
      return back();
    }

    //Function to update the price of a cart item depending on the quantity specified
    public function updatePrice($itemPrice)
    {
    	\Cart::session('_token')->update($itemPrice,[
	'quantity' => array('relative'=>false,'value'=> request('quantity'))
        ]);
        return back();
    }

    public function addWearable(Wearable $mywearable)
    {
      \Cart::session('_token')->add(array(
    'id' => $mywearable->image,
    'name' => $mywearable->name,
    'price' => $mywearable->price,
    'quantity' => 1,
    'image' => $mywearable->image
             ));
  return redirect('/Homeretrieve');

    }
    


    public function addBike(Bike $mybike)
    {
      \Cart::session('_token')->add(array(
    'id' => $mybike->image,
    'name' => $mybike->name,
    'price' => $mybike->price,
    'quantity' => 1,
    'image' => $mybike->image
             ));
  return redirect('/Homeretrieve');
    }


    public function addMachine(Machine $mymachine)
    {
    	\Cart::session('_token')->add(array(
    'id' => $mymachine->image,
    'name' => $mymachine->name,
    'price' => $mymachine->price,
    'quantity' => 1,
    'image' => $mymachine->image
             ));
  return redirect('/Homeretrieve');
      
    }
}
