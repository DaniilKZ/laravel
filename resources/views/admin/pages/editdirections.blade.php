@extends('admin.admin-index')

@section('title', 'Редактировать направления')

@section('content')  	
 
	{{ Form::model($directions, array('route' => array('directions.update', $directions->id),  'class' => 'col-md-12' , 'method' => 'PUT')) }}
	<div class="row">
		<div class="col-md-12"> 
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('from_where_title', 'От куда') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('from_where_title', null , ['class' => 'form-control', 'id' => 'from_where_title']) }} 
			  		</div>
			  	</div>   
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('where_title', 'Куда') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('where_title', null , ['class' => 'form-control', 'id' => 'where_title']) }} 
			  		</div>
			  	</div>    
			  {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!} 

@endsection  