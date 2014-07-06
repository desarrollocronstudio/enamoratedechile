<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/featured', 'FeaturedController@index');
Route::get('/my_route', 'RoutesController@my_route');
Route::get('/ideal_route', 'IdealRouteController@index');
Route::get('/jenny', 'JennyController@index');
Route::get('/ver/{id}', 'TipController@view');
Route::get('/submit-tip', 'TipController@post');
Route::get('/search-tips', 'TipController@search');


Route::post("/cities-autocomplete","CityController@autocomplete");