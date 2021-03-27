<!DOCTYPE html>
<html>
<head>
	<title>How Do You Want To CheckOut?</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
	<style type="text/css">

		#proceed{
	display: flex;
	justify-content: space-between;
	
}

#proceed_option{
border-style:solid;
border-color: green;
border-radius: 10px;
display: inline-block;
width: 30%;

}

#proceed_option ul li{
	font-size: 30px;
	font-weight: bold;
	font-family: sans-serif;
}
	</style>
</head>
<body id="proceed">
	<div>
		<a href="{{route('registerdcust')}}">
<div id="proceed_option">
	<ul>
		<li>LOGIN</li>
	</ul>
	<p>Choose this option if you are already registered with PATA</p>
</div>
</a>

<a href="">
<div id="proceed_option">
<ul>
		<li>REGISTER</li>
	</ul>
	<p>Choose this if NOT registered and you want to register.</p>
</div>
</a>

<a href="{{url('/guestOrderDetails/prompt')}}">
<div id="proceed_option">
	<ul>
		<li>CHECKOUT.</li>
	</ul>
	<p>Proceed to Checkout without registratering with PATA</p>
</div>
</a>
</div>

</body>
</html>