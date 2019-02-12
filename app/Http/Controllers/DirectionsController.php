<?php

namespace App\Http\Controllers;

use App\Directions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectionsController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = DB::table('directions')->get();  
        return view('admin.pages.index')->withDirections($directions); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.createdirections');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $directions = new directions(); 

        $directions->from_where_title = $request->from_where_title;  
        $directions->where_title = $request->where_title;  

        $directions->save();

        $request->session()->flash('success', 'Успешно добавлено!'); 
 
        return redirect()->route('directions.show', $directions->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Directions  $directions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $directions = Directions::find($id); 
        return view('admin.pages.showdirections')->withDirections($directions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Directions  $directions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directions = Directions::find($id); 
        return view('admin.pages.editdirections')->withDirections($directions); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Directions  $directions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directions $directions)
    {        
        $directions = Directions::find($id);
 
        $directions->from_where_title = $request->from_where_title;  
        $directions->where_title = $request->where_title;     

        $directions->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('directions.show', $directions->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Directions  $directions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directions $directions)
    {
        $directions = Directions::find($id);

        $directions->delete();
 
        return redirect()->route('directions.index');
    }
}
