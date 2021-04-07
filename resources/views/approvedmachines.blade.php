<!DOCTYPE html>
<html>
<head>

	<title>Approved Machines</title>
      <style type="text/css">
            
            #product{
                  border-style: solid;
                  border-color: aqua;
                  border-radius: 10px;
                  background-color: coral;
            }

            #prod_div ul{
                  display: flex;
            }

             #prod_div ul li{
                  margin-left: 10px;
                  list-style-type: none;
            }

      </style>

</head>
<body>

     @foreach($approvedMachines as $machine)
      

      <div id="product">
            <div id="prod_div">
                 
                 <ul>
                       <li><h5>Machine Name</h5> {{$machine['name']}} </li>
                       <li><h5>Price</h5> {{$machine['price']}} </li>
                       <li><h5>Date Posted</h5> {{$machine['created_at']}} </li>
                       <li><h5>Seller Phone</h5> {{$machine['seller_phone']}} </li>
                       <li><h5>Seller Email</h5> {{$machine['seller_email']}}</li>
                       <li><h5>Machine Status</h5> {{$machine['status']}}</li>
                       <li><h5>Change Status</h5> <a href="{{route('changemachinestatus',['status'=>$machine['id']])}}">Change</a></li>
                       <li><h5>DELETE</h5> <a href="{{route('deletemachine',['deletemachineid'=>$machine['id']])}}">Delete</a></li>
                       <li><h5>Email Seller</h5> <a href="mailto('$machine['seller_email']')">Email</a> </li>
                 </ul>
            </div>

            <div id="prod_div">
                  <ul>
                        <li><h5>Image</h5> <img src="{{asset('uploadedimages/' . $machine['image'])}}" height="200px" width="150px" ></li>
                  </ul>
            </div>

      </div>
      @endforeach

      

</body>
</html>