<!DOCTYPE html>
<html>
<head>
	<title>Your Pick Up Station</title>
</head>
<body>
         <div>
         	@foreach($buyerstation as $place)
         	<table>
         		<tr>
         			<th>Station Name</th>
         			<th>Transportation Fee</th>
         			<th>Action</th>
         		</tr>
         		<tr>
         			<td>{{$place->firststation}}</td>
         			<td>{{$place->1stationcost}}</td>
         			<td><h3 style="color:green"><a href="#">PICK</a></h3></td>
         		</tr>
         		<tr>
         			<td>{{$place->secondstation}}</td>
         			<td>{{$place->2stationcost}}</td>
         			<td><h3 style="color:green"><a href="#">PICK</a></h3></td>
         		</tr>
         		<tr>
         			<td>{{$place->thirdstation}}</td>
         			<td>{{$place->3stationcost}}</td>
         			<td><h3 style="color:green"><a href="#">PICK</a></h3></td>
         		</tr>
         	</table>
         	@endforeach

        </div>
</body>
</html>