@extends('admin.admin-index')

@section('title', 'Редактировать город')

@section('content')  	
 
	{{ Form::model($city, array('route' => array('city.update', $city->id),  'class' => 'col-md-12' , 'method' => 'PUT')) }}
	<div class="row">
		<div class="col-md-12"> 
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('title', 'Название города') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('title', null , ['class' => 'form-control', 'id' => 'city__title']) }} 
			  		</div>
			  	</div>   
			  	<div class="row"> 
			  		<div class="col-md-2">
			  			{{ Form::label('country_city', 'Страна города') }} 
			  		</div>
			  		<div class="col-md-8"> 

			  			@if($country->count() > 0)
			  			<select required id="country_id" class="form-control country" name="country_id" id=""> 
			  				<option selected disabled value="">Страна</option>
			  				@foreach($country as $country_row) 
				  					@if((int)$country_row->id == (int)$city->country_id) 
				  						<option selected value="{{ $country_row->id }}">{{ $country_row->title }}</option>
				  					@else 
				  						<option value="{{ $country_row->id }}">{{ $country_row->title }}</option>
				  					@endif   
			  				@endforeach 
			  			</select>    
			  			@endif  
 
			  		</div>
			  	</div>  
			  {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!} 

@endsection