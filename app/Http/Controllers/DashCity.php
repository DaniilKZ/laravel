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


        // $city = City::orderby('created_at', 'asc')->paginate(10);

        // $city = City::find($id);

        // return view('admin.pages.index')->withCity($city); 
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

        // $origin = new Origin(); 

        // $origin->origin_title = $request->title;   
        // $origin->origin_code = $request->code;   

        // $origin->save();

        // $request->session()->flash('success', 'Успешно добавлено!'); 
 
        // return redirect()->route('admin-panel.show', $origin->id);
        // $city = new City();

        // $city->destination_title = $request->destination_title;   
        // $city->destination_code = $request->destination_code; 

        // $city->origin_title = $request->origin_title;   
        // $city->origin_code = $request->origin_code;   

        // $city->save();

        // $request->session()->flash('success', 'Успешно добавлено!'); 
 
        // return redirect()->route('admin-panel.show', $city->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city, $id)
    {
        // $origin = Origin::find($id);
        
        // $origin = Origin::find($id);
        // $city = City::find($id);

        // $origin = DB::table('origins')->get(); 
        // $destination = DB::table('destinations')->get(); 
        // $origin = DB::table('origins')->get(); 


        // return view('admin.pages.index', ['destination'=> $destination, 'origin' => $origin] );
        
        // $city = City::orderby('created_at', 'asc')->paginate(10);

        // return view('admin.pages.show')->withOrigin($origin);
        // return view('admin.pages.index')->withOrigin($city);
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
