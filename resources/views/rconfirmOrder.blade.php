<?php
$fee = $shiftingfee;

$pickupstation = $stationname;
$itemsCost = Cart::session('_token')->getTotal();
$TotalCost = $itemsCost + $fee;
Session()->put('ordercost', $TotalCost);

    $customer = auth()->user();
    $customerfname = auth()->user()->fname;



$customersname = $customer['sname'];
$customerphone = $customer['phone'];
$customeremail = $customer['email'];
$rCustDetails = array('fname'=>$customerfname, 'sname'=>$customersname, 'phone'=>$customerphone, 'email'=>$customeremail);
//Store the registered buyer details in a session.
Session()->put('rCustomerDetails',$rCustDetails);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Confirm Order</title>
</head>
<body>
<h2>CONFIRM YOUR ORDER INFORMATION.</h2>
<fieldset>
	<legend>Order Information</legend>
	<h2>Check Your Details</h2>
    
	<ul>

		<li><b>Full Name:</b> {{$customerfname}} ........ {{$customersname}}</li>
		<li><b>Phone Number:</b> {{$customerphone}}</li>
		<li><b>Email Address:</b> {{$customeremail}}</li>
	</ul>

    
    <h2>Item Information</h2>
    @foreach(Cart::getContent() as $item)
    <ul>
    	<li><b>Item name:</b> {{$item->name}}</li>
    	<li>Item Price: {{$item->price}}</li>
    </ul>
    @endforeach
    <h3>Items Total Cost: {{Session()->get('ordercost')}}</h3>
    <h4>Pick Up Station: {{$pickupstation}}</h4>
    <h4>Shifting fee: {{$fee}}</h4>

    <a href="{{url('/rpayOrder')}}"><button type="submit" style="border-radius: 10px; background-color: gold; width:300px">COMPLETE</button></a>

    
</fieldset>
</body>
</html>