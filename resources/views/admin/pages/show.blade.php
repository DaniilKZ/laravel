@extends('admin.admin-index')

@section('title', 'Просмотр')


@section('content')

	<p class="col-md-12">Название: <strong>{{ $origin->title }}</strong></p>
	<p class="col-md-12">Код: <strong>{{ $origin->code }}</strong></p>

	<a href="{{ URL::to('/admin-panel/origin/' . $origin->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  

	{!! Form::open(['method'=> 'DELETE', 'route'=>['origin.destroy', $origin->id]]) !!}
		{!! Form::submit('Удалить', ['class' => 'btn btn-warning']) !!}
	{!! Form::close() !!} 

@endsection