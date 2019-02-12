@if(Session::has('success'))
	<div class="alert col-md-12 alert-success">
	  {{ Session::get('success') }}
	</div>
@endif 

@if(Session::has('city_empty_field'))
	<div class="alert col-md-12 alert-warning">
	  {{ Session::get('city_empty_field') }}
	</div>
@endif 