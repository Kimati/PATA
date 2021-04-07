<!DOCTYPE html>
<html>
<head>

	<title>Approved Wearables</title>
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

     @foreach($approvedWearables as $wearable)
      

      <div id="product">
            <div id="prod_div">
                 
                 <ul>
                       <li><h5>Wearable Name</h5> {{$wearable['name']}} </li>
                       <li><h5>Price</h5> {{$wearable['price']}} </li>
                       <li><h5>Date Posted</h5> {{$wearable['created_at']}} </li>
                       <li><h5>Seller Phone</h5> {{$wearable['seller_phone']}} </li>
                       <li><h5>Seller Email</h5> {{$wearable['seller_email']}}</li>
                       <li><h5>Wearable Status</h5> {{$wearable['status']}}</li>
                       <li><h5>Change Status</h5> <a href="{{route('changewearablestatus',['status'=>$wearable['id']])}}">Change</a></li>
                       <li><h5>DELETE</h5> <a href="{{route('deletewearable',['deletewearableid'=>$wearable['id']])}}"></a></li>
                       <li><h5>Email Seller</h5> <a href="mailto('$wearable['seller_email']')">Email</a> </li>
                 </ul>
            </div>

            <div id="prod_div">
                  <ul>
                        <li><h5>Image</h5> <img src="{{asset('uploadedimages/' . $wearable['image'])}}" height="300px" width="300px" ></li>
                  </ul>
            </div>

      </div>
      @endforeach

</body>
</html>