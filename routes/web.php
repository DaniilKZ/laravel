<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/search','SearchController@search');
Route::get('/','SearchController@index'); 

Route::resource('admin-panel/origin', 'OriginController'); 
 
Route::resource('admin-panel/destination', 'DestinationController'); 

Route::resource('/', 'PageHome');  
Route::resource('admin-panel', 'DashCity');
