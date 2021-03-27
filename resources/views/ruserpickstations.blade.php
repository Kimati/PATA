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
            
            <table>
                <tr>
                    <th>Station Name</th>
                    <th>Transportation Fee</th>
                    <th>Action</th>
                </tr>

                @foreach($stations as $station)
                
                <tr>
                    <td>
                        {{$station->firststation}}

                    </td>

                    <td>
                            {{$station->fstationcost}}
                    </td>

                     <td>
                      
                           <a href="{{route('rUserConfirmOrder',['rscost'=>$station->fstationcost, 'rsname'=>$station->firststation])}}"> <button  style="background-color: green" >
                            PICK
                            </button> </a>
                       
                    </td>
                </tr>
            
         
           
                <tr>
                    <td>
                      {{$station->secondstation}}
                    </td>

                    <td>
                        {{$station->sstationcost}}
                    </td>
                    <td>
                      
                           <a href="{{route('rUserConfirmOrder',['rscost'=>$station->sstationcost, 'rsname'=>$station->secondstation])}}"> <button  style="background-color: green" >
                            PICK
                            </button> </a>
                       
                    </td>                
                </tr>
            

           
                <tr>
                    <td>
                        {{$station->thirdstation}}
                    </td>

                    <td>
                       {{$station->tstationcost}}
                    </td>

                     <td>
                      
                           <a href="{{route('rUserConfirmOrder',['rscost'=>$station->tstationcost, 'rsname'=>$station->thirdstation])}}"> <button style="background-color: green" >
                            PICK
                            </button> </a>
                       
                    </td>                
                </tr>
            
        </table>
    @endforeach

        </div>
</body>
</html>