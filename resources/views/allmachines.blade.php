<!DOCTYPE html>
<html>
<head>
	<title>Machines Page</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
</head>
<body>
    <div class="pata_phones">
	
			@foreach($allmachines as $machine)
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
	</div>
</body>
</html>