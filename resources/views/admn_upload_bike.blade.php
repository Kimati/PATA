<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('css/lucky.css')}}">
</head>
<body>
	@if($message = Session::get('success'))
	<div class="success">
        {{$message}}
        	</div>
	@endif
		
	@if(count($errors)>0)
	@foreach($errors as $error)
	<div class="error">
		{{$error}}
	</div>
	@endforeach
	@endif
	<nav class="admpost">
	<form action="admpoststore">
		<div><header class="admheader">UPLOAD BIKE</header>
</div>
<div class="ad1">
		<label>Title</label>
		<input type="text" name="title"><br><br>
	</div>
	<div class="ad1">
		<label>Content</label>
		<textarea rows="10" cols="50" placeholder="Write some content here... " name="content"></textarea><br><br>
	</div>
	<div class="ad1">
		<label>Upload Attachment</label>
		<input type="file" name="upload" style="background-color:green"><br><br>
	</div>
	<div class="ad1">

		<button type="submit" name="submit" class="admsubmit">POST</button>
	</div>
	</form>
	<div class="ad1">

		<button type="submit" name="submit" class="admsubmit"><a href="dashboard">BACK TO PANEL</a></button>
	</div>
</nav>


</body>
</html>