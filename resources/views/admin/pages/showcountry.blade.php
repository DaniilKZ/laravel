@extends('admin.admin-index')

@section('title', 'Просмотр')


@section('content')

	<p class="col-md-12">Название: <strong>{{ $country->title }}</strong></p>
	<p class="col-md-12">Код: <strong>{{ $country->code }}</strong></p>

	<a href="{{ URL::to('/admin-panel/country/' . $country->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  

	{!! Form::open(['method'=> 'DELETE', 'route'=>['country.destroy', $country->id]]) !!}
		{!! Form::submit('Удалить', ['class' => 'btn btn-warning']) !!}
	{!! Form::close() !!} 

@endsection