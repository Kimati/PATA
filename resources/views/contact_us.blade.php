<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
		<link rel="stylesheet" type="text/css" href="{{asset('css/lucky.css')}}">
</head>
<body>
	
   @if($message = Session::get('success'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif
		<div id="div2">
		
    {!! Form::open(['url'=>'/messages_store','enctype'=>'multipart/form-data']) !!}
     <div class="enquiry_form">
    <div class="form-group">
	{{Form::label('Fname','Full Name')}}
	{{Form::text('Fname', '', ['class' => 'form-control','placeholder'=>'e.g Ezra Kimati'])}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	
	<p style="color:red">@error('name'){{$message}}@enderror</p> 
   </div>

   <div class="form-group">
	{{Form::label('phone','Your Phone Number')}}
	{{Form::text('phone', '', ['class' => 'form-control','placeholder'=>'E.g 0797801442...'])}}
	<p style="color:red">@error('phone'){{$message}}@enderror</p>
   </div>

   <div class="form-group">
	{{Form::label('email','Enter Email')}}
	{{Form::email('email', '', ['class' => 'form-control','placeholder'=>'Enter Email...'])}}
	<p style="color:red">@error('email'){{$message}}@enderror</p> 
   </div>

   <div class="form-group">
	{{Form::label('Your Message')}}
	{{Form::textArea('message', '', ['class' => 'form-control','placeholder'=>'i.e Write here...'])}}
	<p style="color:red">@error('region'){{$message}}@enderror</p>
   </div>

	<div class="form-group">
 {{Form::submit('submit',['class'=>'btn btn-primary'])}}
     </div>
 </div>
    {!! Form::close() !!}

</body>
</html>