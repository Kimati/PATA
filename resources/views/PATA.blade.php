<!DOCTYPE html>
<html>
<head id="pata_header">

	<title>PATA PICKS</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
</head>
<body id="pata_body">

	<div id="header_div">
	<ul>
			<a href="{{url('pshowcart')}}"><li class="header_element"><img src="{{asset('chukuimages/shoppingcart.jpg')}}" height="50px" width="50px"><b style="color:red">{{Cart::session('_token')->getTotalQuantity()}}</b></li></a>
			<a href="{{url('/login')}}"><li class="header_element">LOGIN</li></a>
			<a href="{{url('/reg')}}"><li class="header_element">REGISTER</li></a>
			<a href="{{route('logout')}}"><li class="header_element">LOGOUT</li></a>
		</ul>
	</div>

	
		@if($prodReqSuccess = Session::get('requestPlaced'))
		<div class="prod-req-sucessfull" >
		
			<p style="color:red">{{$prodReqSuccess}}</p>
			
		
	   </div>
		@endif

<div id="pata_items_display">

	<div class="pata_phones">
	
			@foreach($phone1 as $phone)
			<div class="item">
				<ul class="my_item"><li><img src="{{asset('uploadedimages/' . $phone->image)}}" height="200px" width="150px"></li></ul>
				<ul class="my_item">
					<li>Name: {{$phone->name}}</li>
					<li>Price: Kshs. {{$phone->price}}</li>
					<li>Status: <b style="color:red"> {{$phone->status}}</b></li>
					<li><a href="{{route('requestPhone', ['pid'=> $phone->id, 'pname'=>$phone->name])}}">REQUEST</a></li>
					<li><a href="{{route('paddToCart',['product'=>$phone->id])}}"><b>ADD TO CART</b></a></li>
				</ul>
				<a href="{{route('phonesametype',['phoneitem'=>$phone->name])}}"><button>search this type</button></a>
			</div>
			@endforeach
		<a href="{{url('allphones')}}" ><button style="background-color: aqua">More</button></a>
	</div>
	<div class="pata_phones">
	
			@foreach($wearables as $wearable)
			<div class="item">
				<ul class="my_item"><li><img src="{{asset('uploadedimages/' . $wearable->image)}}" height="200px" width="150px"></li></ul>
				<ul class="my_item">
					<li>Name: {{$wearable->name}}</li>
					<li>Price: Kshs. {{$wearable->price}}</li>
					<li>Staus: </li>
				<li><a href="{{route('requestWearable', ['wid'=> $wearable->id, 'wname'=> $wearable->name])}}">REQUEST</a></li> 
					<li><a href="{{route('paddWearableToCart',['mywearable'=>$wearable->id])}}"><b>ADD TO CART</b></a></li>
				</ul>
				<a href="{{route('wearablesametype',['wearableitem'=>$wearable->name])}}"><button>this type</button></a>
			</div>
			@endforeach
		<a href="{{url('allwearables')}}"><button style="background-color: aqua">More</button></a>
				
	</div>
		<div class="pata_phones">
	
			@foreach($bikes as $bike)
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
			<a href="{{url('allbikes')}}"><button style="background-color: aqua">More</button></a>
		
	</div>
		<div class="pata_phones">
	
			@foreach($machines as $machine)
			<div class="item">
				<ul class="my_item"><li><img src="{{asset('uploadedimages/' . $machine->image)}}" height="200px" width="150px"></li></ul>
				<ul class="my_item">
					<li>Name: {{$machine->name}}</li>
					<li>Price: Kshs. {{$machine->price}}</li>
					<li>Staus: </li>
					<li><a href="{{route('requestMachine', ['mid'=>$machine->id,'mname'=> $machine->name])}}">REQUEST</a></li>
					<li><a href="{{route('paddMachineToCart',['mymachine'=>$machine->id])}}"><b>ADD TO CART</b></a></li>
				</ul>
				<a href="{{route('machinesametype',['machineitem'=>$machine->name])}}"><button>this type</button></a>
			</div>
			@endforeach
			<a href="{{url('allmachines')}}"><button style="background-color: aqua">More</button></a>
			
				
	</div>
</div>

</body>
<nav id="pata_nav_menu">
	<div class="nav_menu_div">
		<ul>
			<li class="nav_item"><h3>Get To Know Us</h3></li><br>
			<li class="nav_item">Blog</li><br>
			<li class="nav_item">Careers</li><br>
			<li class="nav_item"><a href="{{url('sell')}}">Sell on Pata</a></li><br>
			<li class="nav_item">Buy On Pata</li>
		</ul>
		
	</div>
	<div class="nav_menu_div">
		<ul>
			<li class="nav_item"><h3>PATA Contacts</h3></li><br>
			<li class="nav_item">Kenya, Nairobi</li><br>
			<li class="nav_item">P.O. BOX 0000, Kitale</li><br>
			<li class="nav_item">Phone 1: 0797801442</li><br>
			<li class="nav_item">Phone 2: 0708000178</li><br>
			<a href="{{url('contactUs')}}"><li class="nav_item">Contact Us</li></a>



		</ul>
		
		
	</div>
	<footer>
	<p style="padding-top: 2px; text-align:center; color:aqua"><small><i>Copyright &copy; 2021 --PATA--@Kenya@</i></small></p>
</footer>
</nav>
</html>
