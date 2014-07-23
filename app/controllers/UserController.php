<?php

class UserController extends BaseController {
	

	public function signup(){
		return View::make('signup');
	}
	
	public function save_signup(){
		$input = Input::all();

		$rules = array_merge(Person::$rules,array("password" => 'confirmed'));

		$validator = Validator::make($input,$rules,array(
			"name.required" 	=> "Debes indicar tu nombre",
			"email.required"	=> "Debes indicar tu email",
			"rut.required"		=> "Debes indicar tu RUT",
			"password.confirmed"=> "Las contraseñas ingresadas no coinciden",
			"rut"				=> "El R.U.T. ingresado es inválido"));
		if ($validator->fails()){
			if(Request::ajax()){                   
				$response_values = array(
					'validation_failed' => 1,
					'errors' =>  $validator->errors()->toArray());	            
				return Response::json($response_values);
			}

		 	return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$input = Input::all();
			$input["rut"] = normalizar_rut($input["rut"]);

			$exists = Person::where(function($query) use ($input){
				$query->where("dni","=",$input["rut"])->where("dni_type","=","rut");
			});
			if(isset($input["fbid"]))
				$exists->orWhere("fbid",$input["fbid"]);
			
			$data = $exists->get();
			//Chck if is connected to Facebook.

			$fb = init_facebook();
			$user = $fb->getUser();

			$person = ($data->count() > 0)?$data[0]:new Person;
			if($user)$person->fbid = $user;
			$person->name		= $input["name"];
			$person->email		= $input["email"];
			$person->dni		= normalizar_rut($input["rut"]);
			$person->dni_type	= "rut";
			$person->password 	= Hash::make($input["password"]);
			$person->save();
			
			if(Request::ajax()){                   
				$response_values = array(
					'validation_failed' => false,
					'user_data' =>  $person->get()[0]);	            
				return Response::json($response_values);
			}
			return Redirect::back()->with('tip_saved', true);

		}
	}

}
