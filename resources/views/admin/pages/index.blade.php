@extends('admin.admin-index')

@section('title', 'Просмотр')

@section('content')

@if(isset($directions))
<p><strong>Направления:</strong></p>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>От куда</th> 
        <th>Куда</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      
                @foreach($directions as $directions_row)
                 <tr>
                        <td>{{ $directions_row->id }}</td>   
                        <td>{{ $directions_row->from_where_title }}</td>   
                        <td>{{ $directions_row->where_title }}</td>    
                        <td><a href="{{ URL::to('/admin-panel/directions/' . $directions_row->id . '/edit') }}" class="btn btn-default">Редактироовать</a> </td>   
                 </tr>
                @endforeach 
    
    </tbody>
  </table>
@endif  

@if(isset($city))
<p><strong>Город:</strong></p>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Город</th> 
        <th>Страна</th>
        <th>Действие</th>
      </tr>
    </thead>
    <tbody>
      
                @foreach($city as $city_row)
                 <tr>
                        <td>{{ $city_row->id }}</td>   
                        <td>{{ $city_row->title }}</td>    
                        <td>{{ $city_row->country }}</td>    
                        <td><a href="{{ URL::to('/admin-panel/city/' . $city_row->id . '/edit') }}" class="btn btn-default">Редактироовать</a></td>   
                 </tr>
                @endforeach 
    
    </tbody>
  </table>
@endif  

@if(isset($country))
<p><strong>Страна:</strong></p>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Город</th> 
        <th>Действие</th>
      </tr>
    </thead>
    <tbody>
      
                @foreach($country as $country_row)
                 <tr>
                        <td>{{ $country_row->id }}</td>   
                        <td>{{ $country_row->title }}</td>    
                        <td><a href="{{ URL::to('/admin-panel/country/' . $country_row->id . '/edit') }}" class="btn btn-default">Редактироовать</a></td>   
                 </tr>
                @endforeach 
    
    </tbody>
  </table>
@endif  
  
@endsection