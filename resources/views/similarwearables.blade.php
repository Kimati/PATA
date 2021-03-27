<!DOCTYPE html>
<html>
<head>
	<title>Wearables</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
</head>
<body>
<div class="pata_phones">
	
			@foreach($matchingwearables as $wearable)
			<div class="item">
				<ul class="my_item"><li><img src="{{asset('uploadedimages/' . $wearable->image)}}" height="200px" width="150px"></li></ul>
				<ul class="my_item">
					<li>Name: {{$wearable->name}}</li>
					<li>Price: Kshs. {{$wearable->price}}</li>
					<li>Staus: </li>
				<li><a href="{{route('requestWearable', ['wid'=> $wearable->id, 'wname'=> $wearable->name])}}">REQUEST</a></li> 
					<li><a href="{{route('paddWearableToCart',['mywearable'=>$wearable->id])}}"><b>ADD TO CART</b></a></li>
				</ul>
			</div>
			@endforeach
				
	</div>
</body>
</html>