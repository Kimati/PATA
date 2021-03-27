<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if($message = Session::get('success'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif
	<div>
        <p style="color:green">The following are the Pick up stations available in your county. PICK ONE TO COMPLETE YOUR ORDER.</p>
            @foreach($availableStations as $place)
            <table>
                <tr>
                    <th>Station Name</th>
                    <th>Transportation Fee</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>{{$place->firststation}}</td>
                    <td>{{$place->fstationcost}}</td>
                    <td>
                           <a href="{{route('çonfirmOrder',['sname'=>$place->firststation, 'scost'=>$place->fstationcost ])}}"> <button type="submit" name="pickupstation" style="background-color: green" value="{{$place->fstationcost}}">
                            PICK
                            </button>
                        </a>

                    </td>
                </tr>
                <tr>
                    <td>{{$place->secondstation}}</td>
                    <td>{{$place->sstationcost}}</td>

                     <td>
                           <a href="{{route('çonfirmOrder',['sname'=>$place->secondstation, 'scost'=>$place->sstationcost ])}}"> <button type="submit" name="pickupstation" style="background-color: green">
                            PICK
                            </button>
                        </a>
                        
                    </td>                   
                 </tr>
                <tr>
                    <td>{{$place->thirdstation}}</td>
                    <td>{{$place->tstationcost}}</td>
                      
                     <td>
                           <a href="{{route('çonfirmOrder',['sname'=>$place->thirdstation, 'scost'=>$place->tstationcost ])}}"> <button type="submit" name="pickupstation" style="background-color: green">
                            PICK
                            </button>
                        </a>
                    </td>

                </tr>
            </table>
            @endforeach

        </div>
</body>
</html>