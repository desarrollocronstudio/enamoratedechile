<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;


class UserController extends BaseController {
	
	public function logout(){
		try{

			$fb_key = 'fbsr_'.config("facebook.appId");
			setcookie($fb_key, '', time()-3600);
			$fb = init_facebook();
			$fb->destroySession();
			\Auth::logout();
		}catch(Exception $e){
			
		}
		return \Redirect::to("/");
	}
	public function login(){
		$check = array("dni" => \Rut::normalize(\Input::get('rut')),"dni_type" => "rut","password" => \Input::get("password"));
		if($res = \Auth::attempt($check,true)){
			if(\Request::ajax()){                   
				$response_values = array(
					'loged' => true,
					'user_data' =>  \Auth::user()
				);	            
				return \Response::json($response_values);
			}
		}else{
			if(\Request::ajax()){                   
				$response_values = array(
					'loged' => false,
					'msg'	=> "Rut y contraseña no coinciden"
				);	            
				return \Response::json($response_values);
			}
		}
		
	}
	public function show_login(){
		if(\Auth::check()){
			return \Redirect::route('home');
		}
		return \View::make("login");
	}

	public function signup(){
		if(\Auth::check()){
			return \Redirect::route('home');
		}
		return \View::make('signup');
	}

	public function check(){
		$fb = init_facebook();
		$fb->getUser();

		return \Response::json([
			'loged'			=> \Auth::check(),
			'facebook'		=> $fb->getUser()
		]);
	}
	
	public function save_signup(){
		$input = \Input::all();

		$rules = array_merge(\Person::$rules,array("password" => 'confirmed'));

		$validator = \Validator::make($input,$rules,array(
			"name.required" 	=> "Debes indicar tu nombre",
			"email.required"	=> "Debes indicar tu email",
            "email.email"	    => "Debes indicar un email válido",
			"rut.required"		=> "Debes indicar tu RUT",
			"password.confirmed"=> "Las contraseñas ingresadas no coinciden",
			"cl_rut"			=> "El R.U.T. ingresado es inválido"));
		if ($validator->fails()){
			if(\Request::ajax()){
				return $this->sendFail($validator->errors()->toArray());
			}

		 	return \Redirect::back()->withErrors($validator)->withInput();
		}else{
			$input = \Input::all();
			$input["rut"] = \Rut::normalize($input["rut"]);

			$exists = \Person::where(function($query) use ($input){
				$query->where("dni","=",$input["rut"])->where("dni_type","=","rut");
			});

            if($exists->first())
            {
                return $this->sendFail(['Este R.U.T. ya está registrado']);
            }

			/*if(isset($input["fbid"]))
				$exists->orWhere("fbid",$input["fbid"]);
			*/

			$data = $exists->get();
			//Chck if is connected to Facebook.

			$fb = init_facebook();
			$user = $fb->getUser();

			$person = ($data->count() > 0)?$data[0]:new \Person;
			if($user)$person->fbid = $user;
			$person->name		= $input["name"];
			$person->email		= $input["email"];
			$person->dni		= \Rut::normalize($input["rut"]);
			$person->dni_type	= "rut";
			$person->password 	= \Hash::make($input["password"]);
			$person->save();

			if(\Request::ajax()){                   
				$response_values = array(
					'validation_failed' => false,
					'user_data' =>  $person->get()[0]);	            
				return \Response::json($response_values);
			}
			return \Redirect::back()->with('tip_saved', true);

		}
	}


    public function sendFail($errors){
        $response_values = array(
            'validation_failed' => 1,
            'errors' =>  $errors);
        return \Response::json($response_values);
    }
}
