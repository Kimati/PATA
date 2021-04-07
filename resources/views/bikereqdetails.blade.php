<?php  
session()->put('reqBikeId',$reqbikeid);
session()->put('reqBikeName',$reqbikename);
session()->put('bikeType',$biketype);

//session()->put('reqPhonePrice',$reqphoneprice);
//session()->put(' reqPhoneSeller', $reqphoneseller);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Request Bike</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">

	<style type="text/css">

        @media (max-width:430px)
        {
            #productreq_form{
               
               width:100%;
               margin-left: 0px;
    
               }
        }
        

    </style>
</head>
<body>
<div id="productreq_form">
 {!! Form::open(['url'=>'/bikereq_store', 'enctype'=>'multipart/form-data']) !!}

    <div class="fom-group">
	{{Form::label('fname',' First Name')}}<br>
	{{Form::text('fname', '', ['class' => 'form-control','placeholder'=>'E.g Manase'])}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	
	<p style="color:red">@error('fname'){{$message}}@enderror</p> 
   </div>

   <div class="fom-group">
	{{Form::label('sname',' Second Name')}}<br>
	{{Form::text('sname', '', ['class' => 'form-control','placeholder'=>'E.g Lokutan'])}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	
	<p style="color:red">@error('sname'){{$message}}@enderror</p> 
   </div>

   <div class="fom-group">
	{{Form::label('phone','Your Phone Number')}}<br>
	{{Form::number('phone', '', ['class' => 'form-control','placeholder'=>'E.g 0797801442...'])}}
	<p style="color:red">@error('phone'){{$message}}@enderror</p>
   </div>

	<div class="fom-group">
	{{Form::label('email','Enter Email')}}<br>
	{{Form::email('email', '', ['class' => 'form-control','placeholder'=>'Enter Email...'])}}
	<p style="color:red">@error('email'){{$message}}@enderror</p> 
   </div>

   <div class="fom-group">
       	{{Form::label('county','County Name')}}<br>
	    {{Form::text('county', '', ['class' => 'form-control','placeholder'=>'e.g Turkana County'])}}
	    <p style="color:red">@error('county'){{$message}}@enderror</p>
	</div>

      <div class="fom-group">
	    {{Form::label('subcounty','Subcounty')}}<br>
	    {{Form::text('subcounty', '', ['class' => 'form-control','placeholder'=>'e.g Turkana South'])}}
	    <p style="color:red">@error('subcounty'){{$message}}@enderror</p>
	</div>

	    <div class="fom-group">
	     {{Form::label('division','Division')}}<br>
	     {{Form::text('division', '', ['class' => 'form-control','placeholder'=>'E.g 0797801442...'])}}
	     <p style="color:red">@error('division'){{$message}}@enderror</p>
        </div>

         <div class="fom-group">
	     {{Form::label('location','Location')}}<br>
	     {{Form::text('location', '', ['class' => 'form-control','placeholder'=>'Enter Location...'])}}
	    <p style="color:red">@error('location'){{$message}}@enderror</p> 
       </div>


<div class="fom-group">
 {{Form::submit('submit',['class'=>'btn btn-primary','placeholder'=>'SUBMIT'])}}
</div>
    {!! Form::close() !!}
</div>

</body>
</html>