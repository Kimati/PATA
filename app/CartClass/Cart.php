<?php
/*

use Illuminate\Http\Request;
namespace App\CartClass; 

class Cart
{
//public $items; ////['id'=>['quantity'=>,'price'=>,'data'=>],....]
public $items = array(); //added
public $totalQuantity;
public $totalPrice;
//public $productToAdd;

//public $name;
//creating the constructor;
public function __constructor(Request $prevCart)
{
if($prevCart != null) //If the the cart has items
    {
      $this->items = $prevCart->items;
      //$items = $prevCart->items; //added
      $this->totalQuantity = $prevCart->totalQuantity;
      //$totalQuantity = $prevCart->totalQuantity; //added
       $this->totalPrice = $prevCart->totalPrice;
    }
 else 
   {
     $this->items = [];
    //$items = [];//added
    $this->totalQuantity = 0;
   // $totalQuantity = 0;
      $this->totalPrice = 0;
    }
}

//creating a function to add phones to the Cart
public function addItem($id,$phone)
{

//$price = (int)str_replace("$","",$phone->price);//converts the price value back to string.
  //$quantity= $phone->id;
	$price = $phone->price;  
	$name = $phone->name;
	$image = $phone->image;
  //$num = $phone->id;

//First check if the phone is in the previous cart or not
   if(array_key_exists($id,$this->items))
      {
        //$productToAdd = $this->items[$id];
        $productToAdd = $items[$id]; //added
        $productToAdd['num']++;
       }
      else  //if it is the first time the user is adding the item to the cart
      {
        $productToAdd = ['num' => 1, 'price'=>$price, 'name'=>$name,'image'=>$image]; 
       }
      $this->items[$id] = $productToAdd;
      $this->totalQuantity++;
      $this->totalPrice = $this->totalPrice + $price;
}

//creating a function to add wearables to the Cart
public function addWearable($id,$wearable)
{

//$price = (int)str_replace("$","",$phone->price);//converts the price value back to string.
  $price = $wearable->price;  
  $name = $wearable->name;
  $image = $wearable->image;
  $num = $wearable->id;

//First check if the product is in the previous cart or not
   if(array_key_exists($id, [$this->items]))
      {
        $productToAdd = $this->items[$id];
        $productToAdd['num']++;
       }
      else  //if it is the first time the user is adding the item to the cart
      {
        $productToAdd = ['num' => 1, 'price'=>$price, 'name'=>$name,'image'=>$image]; 
       }
      $this->items[$id] = $productToAdd;
      $this->totalQuantity++;
      $this->totalPrice = $this->totalPrice + $price;
}


//creating a function to add Bikes to the Cart
public function addBike($id,$bike)
{

//$price = (int)str_replace("$","",$phone->price);//converts the price value back to string.
  $price = $bike->price;  
  $name = $bike->name;
  $image = $bike->image;
  $num = $bike->id;


//First check if the product is in the previous cart or not
   if(array_key_exists($id, [$this->items]))
      {
        $productToAdd = $this->items[$id];
        $productToAdd['num']++;
       }
      else  //if it is the first time the user is adding the item to the cart
      {
        $productToAdd = ['num' => 1, 'price'=>$price, 'name'=>$name,'image'=>$image]; 

       }
       $this->items[$id] = $productToAdd;
      $this->totalQuantity++;
      $this->totalPrice = $this->totalPrice + $price;
      
}
//creating a function to add Machines to the Cart
public function addMachine($id,$machine)
{

//$price = (int)str_replace("$","",$phone->price);//converts the price value back to string.
  $price = $machine->price;  
  $name = $machine->name;
  $image = $machine->image;
  $num = $machine->id;

//First check if the product is in the previous cart or not
   if(array_key_exists($id, [$this->items]))
      {
        $productToAdd = $this->items[$id];
        $productToAdd['num']++;
       }
      else  //if it is the first time the user is adding the item to the cart
      {
        $productToAdd = ['num' => 1, 'price'=>$price, 'name'=>$name,'image'=>$image]; 
       }
              $this->items[$id] = $productToAdd;
      $this->totalQuantity++;
      $this->totalPrice = $this->totalPrice + $price;

}
}