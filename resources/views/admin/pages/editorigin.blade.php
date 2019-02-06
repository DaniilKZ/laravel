@extends('admin.admin-index')

@section('title', 'Редактировать город')

@section('content')  	
 
	{{ Form::model($origin, array('route' => array('origin.update', $origin->id),  'class' => 'col-md-12' , 'method' => 'PUT')) }}
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
			  			{{ Form::label('code', 'Код города IATA') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('code', null , ['class' => 'form-control', 'id' => 'city__code']) }}  
			  		</div>
			  	</div>  
			</div>
			  {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!} 

@endsection