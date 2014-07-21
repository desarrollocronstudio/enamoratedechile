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
		$tip = Tip::find(1)->where('tips.id',$tip_id)->join('tips_categories as tc', 'tc.id', '=', 'type_id')->join('people', 'people.id', '=', 'author_id')->select('people.name as author','tips.id','tips.name','tips.image','tc.name as category_name','content')->get();
		$tip = $tip[0];
		$images = array($tip["image"]);
		return View::make('view-tip',array("data" => $tip,"images" => $images));
	}
	public function featured(){
		$tips = Tip::get_featured();
		return View::make('home',array("tips" => $tips));
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

		$validator = Validator::make($input,Person::$rules,array(
			"required" 	=> "Debes completar el campo :attribute",
			"rut"		=> "El R.U.T. ingresado es inválido"));
		if ($validator->fails()){
			if(Request::ajax()){                    
				$response_values = array(
				'validation_failed' => 1,
				'errors' =>  $v->errors()->toArray());	            
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
			$person->save();


			$tip = new Tip;
			$tip->name 			= $input["place_name"];
			$tip->author_id		= $person->id;
			$tip->content 		= $input["description"];
			$tip->type_id 		= $input["tip_category"];
			$tip->place_name	= $input["place_name"];
			if (Input::hasFile('image')){
				$filename = str_rand(12).".".strtolower(Input::file("image")->getClientOriginalExtension());
				if(Input::file('image')->move(public_path()."/uploads",$filename)){
					$tip->image = $filename;
				}	
			}
			$tip->save();
			return Redirect::back()->with('tip_saved', true);

		}
	}

	public function add_to_my_route(){
		return "hola";
	}
}
