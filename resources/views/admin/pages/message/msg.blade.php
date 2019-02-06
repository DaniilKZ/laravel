@if(Session::has('success'))
	<div class="alert col-md-12 alert-success">
	  {{ Session::get('success') }}
	</div>
@endif 