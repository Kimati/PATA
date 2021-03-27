<!DOCTYPE html>
<html>
<head>
	<title>Order Page</title>
</head>
<body>

	@if($message = Session::get('success'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif
	{!! Form::open(['url'=>'/order_store','enctype'=>'multipart/form-data','files'=>true]) !!}
    <fieldset>
    	<legend>Contact Information</legend>
    	<div class="form-group">
    	{{Form::label('fname','First Name')}}
	    {{Form::text('fname', '', ['class' => 'form-control','placeholder'=>'e.g Ezra'])}}
	    <p style="color:red">@error('fname'){{$message}}@enderror</p>
	     </div>

        <div class="form-group">
	    {{Form::label('sname','Second Name')}}
	    {{Form::text('sname', '', ['class' => 'form-control','placeholder'=>'e.g Kimati'])}}
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

</fieldset>

<fieldset>
    	<legend>Location Information</legend>

         <div class="form-group">
	     {{Form::label('address', 'Home Address')}}
	    {{Form::text('address', '', ['class' => 'form-control','placeholder'=>'i.e P.O BOX 260...'])}}
	    <p style="color:red">@error('address'){{$message}}@enderror</p>
        </div>

         <div>
    	{{Form::label('pickupcounty','Select your County')}}
    	{{ Form::select('pickupcounty',array('Turkana'=>'Turkana','Pokot'=>'Pokot','Nairobi'=>'Nairobi','Tranzoia'=>'Tranzoia','Nakuru'=>'Nakuru'))}}
    	<p style="color:red">@error('pickupcounty'){{$message}}@enderror</p>
       </div>
</fieldset>
<div class="form-group">
 {{Form::submit('COMPLETE ORDER',['class'=>'btn btn-primary','placeholder'=>'SUBMIT'])}}
</div>
    {!! Form::close() !!}

</body>
</html>