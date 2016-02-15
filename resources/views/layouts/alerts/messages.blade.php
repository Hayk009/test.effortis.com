@if ($errors->has())
	<div class="alert alert-danger" role="alert">
		@foreach ($errors->all() as $key => $error)
	 		<li>{{ $error }}</li>
	 	@endforeach
	</div>
@endif
@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
	 	<p>{{ Session::get('success') }}</p>
	</div>
@endif
<div class="alert alert-success" style="display:none;" role="alert">
 	<p class="message-success"></p>
</div>	
@if (Session::has('warning'))
	<div class="alert alert-warning" role="alert">
	 	<p>{{ Session::get('warning') }}</p>
	</div>
@endif