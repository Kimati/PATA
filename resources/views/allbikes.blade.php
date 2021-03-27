<!DOCTYPE html>
<html>
<head>
	<title>Bikes Page</title>
		<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
</head>
<body>
	<div class="pata_phones">
	
			@foreach($allbikes as $bike)
			<div class="item">
				<ul class="my_item"><li><img src="{{asset('uploadedimages/' . $bike->image)}}" height="200px" width="150px"></li></ul>
				<ul class="my_item">
					<li>Name: {{$bike->name}}</li>
					<li>Price: Kshs. {{$bike->price}}</li>
					<li>Staus: </li>
					<li><a href="{{route('requestBike', ['bid'=>$bike->id, 'bname'=> $bike->name])}}">REQUEST</a></li>
					<li><a href="{{route('paddBikeToCart',['mybike'=>$bike->id])}}"><b>ADD TO CART</b></a></li>
				</ul>
				<a href="{{route('bikesametype',['bikeitem'=>$bike->name])}}"><button>this type</button></a>
			</div>
			@endforeach

</body>
</html>