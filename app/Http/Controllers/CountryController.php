<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = DB::table('countries')->get();  
        return view('admin.pages.index')->withcountry($country); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.createcountry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new country(); 

        $country->title = $request->title;  

        $country->save();

        $request->session()->flash('success', 'Успешно добавлено!'); 
 
        return redirect()->route('country.show', $country->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $country = country::find($id); 
        return view('admin.pages.showcountry')->withcountry($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = country::find($id); 
        return view('admin.pages.editcountry')->withcountry($country); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {        
        $country = country::find($id);
 
        $country->title = $request->title;    

        $country->save();

        $request->session()->flash('success', 'Успешно обновлена!'); 

        return redirect()->route('country.show', $country->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country = country::find($id);

        $country->delete();
 
        return redirect()->route('country.index');
    }
}
