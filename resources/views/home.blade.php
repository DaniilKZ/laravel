<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    	<meta name="_token" content="{{ csrf_token() }}">
		<meta name="csrf-token" content="{{ csrf_token() }}"> 

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
	  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Treval</title> 
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> 
        <!-- <link rel="stylesheet" href="https://poedem.kz/css/dist/style.css"> -->

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    </head>
    <body>
         

<div class="short-search">
    <div class="short-search_wrapper"> 
        <div class="short-search_header gilroy-bold">
            <p class="fake-header">Поиск туров с вылетом из</p>
            <div class="dropdown header_city-select" data-value="1">
                <button type="button" data-toggle="dropdown">Алматы<span class="caret"></span></button>
               
            </div>
            <h1 class="gilroy-light">Турфирма Алматы, Астаны, Актобе, сайт турагенства "Поедем!"</h1>
        </div>
                <div class="short-search_body noselect">
            <div class="body_form">
                <div class="form_direction form_dropdown tooltip-error">
                    <div class="form-title">    
                        @if($destination->count() > 0)  
                        <p>От куда:</p>  
                            <select class="destination" name="destination" id=""> 
                                    <option selected disabled value="">Город</option>
                                @foreach($destination as $destination_row)
                                    <option value="{{ $destination_row->code }}">{{ $destination_row->title }}</option>
                                @endforeach 
                            </select>    
                        @endif     
                    </div>
                    <div class="form-title"> 
                        @if($origin->count() > 0)
                        <p>Куда:</p>
                            <select class="origin" name="origin" id=""> 
                                    <option selected disabled value="">Город</option>
                                @foreach($origin as $origin_row)
                                    <option value="{{ $origin_row->code }}">{{ $origin_row->title }}</option>
                                @endforeach 
                            </select>    
                        @endif      
                    </div>
                    <div class="direction_dropdown form_dropdown_menu">  
						
                    </div>
                </div>
                <div class="form_date form_dropdown tooltip-error">
                    <div class="form-title">
                        <span class="date_field">29.01 ± 3 дня</span>
                    </div>
                    <div class="date_dropdown form_dropdown_menu">
                        <div class="calendar">
                            <div class="controls">
<button type="button" class="left noselect"><img src="/img/svg/arrow-left.svg"></button>
<button type="button" class="right noselect"><img src="/img/svg/arrow-right.svg">
                                </button>
                            </div>
                            <div class="wrapper">
                                <div class="months">
                                	
                                </div>
                            </div>
                        </div>
                        <div class="days">
                            <div class="checkbox full-filling_checkbox">
                                <input type="checkbox" checked="">
                                <label><span></span>3 дня</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_duration form_dropdown tooltip-error">
                    <div class="form-title">
                        <span class="duration_field">на 8-10 дней</span>
                    </div>
                    <div class="duration_dropdown form_dropdown_menu">
                        <div class="days nr-wrapper"><div class="nr-item" data-value="7"><span>7</span></div><div class="nr-item nr-item-left nr-item-bound" data-value="8"><span>8</span></div><div class="nr-item nr-item-selected" data-value="9"><span>9</span></div><div class="nr-item nr-item-right nr-item-bound" data-value="10"><span>10</span></div><div class="nr-item" data-value="11"><span>11</span></div><div class="nr-item" data-value="12"><span>12</span></div><div class="nr-item" data-value="13"><span>13</span></div><div class="nr-item" data-value="14"><span>14</span></div><div class="nr-item" data-value="15"><span>15</span></div><div class="nr-item" data-value="16"><span>16</span></div></div>
                        <div class="info">
                            <img src="/img/svg/info-round.svg">
                            <p>Выбраны даты <b>29.01 ± 3 дня</b><br>на 8-10 дней</p>
                        </div>
                    </div>
                </div>
                <div class="form_stars form_dropdown">
                    <div class="form-title">
                        <span class="stars_field">любое</span>
                    </div>
                    <div class="stars_dropdown form_dropdown_menu">
                        <div class="form-dropdown_item" data-value="5">5 звезд</div>
                        <div class="form-dropdown_item" data-value="4">4 звезды</div>
                        <div class="form-dropdown_item" data-value="3">3 звезды</div>
                        <div class="form-dropdown_item" data-value="2">2 звезды</div>
                        <div class="form-dropdown_item" data-value="1">1 звезда</div>
                        <div class="form-dropdown_item form-dropdown_item__selected" data-value="0">любое</div>
                    </div>
                </div>
                <div class="form_tourists form_dropdown tooltip-error">
                    <div class="form-title">
                        <span class="tourists_field">2 взр</span>
                    </div>
                    <div class="tourists_dropdown form_dropdown_menu">
                        <div class="counter adults-count">
                            <label>Взрослые: </label>
                            <button type="button" class="prev"></button>
                            <span>2</span>
                            <button type="button" class="next"></button>
                        </div>
                        <div class="counter children-count">
                            <label>Дети: </label>
                            <button type="button" class="prev disable"></button>
                            <span>0</span>
                            <button type="button" class="next"></button>
                        </div>
                        <div class="child ages hidden">
                            <label>Возраст детей:</label>
                            <input type="text" class="hidden" placeholder="-">
                            <input type="text" class="hidden" placeholder="-">
                        </div>
                    </div>
                </div>
                <div class="form_search">
                    <form action="/findtours">
                        <input type="hidden" id="wsf-city" name="departCity" value="1">
                        <input type="hidden" id="wsf-country" name="country" value="">
                        <input type="hidden" id="wsf-region" name="region" value="">
                        <input type="hidden" id="wsf-hotel" name="hotel" value="">
                        <input type="hidden" id="wsf-date-from" name="dateFrom" value="26.01.2019">
                        <input type="hidden" id="wsf-date-to" name="dateTo" value="01.02.2019">
                        <input type="hidden" id="wsf-nights-from" name="nightsFrom" value="7">
                        <input type="hidden" id="wsf-nights-to" name="nightsTo" value="9">
                        <input type="hidden" id="wsf-adults" name="adult" value="2">
                        <input type="hidden" id="wsf-children" name="child" value="0">
                        <input type="hidden" id="wsf-ages" name="ages" value="">
                        <input type="hidden" id="wsf-stars" name="stars" value="any">
                        <input type="hidden" id="wsf-search" name="search" value="1">
                        <button type="submit" class="">Найти туры</button>
                    </form>
                </div>            </div>
            <div class="body_form"></div>
        </div>
        <div class="short-search_footer gilroy-light">
            <p>по ценам туроператоров с круглосуточной<br> поддержкой до и после покупки</p>
        </div>
    </div>
</div>     

<div class="block__table">
	<table class="table table-bordered table-hover"> 
		<thead>
			<tr>
				<th>Стоимость</th>
				<th>Номер полета</th>
				<th>Авиакомпания</th>
				<th>Выезд в</th>
				<th>Возвращение в</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>


	<script type="text/javascript"> 
	$('button[type="submit"]').on('click',function(e){ 
		e.preventDefault();

		$origin = $(".origin option:selected").val();
		$destination = $(".destination option:selected").val();
		 
        if ($destination != '' || $origin !='') {
        		$.ajax({
        			type: 'get',
        			url: '{{URL::to('search')}}',
        			dataType: 'json',
        			data:{ 'origin':$origin,'destination':$destination },

        			success:function(data){  
                        if (data.error == "" || data.error == null ) {
                            var array = data.data[Object.keys(data.data)];
                            var array_size = Object.keys(array).length;
                            var html = ""; 
                            
                            for (var i = 0;  i <= array_size-1; ) { 
                                html += "<tr>"; 
                                html += "<td>" + array[i].price +".руб</td>";
                                html += "<td>" + array[i].flight_number +"</td>";
                                html += "<td>" + array[i].airline +"</td>";
                                html += "<td>" + array[i].departure_at +" </td>";
                                html += "<td>" + array[i].return_at  +"</td>";
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

                        }else{
                            alert("Ошибка! " + data.error );
                        }
        			} 
        		});
        }
	});
		 
		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }); 
	  
	</script> 

	<style type="text/css">
	.short-search {
	    height: 100%;
	    background: url(http://lookw.ru/1/573/1402260849-oboi-1920h1080.-zaoblachnaya-dal-19.jpg);
	    background-repeat: no-repeat;
	    background-size: cover;
	    margin: 0;
	    padding: 0;
	}
	html, body{
	    margin:0;
	    padding: 0;
	}
	.block__table {
	    height: 100%;
	    margin: 0 10%;
	}
    .short-search .short-search_wrapper .short-search_body .body_form .form_direction .form-title:before{
        display: none;
    }
select.destination,select.origin {
    min-height: 40px;
    border: none;
    width: 100%;
    display: table;
}
.form-title p {
    width: 100%;
    display: table;
    margin: 0 0 0 5px;
}

.form_direction.form_dropdown.tooltip-error {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    width: auto;
}
.form_direction.form_dropdown.tooltip-error .form-title {
    display: flex !important;
    flex-wrap: wrap;
    align-items: center !important;
    min-width: unset !important;
    width: 50%;
}

	</style>
	 


</body> 
</html>