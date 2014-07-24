<?php

class TipController extends BaseController {
	

	public function search($city_id,$city_name){
		$city = City::find($city_id);
		if(!$city)Redirect::back();
		$data = array(
			"tips" => array(1,2,3,4,5,6),
			"city"	=> array("name" => $city->name)
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
		if(!Auth::check()){
			return Redirect::back()->with('not_loged', true)->withInput();
		}

		$input = Input::all();
		$input["user_id"] = Auth::user()->id;
		$rules =  array(	
			'city'		=> 'required',
			'tip_category'	=> 'required'
		);
		$validator = Validator::make($input,$rules,array(
			"city.required" 			=> "Debes seleccionar una ciudad. ¿Donde es tu dato?",
			'tip_category.required'		=> "Debes indicar una categoría para tu dato"
		));
		if ($validator->fails()){
			if(Request::ajax()){                    
				$response_values = array(
					'validation_failed' => 1,
					'errors' =>  $validator->errors()->toArray()
				);
				return Response::json($response_values);
			}

		 	return Redirect::back()->withErrors($validator)->withInput();
		}else{

			$tip = new Tip;
			$tip->name 			= $input["place_name"];
			$tip->author_id		= $input["user_id"];
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
