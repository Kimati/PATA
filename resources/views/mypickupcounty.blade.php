<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if($message = Session::get('success'))
		<div class="success">
            {{$message}}
	   </div>
	   @endif
	</form>

	{!! Form::open(array('route'=>array('pickupstation'),'enctype'=>'multipart/form-data'))  !!}

<fieldset>
    	<legend>Set Your Prefered Pick-up county</legend>

         <div>
    	{{Form::label('pickupcounty','Select your County')}}
    	{{ Form::select('pickupcounty',array('Turkana'=>'Turkana','Pokot'=>'Pokot','Nairobi'=>'Nairobi','Tranzoia'=>'Tranzoia','Nakuru'=>'Nakuru'))}}
    	<p style="color:red">@error('pickupcounty'){{$message}}@enderror</p>
       </div>
</fieldset>
<div class="form-group">
 {{Form::submit('NEXT STEP',['class'=>'btn btn-primary','placeholder'=>'SUBMIT'])}}
</div>
    {!! Form::close() !!}
</body>
</html>