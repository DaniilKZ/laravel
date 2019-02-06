<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destination = DB::table('destinations')->get();  

        return view('admin.pages.index')->withDestination($destination); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.createdestination');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $destination = new Destination(); 

        $destination->title = $request->title;   
        $destination->code = $request->code;   

        $destination->save();

        $request->session()->flash('success', 'Успешно добавлено!'); 
 
        return redirect()->route('destination.show', $destination->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    // public function show($id)  
     public function show( $id)
    {
        $destination = Destination::find($id); 
        return view('admin.pages.destinationshow')->withDestination($destination);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id); 
        return view('admin.pages.editdestination')->withDestination($destination);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
/*    public function update(Request $request,$id)
    {
        $destination = Destination::find($id);
 
        $destination->title = $request->title;   
        $destination->code = $request->code;   

        $destination->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('destination.show', $destination->$id);
    }*/


    public function update(Request $request, $id)
    {
        $destination = Destination::find($id); 

        $destination->title = $request->title;   
        $destination->code = $request->code;   


        $destination->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('destination.show', $destination->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        $destination = Destination::find($id);

        $destination->delete();

        return redirect()->route('destination.index');
  
    }
}
