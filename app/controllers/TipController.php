<?php

class TipController extends BaseController {
	

	public function search($city_id,$city_name){
		$city = City::find($city_id);
		if(!$city)Redirect::back();
		$position = $city->get_position();
		
		$lat = $position["lat"];
		$lng = $position["lng"];
		$distances = [20,50,80,100,200,500,800,1000];
		$minimum_places = 3;
		foreach($distances as $distance){
			$table = 'tips';

			$select = "*,((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lng - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance`";
			$having = "`distance`<=$distance";

			$tips = Tip::selectRaw(DB::raw($select))
				->havingRaw(DB::raw($having))
				->orderBy('distance','ASC')
				->simplePaginate(6);
			if($tips->count() > $minimum_places)break;
		}
		
		


		$data = array(
			"tips" 		=> $tips,
			"distance"	=> $distance,
			"city"		=> $city
		);
		return View::make('list-tips',$data);
	}
	
	public function view($tip_id){
		$tip = Tip::find($tip_id);
		return View::make('view-tip',[
			"tip" 			=> $tip
		]);
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
			$tip->city_name		= $input['city'];
			$tip->author_id		= $input["user_id"];
			$tip->content 		= $input["description"];
			$tip->type_id 		= $input["tip_category"];
			$tip->lat 			= $input["place_lat"];
			$tip->lng 			= $input["place_lng"];
			$tip->place_name	= $input["city_search"];
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
