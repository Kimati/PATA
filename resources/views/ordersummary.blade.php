<!DOCTYPE html>
<html>
<head>
	<title>Complete Your Order</title>
</head>
<body>
		
	@if($message = Session::get('summary'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif

	   <p>Order Summary here...</p>
	   
	   {{Cart::session('_token')->getTotal()}}
	

</body>
</html>