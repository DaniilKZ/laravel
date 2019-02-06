@extends('admin.admin-index')

@section('title', 'Все города')

@section('content')

@if(isset($destination))
<p>Куда:</p>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Город</th>
        <th>Код</th>
        <th>Действие</th>
      </tr>
    </thead>
    <tbody>
      
        		@foreach($destination as $destination_row)
        		 <tr>
        			 	<td>{{ $destination_row->id }}</td>   
        			 	<td>{{ $destination_row->title }}</td>   
        			 	<td>{{ $destination_row->code }}</td>  
        			 	<td>
        				<a href="{{ URL::to('/admin-panel/destination/' . $destination_row->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  </td>   
        		 </tr>
        		@endforeach 
    
    </tbody>
  </table>
@endif     

@if(isset($origin))
<p>От куда:</p>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Город</th>
        <th>Код</th>
        <th>Действие</th>
      </tr>
    </thead>
    <tbody>
     
		@foreach($origin as $origin_row)
		 <tr>
			 	<td>{{ $origin_row->id }}</td>   
			 	<td>{{ $origin_row->title }}</td>   
			 	<td>{{ $origin_row->code }}</td>  
			 	<td>
				<a href="{{ URL::to('/admin-panel/origin/' . $origin_row->id . '/edit') }}" class="btn btn-default">Редактироовать</a>  </td>   
		 </tr>
		@endforeach 
    </tbody>
  </table>
@endif     

@endsection