<?php

namespace App\Http\Controllers;

use App\origin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $origin = DB::table('origins')->get(); 

        return view('admin.pages.index')->withOrigin($origin); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.createorigin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $origin = new Origin(); 

        $origin->title = $request->title;   
        $origin->code = $request->code;   

        $origin->save();

        $request->session()->flash('success', 'Успешно добавлено!'); 
 
        return redirect()->route('origin.show', $origin->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $origin = origin::find($id); 
        return view('admin.pages.originshow')->withOrigin($origin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {   
        $origin = Origin::find($id); 
        return view('admin.pages.editorigin')->withOrigin($origin);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $origin = Origin::find($id);
 
        $origin->title = $request->title;   
        $origin->code = $request->code;   

        $origin->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('origin.show', $origin->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {          
        $origin = Origin::find($id);

        $origin->delete();
 
        return redirect()->route('origin.index');
    }
}
