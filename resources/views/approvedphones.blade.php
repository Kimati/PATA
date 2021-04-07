<!DOCTYPE html>
<html>
<head>

	<title>Approved Phones</title>
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

     @foreach($approvedPhones as $phone)
      
      <div id="product">
            <div id="prod_div">
                 
                 <ul>
                       <li><h5>Phone Name</h5> {{$phone['name']}} </li>
                       <li><h5>Price</h5> {{$phone['price']}} </li>
                       <li><h5>Date Posted</h5> {{$phone['created_at']}} </li>
                       <li><h5>Seller Phone</h5> {{$phone['seller_phone']}} </li>
                       <li><h5>Seller Email</h5> {{$phone['seller_email']}}</li>
                       <li><h5>Phone Status</h5> {{$phone['status']}}</li>
                       <li><h5>Change Status</h5> <a href="{{route('changephonestatus',['status'=>$phone['id']])}}">Change</a></li>
                       <li><h5>DELETE</h5> <a href="{{route('deletephone',['deletephoneid'=>$phone['id']])}}">Delete</a></li>
                       <li><h5>Email Seller</h5> <a href="mailto('$phone['seller_email']')">Email</a> </li>
                 </ul>
            </div>

            <div id="prod_div">
                  <ul>
                        <li><h5>Image</h5> <img src="{{asset('uploadedimages/' . $phone['image'])}}" height="300px" width="300px" ></li>
                  </ul>
            </div>

      </div>
      @endforeach

</body>
</html>