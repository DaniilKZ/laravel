<?php

namespace App\Http\Controllers;

use App\City; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashCity extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $destination = DB::table('destinations')->get(); 
        $origin = DB::table('origins')->get(); 

        return view('admin.pages.index', ['destination'=> $destination, 'origin' => $origin] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view('admin.pages.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, $id)
    {
        $city = City::find($id); 
        return view('admin.pages.edit')->withCity($city);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city, $id)
    {
        $city = City::find($id); 

        $city->origin_title = $request->origin_title;   
        $city->origin_code = $request->origin_code;   


        $city->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('admin-panel.show', $city->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city, $id)
    {
       
        $city = City::find($id);

        $city->delete();

        return view('admin.pages.index');
  
    }
}
