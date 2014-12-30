<?php

class TipController extends BaseController {
	

	public function search($city_id,$city_name = ''){
		$city = City::find($city_id);
		if(!$city)Redirect::back();
		$position = $city->get_position();
		
		$lat = $position["lat"];
		$lng = $position["lng"];
		$distances = [80];
		$minimum_places = 3;

		$tips = [];
		$distance = 0;
		foreach($distances as $distance){
			$table = 'tips';

			$select = "*,((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lng - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`";
			$having = "`distance`<=$distance AND active=true";

			$query = Tip::selectRaw(DB::raw($select))
				->havingRaw(DB::raw($having))
				->orderBy('distance','ASC');
			
			if(Input::get('cat'))$query->where('type_id',Input::get('cat'));

			$tips = $query->simplePaginate(6);
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
		if(!$tip->active)return Redirect::action('home');
        if(!$tip)return Redirect::route("featured");
        $total_reviews = $tip->rating_count;
		return View::make('view-tip',[
			"tip" 			        => $tip,
            'total_reviews'         => $total_reviews,
            'show_add_route_button' => !$tip->alreadyFavoritedByCurrentUser(),
            'already_voted'         => $tip->alreadyVotedByCurrentUser()
		]);
	}

	public function featured(){
		$tips = Tip::active()->featured()->simplePaginate(6);
		return View::make('featured',array("tips" => $tips));
	}

	public function post(){
		$data = array(
			"regions" 		=> Region::remember(120)->lists("large_name","id"),
			"categories"	=> TipType::remember(120)->lists("name","id"),


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
            'image_type'    => 'required',
			'city'		    => 'required',
			'tip_category'	=> 'required'
		);
        if(Input::has('image_type')){
            if(Input::get('image_type') =="default"){
                $rules['default_picture'] = 'required|integer|min:0|max:1';
            }else{
                $rules['image'] = 'required|image';
            }


        }


		$validator = Validator::make($input,$rules,array(
			"city.required" 			=> "Debes seleccionar una ciudad. ¿Donde es tu dato?",
			'tip_category.required'		=> "Debes indicar una categoría para tu dato",
            "default_picture.required"  => "Debes seleccionar una imagen para tu dato",
            "image_type.required"       => "Debes seleccionar el tipo de imagen que necesitas",
            'image.required'            => "Debes subir una imagen",
            'image.image'               => "Debes subir una imagen, no otro tipo de archivo",

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
            $tip->image         = "";
            $tip->default_image = $input["default_picture"];
			$tip->active 		= false;
            if(Input::get('image_type') == "custom"){
				$filename = str_rand(12).".".strtolower(Input::file("image")->getClientOriginalExtension());
				if(Input::file('image')->move(public_path()."/uploads",$filename)){
					$tip->image = $filename;
				}	
			}
			$tip->save();
			return Redirect::route('tips.thanks')->with('tip.last_saved', $tip->id);

		}
	}
    public function thanks(){
        $tip_id = Session::get('tip.last_saved');
        Session::reflash();
        $tip = Tip::find($tip_id);
        if(!$tip){
            return Redirect::route('submit_tip_form');
        }
        return View::make('tips.thanks',[
            "tip" 			=> $tip
        ]);
    }
}
