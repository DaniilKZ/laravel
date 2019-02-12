@extends('admin.admin-index')

@section('title', 'Добавить напровление')

@section('content') 

<h3>Направление:</h3> <br/><br/>
	{!! Form::open(['route' => 'directions.store', 'class' => 'col-md-12']) !!}
	<div class="row">
		<div class="col-md-10"> 
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('from_where_title', 'От куда') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('from_where_title', null, ['class' => 'form-control', 'id' => 'from_where_title__title']) }} 
			  		</div>
			  	</div> 
			</div>
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('where_title', 'Куда') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('where_title', null, ['class' => 'form-control', 'id' => 'where_title__title']) }} 
			  		</div>
			  	</div> 
			</div>
			  {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!}  
@endsection 