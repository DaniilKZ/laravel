@extends('admin.admin-index')

@section('title', 'Просмотр')


@section('content')

	<p class="col-md-12">От куда: <strong>{{ $directions->from_where_title }}</strong> - Куда: <strong>{{ $directions->where_title }}</strong></p> 

	<a href="{{ URL::to('/admin-panel/directions/' . $directions->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  

	{!! Form::open(['method'=> 'DELETE', 'route'=>['directions.destroy', $directions->id]]) !!}
		{!! Form::submit('Удалить', ['class' => 'btn btn-warning']) !!}
	{!! Form::close() !!} 

@endsection