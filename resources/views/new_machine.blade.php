<!DOCTYPE html>
<html>
<head>
	<title>Sell a Machine</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/pata.css')}}">
	
</head>
<body>
	<div id="div1">
		
		<button class="hombutt" style="background-color:red"><a href="{{url('Homeretrieve')}}">HOME</a></button>

	</div>
	
		@if($message = Session::get('success'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif
		<div id="prod_upload_container">
		
    {!! Form::open(['url'=>'/newmachine_store','enctype'=>'multipart/form-data','files'=>true]) !!}

    <div class="form-group">
	{{Form::label('name','Machine Name')}}
	{{Form::text('name', '', ['class' => 'form-control','placeholder'=>'E.g Printer'])}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	
	<p style="color:red">@error('name'){{$message}}@enderror</p> 
   </div>

   <div class="form-group">
	{{Form::label('price','Your Selling Price')}}
	{{Form::number('price', '', ['class' => 'form-control','placeholder'=>'E.g 10000.00...'])}}
	<p style="color:red">@error('price'){{$message}}@enderror</p> 
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
	{{Form::label('UPLOAD')}}
	{{Form::file('image',['class' => 'form-control','placeholder'=>'Attach an Upload...'])}}
	<p style="color:red">@error('image'){{$message}}@enderror</p>
</div>
<div class="form-group">
 {{Form::submit('submit',['class'=>'btn btn-primary','placeholder'=>'SUBMIT'])}}
</div>
    {!! Form::close() !!}
</div>
<nav id="pata_nav_menu">
	<div class="nav_menu_div">
		<ul>
			<li class="nav_item"><h3>Get To Know Us</h3></li><br>
			<li class="nav_item">Blog</li><br>
			<li class="nav_item">Careers</li><br>
			<li class="nav_item"><a href="{{url('sell')}}">Sell on Pata</a></li><br>
			<li class="nav_item">Buy On Pata</li>
		</ul>
		
	</div>
	<div class="nav_menu_div">
		<ul>
			<li class="nav_item"><h3>PATA Contacts</h3></li>
			<li class="nav_item">Kenya, Nairobi</li>
			<li class="nav_item">P.O. BOX 0000, Kitale</li>
			<li class="nav_item">Phone 1: 0797801442</li>
			<li class="nav_item">Phone 2: 0708000178</li>
			<a href="{{url('contactUs')}}"><li class="nav_item">Contact Us</li></a>



		</ul>
		
		
	</div>
	<footer>
	<p style="padding-top: 2px; text-align:center; color:aqua"><small><i>Copyright &copy; 2021 --PATA--@Kenya@</i></small></p>
</footer>
</nav>
</body>
</html>