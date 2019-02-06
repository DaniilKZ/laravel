<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SearchController extends Controller{
	public function index(){
		return view('home');
	}

	public function search(Request $request){
		if($request->ajax()){
			$response = "NULL Response";   
				 

				$curl = curl_init();
 
 				$origin = $request->input('origin'); 
 				$destination = $request->input('destination'); 

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.travelpayouts.com/v1/prices/cheap?origin=".$origin."&destination=".$destination,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				    "x-access-token: 321d6a221f8926b5ec41ae89a3b2ae7b"
				  ),
				)); 

				$response = curl_exec($curl);
				$err = curl_error($curl); 
				curl_close($curl);

				if ($err) {
				  $response =  "cURL Error #:" . $err;
				} else {
				  $response = $response;
				} 
 
			return Response( $response ); 
		}
	}
}