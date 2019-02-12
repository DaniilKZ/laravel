<?php

namespace App\Http\Controllers;

use Validator;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = DB::table('cities')->get(); 
        return view('admin.pages.index')->withcity($city); 
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {         
        $country = DB::table('countries')->get();  

        return view('admin.pages.createcity', ['country' => $country] );
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'country_id' => 'required'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('city_empty_field', 'Ошибка, не все поля заполнены!');

            return redirect('/admin-panel/city/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            $city = new City(); 

            $city->title = $request->title;  
            $city->country_id = $request->country_id;  

            $city->save();

            $request->session()->flash('success', 'Успешно добавлено!'); 

            
        return redirect()->route('city.show', $city->id);

        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);  
        $country = DB::table('countries')->get(); 
        
        return view('admin.pages.showcity')->with(['country' => $country, 'city' => $city] );
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    { 
        $city = City::find($id); 

        $country = DB::table('countries')->get();  

        return view('admin.pages.editcity', ['country' => $country, 'city' => $city] );

        // return view('admin.pages.editcity')->withcity($city); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
 
        $city->title = $request->title;  
        $city->country_id = $request->country_id;   

        $city->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('city.show', $city->id);
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->route('city.index');
    }

    public function changecity(Request $request)
    {
        if($request->ajax()){
            
            $result = "NULL Response";    
         
            $select_city = $request->input('select_city');  

            $result =  DB::table('directions')->where('from_where_title', 'like', "".$select_city."%")->get();

            return Response( json_encode($result) ); 
        }
    }
}
