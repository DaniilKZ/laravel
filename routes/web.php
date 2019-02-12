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
 

Route::resource('admin-panel/country', 'CountryController'); 

Route::resource('admin-panel/city', 'CityController'); 

Route::get('/changecity','CityController@changecity');

Route::resource('admin-panel/directions', 'DirectionsController'); 

Route::resource('/', 'PageHome');  //Главная страница сайта
Route::resource('admin-panel', 'DashboardController');
