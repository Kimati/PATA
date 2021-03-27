<!DOCTYPE html>
<html>
<head>
	<title>GUEST CHECKOUT</title>
</head>
<body>
{!! Form::open(['url'=>'/guestOrderDetails', 'enctype'=>'multipart/form-data']) !!}

 <div class="form-group">
{{Form::label('fname','First Name')}}
{{Form::text('fname','',['class' => 'form-control','placeholder'=>'E.g John '])}}
<p style="color:red">@error('fname'){{$message}}@enderror</p>
</div>

<div class="form-group">
	{{Form::label('sname','Second Name')}}
	{{Form::text('sname', '', ['class' => 'form-control','placeholder'=>'E.g Ikadon...'])}}
	<p style="color:red">@error('sname'){{$message}}@enderror</p>
   </div>

   <div class="form-group">
	{{Form::label('phone','Working Phone Number')}}
	{{Form::number('phone', '', ['class' => 'form-control','placeholder'=>'E.g 0797801442...'])}}
	<p style="color:red">@error('phone'){{$message}}@enderror</p>
   </div>


   <div class="form-group">
	{{Form::label('email','Enter Valid Email')}}
	{{Form::email('email', '', ['class' => 'form-control','placeholder'=>'Enter Email...'])}}
	<p style="color:red">@error('email'){{$message}}@enderror</p> 
   </div>
   
<div class="form-group">
 {{Form::submit('submit',['class'=>'btn btn-primary'])}}
     </div>

{!! Form::close() !!}
</body>
</html>