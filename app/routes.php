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
Route::get('/', [
	"as" => "home", 
	"uses" => 'HomeController@index'
]);
Route::get('/search-tips', 'TipController@search');
Route::get("/partials/{name}","PartialController@show");

/***********************
MY ROUTE
***********************/
Route::get('/my_route', [
	'as' 	=> 'my_route',
	'uses'	=> 'RouteController@my_route']);
Route::any("/tips/add-to-my-route/{id}",[
	'as'	=> 'add_to_route',
	'uses'	=> 'RouteController@add_to_my_route']);

/***********************
AUTH
***********************/
Route::get("/signup",array("as" =>"signup","uses" => 'UserController@signup'));
Route::post("/signup",array("as" =>"save-signup","uses" => 'UserController@save_signup'));
Route::get("/logout",array("as" => "logout","uses" => "UserController@logout"));
Route::get("/login",array("as" => "login","uses" => "UserController@show_login"));
Route::post("/login",array("as" => "do-login","uses" => "UserController@login"));
Route::get("/login/check-login",[
	'as' 	=> 'check-login',
	'uses'	=> 'UserController@check'
]);
 Route::controller('password', 'RemindersController');
Route::post("/forgot",[
	'as'	=> 'forgot',
	'uses'	=> 'RemindersController@postRemind'
	]);
/***********************
Videos
***********************/
Route::get('/videos/{type}', [
	'as' 	=> 'list_videos',
	'uses'	=> 'VideoController@index'
]);
Route::get('/videos/{type}/{id}',[
	'as'	=> 'view_video',
	'uses'	=> 'VideoController@view'
]);

/***********************
TIPS
***********************/
Route::get('/submit-tip', [
	'as'	=> 'submit_tip_form',
	'uses'	=> 'TipController@post'
]);
Route::post('/submit-tip', [
	'as'	=> 'save_tip',
	'uses'	=> 'TipController@save'
]);
Route::get('/search/{city_id}/{city_name}',[
	'as' 	=> "tip_search",
	'uses'	=> "TipController@search"
]);
Route::get('/ver/{id}', [
	'as' 	=> 'view-tip',
	'uses'	=> 'TipController@view'
]);
Route::get('/featured', [
	'as'	=> 'featured',
	'uses'	=> 'TipController@featured'
]);

/***********************
cateogires
 ***********************/
Route::get('/category/{id}/pictures', [
    'as'	=> 'category.pictures',
    'uses'	=> 'TipCategoryController@pictures'
]);

/***********************
Ratings
***********************/
Route::post("/tips/{id}/rating/",[
	'as'	=> 'post_rating',
	'uses'	=> 'ReviewController@save'
]);

Route::get("/create-seeds",function(){
	//Iseed::generateSeed('people');
	//Iseed::generateSeed('cities');
	//Iseed::generateSeed('provinces');
	//Iseed::generateSeed('regions');
	//Iseed::generateSeed('tips_categories');
	//Iseed::generateSeed('tips');
	return "OK";
});


Route::any("/get-cities",[
	'as' 	=> 'get-cities',
	'uses'	=> "CityController@cities"
]);



