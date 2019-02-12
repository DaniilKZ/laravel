<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    	<meta name="_token" content="{{ csrf_token() }}">
		<meta name="csrf-token" content="{{ csrf_token() }}"> 


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Travel - Тестовое задание</title>
 
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-switch.css')}}" rel="stylesheet">  

   
  <link rel="shortcut icon" href="{{asset('img/globe.png')}}" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">  
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 

    </head>
<body>


<form class="form">  
    <div class="input-group col-md-2 com-sm-2 col-lg-2 col-xs-12"> 
        @if($city->count() > 0)  
            <select required class="city form-control" name="city" id="city"> 
                <option selected disabled value="">Город вылета</option>
                @foreach($city as $city_row)
                    <option value="1">{{ $city_row->from_where_title }}</option>
                @endforeach 
            </select>    
        @endif
    </div> 
    <div class="input-group col-md-2 com-sm-2 col-lg-2 col-xs-12">  
        <select required id="country" class="form-control country" name="country" id="country"> 
          <option selected disabled value="">Страна</option>  
        </select>     
    </div> 
    <div class="input-group col-md-2 com-sm-2 col-lg-2 col-xs-12"> 
        <input id="departuredate" name="departuredate " value="2018-01-01" type="text" class="form-control" placeholder="дата вылета">
    </div> 
    <div class="input-group col-md-2 com-sm-2 col-lg-2 col-xs-12"> 
        <input id="numberofnights"  name="numberofnights" value="5" min="5" max="15" type="number"   class="form-control" placeholder="Кол-во ночей">
    </div>
    <div class="input-group col-md-2 com-sm-2 col-lg-2 col-xs-12"> 
        <input id="seacrh" type="submit" class="form-control" value="Найти">
    </div>
</form> 

<div class="block__table">
    <table class="table table-bordered table-hover"> 
        <thead>
            <tr>
                <th>№</th>
                <th>Отель</th>
                <th>Стоимость</th> 
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
        <div class="spinner" style="display: none;">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
        </div>
</div>

 

<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>  
<script data-require="MomentJS@2.10.0" data-semver="2.10.0" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ru.js" charset="UTF-8"></script>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today =yyyy  + '-' +mm  + '-' + dd; 
 
$("#departuredate").attr("placeholder",today);
 
 $('#departuredate').datepicker({
    format: 'yyyy-dd-mm', 
});

 
    $('.city').on('change',function(e){ 
        e.preventDefault();
        $select_city = $(".city option:selected").text(); 
        if ( $select_city != '' ) {
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('changecity')}}',
                    dataType: 'json',
                    data:{ 'select_city':$select_city },
                    success:function(data){    
                            $('.country option').remove()
                        $.each(data, function(key, result_data) {  
                             $('.country').append($("<option></option>").attr("value", result_data.id).text(result_data.where_title));  
                        });  
                    }    
                });
        }
    });
         
	$('input#seacrh').on('click',function(e){ 
		e.preventDefault();

                $country_id= $(document).find("#country option:selected").val();
                $city_id = $(document).find("#city option:selected").val();
                $departuredate = $(document).find("#departuredate").val();
                $numberofnights = $(document).find("#numberofnights").val(); 
		 
        if ($numberofnights != '' || $departuredate !='' || $city_id != '' || $country_id !='') {
        		$.ajax({ 
        			url: '{{URL::to('search')}}', 
                    dataType: 'json',
        			data:{ 'numberofnights':$numberofnights,'departuredate':$departuredate ,'city_id':$city_id,'country_id':$country_id },

        			success:function(data){ 
                    console.log(data); 
                       if (data.error != null  && data.error != "") {
                            alert(data.error);
                            return;
                       }
                            var array = data.response;  
                            var array_size = array.length;  
                            var hotel = "", currency = "", price = "";  
                            var html = ""; 

                            for (var i = 0;  i <= array_size-1; ) { 
                                    inc = i + 1;

                                    if(typeof array[i].hotelName != "undefined"){ 
                                        hotel = array[i].hotelName; 
                                    }else if(typeof array[i].hotel != "undefined"){ 
                                        hotel = array[i].hotel; 
                                    }

                                    if(typeof array[i].price != "undefined"){ 
                                        price = array[i].price; 
                                    }else if(typeof array[i].tourPrice != "undefined"){ 
                                        price = array[i].tourPrice; 
                                    }
 

                                html += "<tr>"; 
                                html += "<td>" + inc +"</td>";
                                html += "<td>" + hotel +"</td>";
                                html += "<td>" + price + array[i].currency +"</td>"; 
                                html += "</tr>";
                                i++;

                            }

                            if ($("table tbody").length > 0) {
                                var offset_top = $("table tbody").offset();
                                var body = $("html, body");
                                body.stop().animate({scrollTop: offset_top.top-parseInt(500)}, 500, 'swing', function() {  
                                }); 

                                $("table tbody").html(html); 
                            }  
        			},
                    beforeSend: function(){
                        $(".spinner").show();
                    },
                    complete: function(){
                        $(".spinner").hide();
                    }  
                    
        		}); 
            }
	});
		 
		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }); 
</script> 
</body> 
</html>