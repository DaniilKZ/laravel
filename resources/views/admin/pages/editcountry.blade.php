@extends('admin.admin-index')

@section('title', 'Редактировать город')

@section('content')  	
 
	{{ Form::model($country, array('route' => array('country.update', $country->id),  'class' => 'col-md-12' , 'method' => 'PUT')) }}
	<div class="row">
		<div class="col-md-12"> 
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('title', 'Название города') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('title', null , ['class' => 'form-control', 'id' => 'country__title']) }} 
			  		</div>
			  	</div>   
			  {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!} 

@endsection