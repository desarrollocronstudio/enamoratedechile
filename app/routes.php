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

Route::get('/', array("as" => "home", "uses" => 'HomeController@index'));
Route::get('/featured', 'TipController@featured');
Route::get('/my_route', 'RouteController@my_route');
Route::get('/ideal_route', 'RouteController@ideal');
Route::get('/jenny', 'JennyController@index');
Route::get('/ver/{id}', 'TipController@view');
Route::get('/search-tips', 'TipController@search');
Route::get("/partials/{name}","PartialController@show");

/***********************
AUTH
***********************/
Route::get("/signup",array("as" =>"signup","uses" => 'UserController@signup'));
Route::post("/signup",array("as" =>"save-signup","uses" => 'UserController@save_signup'));
Route::get("/logout",array("as" => "logout","uses" => "UserController@logout"));
Route::get("/login",array("as" => "login","uses" => "UserController@show_login"));
Route::post("/login",array("as" => "do-login","uses" => "UserController@login"));


Route::get('/submit-tip', 'TipController@post');
Route::post('/submit-tip', 'TipController@save');
Route::post("/tips/add-to-my-route","TipController@add_to_my_route");



Route::get("/create-seeds",function(){
	Iseed::generateSeed('cities');
	Iseed::generateSeed('provinces');
	Iseed::generateSeed('regions');
	Iseed::generateSeed('tips_categories');
	return "OK";
});


Route::post("/cities-autocomplete","CityController@autocomplete");