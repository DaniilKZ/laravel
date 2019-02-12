@extends('admin.admin-index')

@section('title', 'Просмотр')


@section('content')

	<p class="col-md-12">Название: <strong>{{ $city->title }}</strong></p> 
	<p class="col-md-12">Страна города: 
		<strong> @if($country->count() > 0)
			  			  @foreach($country as $country_row) 
			  			  		@if((int)$country_row->id == (int)$city->country_id) 
				  					{{ $country_row->title }} 
				  				@endif  
			  				@endforeach  
			  	@endif
		</strong>
	</p> 
 
	<a href="{{ URL::to('/admin-panel/city/' . $city->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  

	{!! Form::open(['method'=> 'DELETE', 'route'=>['city.destroy', $city->id]]) !!}
		{!! Form::submit('Удалить', ['class' => 'btn btn-warning']) !!}
	{!! Form::close() !!} 

@endsection