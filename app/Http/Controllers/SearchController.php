<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

class SearchController extends Controller{
	public function index(){
		return view('home');
	}

	public function search(Request $request){
		$response = null; 
		$err = null; 

		$validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'city_id' => 'required',
            'departuredate' => 'required',
            'numberofnights' => 'required|numeric|min:5|max:15', 
        ]);

        if ($validator->fails()) {
        	$err = "Ошибка, не все поля заполнены корректно!";  
        }else{  
			if($request->ajax()){ 
					$curl = curl_init(); 

	 				$country_id= $request->input('country_id'); 
	 				$city_id = $request->input('city_id'); 
	 				$departuredate = $request->input('departuredate'); 
	 				$numberofnights = $request->input('numberofnights');  
	 
	 					curl_setopt_array($curl, array( 
	 						CURLOPT_URL => "https://poedem.kz/test/search/partner1?departCity=".$city_id."&country=".$country_id."&date=".$departuredate."&nights=".$numberofnights,
	 						CURLOPT_RETURNTRANSFER => true,
	 						CURLOPT_ENCODING => "",
	 						CURLOPT_MAXREDIRS => 10,
	 						CURLOPT_TIMEOUT => 30,
	 						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	 						CURLOPT_CUSTOMREQUEST => "GET"
	 					)); 

	 					$json = json_decode(curl_exec($curl), true);  
	 					$result_json = $json['tours'];

	 					$err = curl_error($curl); 
	 					curl_close($curl); 

	 					/* 2 Partner */
	 					$url = "https://poedem.kz/test/search/partner2"; 
	 					$post_data = "cityId=".$city_id."&countryId=".$country_id."&dateFrom=".$departuredate."&nights=".$numberofnights; 
	 					$ch = curl_init($url);
 
	 					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
	 					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	 					curl_setopt($ch, CURLOPT_POST, 1);
	 					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:  application/x-www-form-urlencoded'));
	 					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	 					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	 					$response = curl_exec($ch);  
	 					curl_close($ch);

	 					$xml = simplexml_load_string($response);
	 					$json = json_encode($xml);
	 					$json_xml = json_decode($json, TRUE);

	 					$array_xml = $json_xml['tours']['item']; 

	 					$result_all = array_merge($array_xml, $result_json);

	 					if ($err) {
	 						$err =  "cURL Error #:" . $err;
	 					} else {
	 						$response = $result_all;
	 					}  
			}else{ 
					$err = "Не верный завпрос!";
			} 
        }        

			return Response( json_encode( array('response' => $response, 'error' => $err) ) );  
	}
}