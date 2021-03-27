<?php  
session()->put('reqMachineId',$reqmachineid);
session()->put('reqMachineName',$machinename);
session()->put('machineType',$machinetype);

//session()->put('reqPhonePrice',$reqphoneprice);
//session()->put(' reqPhoneSeller', $reqphoneseller);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Request Machine</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
</head>
<body>
<div id="productreq_form">
 {!! Form::open(['url'=>'/machinereq_store', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
	{{Form::label('fname',' First Name')}}
	{{Form::text('fname', '', ['class' => 'form-control','placeholder'=>'E.g Manase'])}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	
	<p style="color:red">@error('fname'){{$message}}@enderror</p> 
   </div>

   <div class="form-group">
	{{Form::label('sname',' Second Name')}}
	{{Form::text('sname', '', ['class' => 'form-control','placeholder'=>'E.g Lokutan'])}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	
	<p style="color:red">@error('sname'){{$message}}@enderror</p> 
   </div>

   <div class="form-group">
	{{Form::label('phone','Your Phone Number')}}
	{{Form::number('phone', '', ['class' => 'form-control','placeholder'=>'E.g 0797801442...'])}}
	<p style="color:red">@error('phone'){{$message}}@enderror</p>
   </div>

	<div class="form-group">
	{{Form::label('email','Enter Email')}}
	{{Form::email('email', '', ['class' => 'form-control','placeholder'=>'Enter Email...'])}}
	<p style="color:red">@error('email'){{$message}}@enderror</p> 
   </div>

   <div class="form-group">
       	{{Form::label('county','County Name')}}
	    {{Form::text('county', '', ['class' => 'form-control','placeholder'=>'e.g Turkana County'])}}
	    <p style="color:red">@error('county'){{$message}}@enderror</p>
	</div>

      <div class="form-group">
	    {{Form::label('subcounty','Subcounty')}}
	    {{Form::text('subcounty', '', ['class' => 'form-control','placeholder'=>'e.g Turkana South'])}}
	    <p style="color:red">@error('subcounty'){{$message}}@enderror</p>
	</div>

	    <div class="form-group">
	     {{Form::label('division','Division')}}
	     {{Form::text('division', '', ['class' => 'form-control','placeholder'=>'E.g 0797801442...'])}}
	     <p style="color:red">@error('division'){{$message}}@enderror</p>
        </div>

         <div class="form-group">
	     {{Form::label('location','Location')}}
	     {{Form::text('location', '', ['class' => 'form-control','placeholder'=>'Enter Location...'])}}
	    <p style="color:red">@error('location'){{$message}}@enderror</p> 
       </div>


<div class="form-group">
 {{Form::submit('submit',['class'=>'btn btn-primary','placeholder'=>'SUBMIT'])}}
</div>
    {!! Form::close() !!}
</div>

</body>
</html>