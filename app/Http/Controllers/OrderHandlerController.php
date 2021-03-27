<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\PickUpStation;
use App\NewOrder;
use App\User;
use Illuminate\Support\Facades\Session;
//use App\Http\Controllers\Cart;

use Illuminate\Support\Facades\DB;

class OrderHandlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orderpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['fname'=>'required', 'sname'=>'required','phone'=>'required|min:10|max:10','address'=>'required','email'=>'required|email','county'=>'required','subcounty'=>'required','division'=>'required','location'=>'required','pickupcounty'=>'required']);
        $order=new Order;
        $order->fname=$request->input('fname');
        $order->sname=$request->input('sname');
        $order->phone=$request->input('phone');
        $order->email=$request->input('email');
        $order->county=$request->input('county');
        $order->subcounty=$request->input('subcounty');
        $order->division=$request->input('division');
        $order->location=$request->input('location');
        $order->address=$request->input('address');
        $order->pickupcounty=$request->input('pickupcounty');
    
        $order->save();
        $buyerpickupcounty=$order->pickupcounty;
        return redirect('/choose-pickup-station')->with('buyerpickupcounty',$buyerpickupcounty);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
/*
    public function ordersummary(Request $request)
    {

    }
    */
/*
    public function pickUpStation(Request $request)
    {
      $station = $request->buyerpickupcounty;
        $buyerstation = DB::table('pick_up_stations')->where('county','like','%'.$station.'%')->get();
        return view('pickupstation')->with('station',$station)->with('buyerstation',$buyerstation);
    }
*/

    public function checkoutMethod()
    {
        return view('proceedmethod');
    }

//This function display the form that captures the details of the checking out guest.
    public function guestDetailsPrompt()
    {
        return view('guestcheckout');
    }

//This function captures the data of the buyers who want to checkout without registration.
    public function guestOrderDetails(request $request)
    {
        //Validating the data
        $this->validate($request,['fname'=>'required|max:20|min:3','sname'=>'required|max:20|min:3', 'phone'=>'required|max:10|min:10', 'email'=>'required|email']);
      $guestfname = $request->fname;
      $guestsname = $request->sname;
      $guestphone = $request->phone;
      $guestemail = $request->email;

       //creating an array to hold the guest buyer data and then storing that array in a session.
      $guestdata = array('fname'=>$guestfname,'sname'=>$guestsname,'phone'=>$guestphone,'email'=> $guestemail);

      Session()->put('guestinfor', $guestdata); //storing the array to to a session called guestdata

      return redirect('/choose-pickup-county');
    }

public function choosecounty()
{
 //$buyercounty = $request->county;
 //dd($buyercounty);
    return view('mypickupcounty');

}

public function pickupstation(Request $request)
{
    $customerCounty = $request->pickupcounty; // The picked county name from the pickcounty form.

    //Stor the county name in a session
    Session()->put('county',  $customerCounty);

    $availableStations = DB::table('pick_up_stations')->where('county','like','%'.$customerCounty.'%')->get();

    return view('mypickupstation')->with('availableStations',$availableStations)->with('customerCounty',$customerCounty);

    }

public function ordersummary()
{
    //echo "This will be the order summary page ";
    return view('ordersummary');

}

public function confirmOrder(Request $request,$sname,$scost)
{
    //$shiftingFee = $request->pickupstation;
    $staname = $request->sname;
    $shiftingFee = $request->scost;
    Session()->put('shiftingfee',  $shiftingFee);
    Session()->put('sname',$staname);

    $destcounty = Session()->get('county'); //Retrieving the buyer county name

   //Retrieving the pickup station name from db based on the pick up county name and the shifting fee parameters.
    $searchcounty = DB::table('pick_up_stations')->where('county', 'like', '%'.$destcounty.'%')->get();
    foreach ($searchcounty as $value) 
    {
        if ($value->fstationcost === $shiftingFee) 
    {
        $deststation = $value->firststation;
        Session()->put('deststation', $deststation );
    }
    elseif ($value->sstationcost === $shiftingFee) 
    {
        $deststation = $value->secondstation;
         Session()->put('deststation', $deststation );
    }
    elseif ($value->tstationcost === $shiftingFee) 
    {
        $deststation = $value->thirdstation;
         Session()->put('deststation', $deststation );
    }
    }
    return view('confirmOrder')->with('shiftingFee',  $shiftingFee)->with('staname',$staname);

}

public function rUserConfirmOrder(Request $request, $rscost, $rsname)
{
  $shiftingfee = $request->rscost;
  $stationname = $request->rsname;
  //dump($stationname);
 Session()->put('rushiftingfee', $shiftingfee);
 Session()->put('rustationname',  $stationname);

  return view('rconfirmOrder')->with('shiftingfee',$shiftingfee)->with('stationname',$stationname);
}


public function payOrder()
{
    //First save the order details in the database.
    return view('pay');

}

public function rPayOrder()
{
    //First save the order details in the database.
    return view('rpay');

}

//Saving the order to the database after payment of that order
public function saveOrder()
{
    //Getting the details of the item form the Cart session
    $custordereditem = \Cart::session('_token')->getContent() ;
    //$cartItems = \Cart::session('_token')->getContent();
    foreach ($custordereditem as $ordereditem) 
    {
      $itemname = $ordereditem['name'];
        $itemprice = $ordereditem['price'];
        $itemquantity = $ordereditem['quantity'];
        $totalprice = $ordereditem->getPriceSum();
    }
        

    

    //Getting the buyer information from the session
    $buyer = Session::get('guestinfor');

    $firstname=$buyer['fname'];
    $secondname=$buyer['sname'];
    $phone=$buyer['phone'];
    $email=$buyer['email'];

    $ordernumber = "SAWAEZRA";
    $customercounty = Session()->get('county');
    // $pickupstation =  Session()->get('deststation');
    $fee = Session()->get('shiftingfee');
    $pickupstation =  Session()->get('sname');

    $ordercost = Session()->get('ordercost');
    //saving the order details to database
    
   
     

    
    $order = new NewOrder;
    $order->custfirstname = $firstname;
    $order->custsecondname = $secondname;
    $order->custphone = $phone;
    $order->custemail = $email;
    $order->itemname = $itemname;
    $order->itemquantity = $itemquantity;
    $order->itemcost = $totalprice;
    $order->pickupcounty =  $customercounty;
    $order->pickupstation =   $pickupstation ;
    $order->shiftingfee = $fee;
    $order->totalcost = $ordercost;
    $order->ordernumber = $ordernumber;
     
     $order->save();
     //return redirect('/Homeretrieve');
     //return redirect(route('logout'));

   \Cart::session('_token')->clear(); //clearing the contents of the cart
     return redirect('/Homeretrieve');


    

}

//Saving the order to the database after payment of that order by registered member
public function rSaveOrder()
{
    //Getting the details of the item form the Cart session
    $custordereditem = \Cart::session('_token')->getContent() ;
    //$cartItems = \Cart::session('_token')->getContent();
    foreach ($custordereditem as $ordereditem) 
    {
     //$allitems =  $ordereditem->get($ordereditem['name']);

      $itemname = $ordereditem['name'];
        $itemprice = $ordereditem['price'];
        $itemquantity = $ordereditem['quantity'];
        $totalprice = $ordereditem->getPriceSum();
    }
/*
$custitem = \Cart::session('_token')->getContent() ;
foreach($custitem as $ite)
{
  $itename =  $ite['name'];
    $itemnames = \Cart::get($itename);

  }
  */

        

    


$regbuyer = Session()->get('rCustomerDetails'); 
$customerfname = $regbuyer['fname'];
$customersname = $regbuyer['sname'];
$customerphone = $regbuyer['phone'];
$customeremail = $regbuyer['email'];


    $ordernumber = "SAWAEZRA";
    $rcustcounty = Session()->get('rusercounty');
    //$fee = Session()::get('shiftingfee');
    $ordercost = Session()->get('ordercost');
    //saving the order details to database
    
    $stationfee =  Session()->get('rushiftingfee');
    $statname =  Session()->get('rustationname');

    
    $rorder = new NewOrder;
    $rorder->custfirstname = $customerfname;
    $rorder->custsecondname = $customersname;
    $rorder->custphone = $customerphone;
    $rorder->custemail = $customeremail;
    $rorder->itemname =  $itemname;
    $rorder->itemquantity = $itemquantity;
    $rorder->itemcost = $totalprice;
    $rorder->pickupcounty =  $rcustcounty;
    $rorder->pickupstation =   $statname ;
    $rorder->shiftingfee = $stationfee;
    $rorder->totalcost = $ordercost;
    $rorder->ordernumber = $ordernumber;
     
     $rorder->save();

     \Cart::session('_token')->clear();  //clearing the contents of the cart
     return redirect('/Homeretrieve');


    

}

public function registeredCustomers()
{
  return view('ruserpickupcounty');
}

public function ruserpickupstation(Request $request)
{
  $rcustomercounty = $request->ruserpickupcounty;
 // dump($rcustomercounty);


  Session()->put('rusercounty',    $rcustomercounty);

    $stations = DB::table('pick_up_stations')->where('county','like','%'.  $rcustomercounty.'%')->get();

    return view('ruserpickstations')->with('stations',$stations)->with('rcustomercounty',$rcustomercounty);
    

}






}
