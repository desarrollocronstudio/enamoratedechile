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
Route::get('/featured', 'TipController@featured');
Route::get('/my_route', 'RouteController@my_route');
Route::get('/ideal_route', 'RouteController@ideal');
Route::get('/jenny', 'JennyController@index');
Route::get('/ver/{id}', 'TipController@view');
Route::get('/search-tips', 'TipController@search');

Route::get('/submit-tip', 'TipController@post');
Route::post('/submit-tip', 'TipController@save');


Route::post("/cities-autocomplete","CityController@autocomplete");