<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.alert('Are you sure you want to post an advert to the world?');
	</script>
	<style type="text/css">
		header{
			text-align:center;
			font-size:30px;
			color:white;
		}
		#div1
		{
			line-height: 80px;
			background-color: aqua;
		}
		#div2{
			line-height: 400px;
		}
		

	</style>
</head>
<body>
	<div id="div1">
		<header>SELL NOW</header>
		<button class="hombutt" style="background-color:red"><a href="Home">HOME</a></button>

	</div>
	
		@if($message = Session::get('success'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif
		<div id="div2">
		
    {!! Form::open(['url'=>'/newproduct_store']) !!}

    <div class="form-group">
	{{Form::label('product','Product Name')}}
	<!-- {{Form::text('product', '', ['class' => 'form-control','placeholder'=>'E.g Phone...'])}} --> 
	{{Form::select('product', array('bike' => 'bikes', 'phone' => 'phones','machine'=>'machines','wearable'=>'wearables'))}}
	<p style="color:red">@error('product'){{$message}}@enderror</p> 
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
	{{Form::label('Region')}}
	{{Form::textArea('region', '', ['class' => 'form-control','placeholder'=>'i.e County,sub-county,division,location,village, home address...'])}}
	<p style="color:red">@error('region'){{$message}}@enderror</p>
   </div>

	<div class="form-group">
	{{Form::label('email','Enter Email')}}
	{{Form::email('email', '', ['class' => 'form-control','placeholder'=>'Enter Email...'])}}
	<p style="color:red">@error('email'){{$message}}@enderror</p> 
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
		<footer>
			<p style="padding-top: 2px; text-align:center; color:red"><small><i>Copyright &copy; 2020 ardent</i></small></p>
		</footer>
</body>
</html>