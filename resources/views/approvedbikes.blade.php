<!DOCTYPE html>
<html>
<head>
	<title>Approved Bikes</title>
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
      
     

      @foreach($approvedBikes as $bike)
      

      <div id="product">
            <div id="prod_div">
                 
                 <ul>
                       <li><h5>Bike Name</h5> {{$bike['name']}} </li>
                       <li><h5>Price</h5> {{$bike['price']}} </li>
                       <li><h5>Date Posted</h5> {{$bike['created_at']}} </li>
                       <li><h5>Seller Phone</h5> {{$bike['seller_phone']}} </li>
                       <li><h5>Seller Email</h5> {{$bike['seller_email']}}</li>
                       <li><h5>Bike Status</h5> {{$bike['status']}}</li>
                       <li><h5>Change Status</h5> <a href="{{route('changebikestatus',['status'=>$bike['id']])}}">Change</a></li>
                       <li><h5>DELETE</h5> <a href="{{route('deletebike',['deletebikeid'=>$bike['id']])}}">Delete</a></li>
                       <li><h5>Email Seller</h5> <a href="mailto('$bike['seller_email']')">Email</a> </li>
                 </ul>
            </div>

            <div id="prod_div">
                  <ul>
                        <li><h5>Image</h5> <img src="{{asset('uploadedimages/' . $bike['image'])}}" height="300px" width="300px" ></li>
                  </ul>
            </div>

      </div>
      
      @endforeach
      
</body>
</html>