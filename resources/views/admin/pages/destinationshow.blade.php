@extends('admin.admin-index')

@section('title', 'Просмотр')


@section('content')

	<p class="col-md-12">Название: <strong>{{ $destination->title }}</strong></p>
	<p class="col-md-12">Код: <strong>{{ $destination->code }}</strong></p>

	<a href="{{ URL::to('/admin-panel/destination/' . $destination->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  

	{!! Form::open(['method'=> 'DELETE', 'route'=>['destination.destroy', $destination->id]]) !!}
		{!! Form::submit('Удалить', ['class' => 'btn btn-warning']) !!}
	{!! Form::close() !!} 

@endsection