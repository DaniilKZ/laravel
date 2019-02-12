@extends('admin.admin-index')

@section('title', 'Добавить страну')

@section('content') 
	{!! Form::open(['route' => 'country.store', 'class' => 'col-md-12']) !!}
	<div class="row">
		<div class="col-md-10"> 
			<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			{{ Form::label('title', 'Название страны') }}
			  		</div>
			  		<div class="col-md-8"> 
			  			{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'country__title']) }} 
			  		</div>
			  	</div>   
			</div>
			  {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }} 
		</div>  
	</div>  
	{!! Form::close() !!}  
@endsection 