<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;

use Freshwork\ChileanBundle\Validations\Rut;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/**
	 * @param SignUpRequest $request
	 * @param Guard $auth
	 * @return mixed
     */
	public function store_signup(SignUpRequest $request, Guard $auth){
		$input = $request->all();

		$person = new \Person();
		if($request->has('fbid'))
		{
			$person->fbid = $request->get('fbid');
		}
		$person->name		= $input["name"];
		$person->email		= $input["email"];
		$person->dni		= \Rut::normalize($input["rut"]);
		$person->dni_type	= "rut";
		$person->password 	= \Hash::make($input["password"]);
		$person->save();

		$auth->login($person);

		if($request->ajax()){
			$response_values = array(
				'user_data' =>  $person->toArray());
			return \Response::json($response_values);
		}
		return \Redirect::back()->with('tip_saved', true);
	}

}
