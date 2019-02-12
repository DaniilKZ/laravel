@extends('admin.admin-index')

@section('title', 'Добавить город')

@section('content') 
	{!! Form::open(['route' => 'city.store', 'class' => 'col-md-12']) !!}
	<div class="row">
		<div class="col-md-10"> 
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('title', 'Название города') }} <span class="required">*</span>
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'city__title', 'required' => 'required']) }} 
			  		</div>
			  	</div> 
			</div>
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('country_city', 'Страна города') }} <span class="required">*</span>
			  		</div>
			  		<div class="col-md-8"> 

			  			@if($country->count() > 0) 
			  			<select required id="country_id" class="form-control country" name="country_id" id=""> 
			  				<option selected disabled value="">Страна</option>
			  				@foreach($country as $country_row)
			  				<option value="{{ $country_row->id }}">{{ $country_row->title }}</option>
			  				@endforeach 
			  			</select>    
			  			@endif  
 
			  		</div>
			  	</div> 
			</div>
			  {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!}  
@endsection 