<!DOCTYPE html>
<html>
<head>
	<title>Matching items</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
</head>
<body>

<div class="pata_phones">
	
			@foreach($matchingphones as $phone)
			<div class="item">
				<ul class="my_item"><li><img src="{{asset('uploadedimages/' . $phone->image)}}" height="200px" width="150px"></li></ul>
				<ul class="my_item">
					<li>Name: {{$phone->name}}</li>
					<li>Price: Kshs. {{$phone->price}}</li>
					<li>Status: <b style="color:red"> {{$phone->status}}</b></li>
					<li><a href="{{route('requestPhone', ['pid'=> $phone->id, 'pname'=>$phone->name])}}">REQUEST</a></li>
					<li><a href="{{route('paddToCart',['product'=>$phone->id])}}"><b>ADD TO CART</b></a></li>
				</ul>
			</div>
			@endforeach
	</div>


	
</body>
</html>
