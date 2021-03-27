<?php
$fee = $shiftingFee;
$stationName = $staname;
$TotalCost = $fee + Cart::session('_token')->getTotal();
Session()->put('ordercost', $TotalCost);
 
$buyer = session()->get('guestfname');
$data = Session::get('guestinfor');
$firstname=$data['fname'];
$secondname=$data['sname'];
$phone=$data['phone'];
$email=$data['email'];

$orderDetails = array('customerfname'=>$firstname,'customersname'=>$secondname,'customerphone'=>$phone,'customeremail'=>$email);
Session()->put('orederdetails',$orderDetails);

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
		<li><b>Full Name:</b> {{$firstname}} ........ {{$secondname}}</li>
		<li><b>Phone Number:</b> {{$phone}}</li>
		<li><b>Email Address:</b> {{$email}}</li>
	</ul>
    
    <h2>Item Information</h2>
    @foreach(Cart::getContent() as $item)
    <ul>
    	<li><b>Item name:</b> {{$item->name}}</li>
    	<li>Item Price: {{$item->price}}</li>
    </ul>
    @endforeach
    <h3>Pick Up Station: {{$stationName}}</h3>
    <h3>Shifting Fee: {{$fee}}</h3>
    <h3>Total Cost: {{$TotalCost}}</h3>
    <a href="{{url('/payOrder')}}"><button type="submit" style="border-radius: 10px; background-color: gold; width:300px">COMPLETE</button></a>

    
</fieldset>
</body>
</html>