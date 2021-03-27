<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Phone;
use App\Wearable;
use App\Bike;
use App\Machine;


class AddToCartController extends Controller
{
    //Function to add a phone to the Cart
    //public function addItem(Request $request,$id)
    public function addItem(Phone $product)
    {
      /*
       // return view()
    	//print_r($id);
    	$prevCart = $request->session()->get('cart');
  $cart = new Cart($prevCart); 
//Getting full details about the phone
$phone = Phone::find($id);
$cart->addItem($id,$phone); //calling the addItem function.
//Now creating the session.
$request->session()->put('cart',$cart);
dump($cart); //Displaying the current contents of the cart
//return redirect('Homeretrieve');//Possibly to your homepage

*/
$tray = session()->get('tray');

//checking if the item does not exist in the cart
    if(!$tray)
     {
      $tray = [
        $product->image =>[
           'name' => $product->name,
           'quantity' => 1,
           'price' => $product->price,
          'image' => $product->image]
            ];

      session()->put('tray',$tray);
      
      return redirect('Homeretrieve')->with('AddedToCart','Phone added to Cart successfully');

       }

       //If the phone is already in the cart
      if(isset($tray[$product->image]))
       //if(array_key_exists('custphone',$custphone->id))
       {
        //$price=$product->price;
        //$totalQuantity=$product->quantity;
        //$grossPrice=$price * $totalQuantity;
        $tray[$product->image]['quantity']++;
        session()->put('tray', $tray);
        return redirect('Homeretrieve')->with('AddedToCart','Phone added to Cart successfully');
           
       }

       $tray[$product->image] = [
           'name' => $product->name,
           'quantity' => 1,
           'price' => $product->price,
           'image' => $product->image
        ];
        session()->put('tray',$tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');

    }

    //Function to Add A wearable to the Cart
public function addWearable(Wearable $mywearable)
    {
        
      $tray = session()->get('tray');

//checking if the item does not exist in the cart
    if(!$tray)
     {
      $tray = [
        $mywearable->image =>[
           'name' => $mywearable->name,
           'quantity' => 1,
           'price' => $mywearable->price,
          'image' => $mywearable->image]
            ];

      session()->put('tray',$tray);
      return redirect('Homeretrieve')->with('addedToCart','Wearable Added To Cart successfully');

       }

       //If the phone is already in the cart
      if(isset($tray[$mywearable->image]))
       //if(array_key_exists('custphone',$custphone->id))
       {
        $tray[$mywearable->image]['quantity']++;
        session()->put('tray', $tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');
           
       }

       $tray[$mywearable->image] = [
           'name' => $mywearable->name,
           'quantity' => 1,
           'price' => $mywearable->price,
           'image' => $mywearable->image
        ];
        session()->put('tray',$tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');
    }

    //Function to Add A Bike to the Cart
public function addBike(Bike $mybike)
    {
        
       $tray = session()->get('tray');

//checking if the item does not exist in the cart
    if(!$tray)
     {
      $tray = [
        $mybike->image =>[
           'name' => $mybike->name,
           'quantity' => 1,
           'price' => $mybike->price,
          'image' => $mybike->image]
            ];

      session()->put('tray',$tray);
      return redirect('Homeretrieve')->with('Success','Phone Posted successfully');

       }

       //If the phone is already in the cart
      if(isset($tray[$mybike->image]))
       //if(array_key_exists('custphone',$custphone->id))
       {
        $tray[$mybike->image]['quantity']++;
        session()->put('tray', $tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');
           
       }

       $tray[$mybike->image] = [
           'name' => $mybike->name,
           'quantity' => 1,
           'price' => $mybike->price,
           'image' => $mybike->image
        ];
        session()->put('tray',$tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');
    }

     //Function to Add A Machine to the Cart
public function addMachine(Machine $mymachine)
    {
         $tray = session()->get('tray');

//checking if the item does not exist in the cart
    if(!$tray)
     {
      $tray = [
        $mymachine->image =>[
           'name' => $mymachine->name,
           'quantity' => 1,
           'price' => $mymachine->price,
          'image' => $mymachine->image]
            ];

      session()->put('tray',$tray);
      return redirect('Homeretrieve')->with('Success','Phone Posted successfully');

       }

       //If the phone is already in the cart
      if(isset($tray[$mymachine->image]))
       //if(array_key_exists('custphone',$custphone->id))
       {
        $tray[$mymachine->image]['quantity']++;
        session()->put('tray', $tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');
           
       }

       $tray[$mymachine->image] = [
           'name' => $mymachine->name,
           'quantity' => 1,
           'price' => $mymachine->price,
           'image' => $mymachine->image
        ];
        session()->put('tray',$tray);
        return redirect('Homeretrieve')->with('Success','Phone Posted successfully');

    }

    //Funtion to display the cart Items
    public function showCart()
    {


    $usercart=session::get('tray');
    if($usercart)
    {
      return view('cart')->with('usercart',$usercart);
    }
    else //if cart is empty
      {
      //echo "Cart empty";
        return redirect('Homeretrieve');
      }

}

}