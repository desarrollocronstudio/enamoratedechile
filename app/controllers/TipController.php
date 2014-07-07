<?php

class TipController extends BaseController {
	

	public function search(){
		$data = array(
			"tips" => array(1,2,3,4,5,6),
			"city"	=> array("name" => "Puerto Varas")
		);
		return View::make('list-tips',$data);
	}
	public function view($tip_id){
		$tip = Tip::find($tip_id);
		return View::make('view-tip',array("tip" => $tip));
	}

	public function post(){
		$data = array(
			"regions" 		=> Region::lists("large_name","id"),
			"categories"	=> TipType::lists("name","id")
		);
		return View::make('submit-tip',$data);
	}
	public function save(){
		$input = Input::all();

		$validator = Validator::make($input,Person::$rules,array("required" => "Debes completar el campo :attribute"));
		if ($validator->fails()){
			if(Request::ajax()){                    
				$response_values = array(
				'validation_failed' => 1,
				'errors' =>  $v->errors()->toArray());	            
				return Response::json($response_values);
			}

		 	return Redirect::to("submit-tip")->withErrors($validator)->withInput();;
		}else{
			$person = new Person;
			$person->name		= $input["name"];
			$person->email		= $input["email"];
			$person->dni		= $input["dni"];
			$person->dni_type	= "rut";
			$person->save();

			$tip = new Tip;
			$tip->name 			= $input["place_name"];
			$tip->author_id		= $person->id;
			$tip->save();
			
		}
	}

}
