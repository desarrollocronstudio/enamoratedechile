<?php

class TipController extends BaseController {
	

	public function search($city_name, $lat,$lng){
		$distances = [80];
		$minimum_places = 3;

		$tips = [];
		$distance = 0;
		foreach($distances as $distance){
			$table = 'tips';

			$select = "*,IFNULL(((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lng - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344),0) AS `distance`";
			$having = "`distance`<=$distance AND active=true";

			$query = Tip::selectRaw(DB::raw($select))
				->havingRaw(DB::raw($having))
				->orderBy('distance','ASC');
			
			if(Input::get('cat'))$query->where('type_id',Input::get('cat'));

			$tips = $query->simplePaginate(6);
			if($tips->count() > $minimum_places)break;
		}


		$city = [
			'name'	=> str_replace('_',' ',$city_name)
		];
		$data = array(
			"tips" 		=> $tips,
			"distance"	=> $distance,
			"city"		=> $city
		);
		return View::make('tips.list',$data);
	}
	
	public function view($tip_id){
		$tip = Tip::find($tip_id);
		if(!$tip->active && !is_admin())return Redirect::action('home');
        if(!$tip)return Redirect::route("featured");
        $total_reviews = $tip->rating_count;
		return View::make('tips.view',[
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
		return View::make('tips.submit',$data);
	}

	public function edit($tip_id){
		if(!Auth::check() || !Auth::user()->admin)return 'Unauthorized';

		$tip = Tip::findOrFail($tip_id);
		$data = array(
			"regions" 		=> Region::remember(120)->lists("large_name","id"),
			"categories"	=> TipType::remember(120)->lists("name","id"),
			'tip'			=> $tip
		);

		\Session::flashInput([
			'place_name'	=> $tip->name,
			'city_search'	=> $tip->place_name,
			'tip_category'	=> $tip->type_id,
			'description'	=> $tip->content,
			'active'		=> $tip->active
		]);

		return View::make('tips.edit',$data);
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
			$tip->code			= str_rand(32);
            if(Input::get('image_type') == "custom"){
				$filename = str_rand(12).".".strtolower(Input::file("image")->getClientOriginalExtension());
				if(Input::file('image')->move(public_path()."/uploads",$filename)){
					$tip->image = $filename;
				}	
			}
			$tip->save();
			Event::fire('tip.registered',[$tip,Auth::user()]);
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

	public function active($status,$id,$token){

		try{
			$tip = Tip::withTrashed()->findOrFail($id);
		}catch(Exception $e){
			return 'El tipo no se puede encontrar';
		}

		if($token != $tip->code){
			return 'Unauthorized';
		}

		$final_status = $status=='false'?false:true;
		if($final_status == false){
			$tip->delete();
		}else{
			$tip->restore();
			$tip->active = $final_status;
			$tip->save();
		}

		Event::fire('tip.change_status',[$tip,$final_status]);

		return 'OK';
	}

	public function update($id){
		if(!Auth::check() || !Auth::user()->admin)return 'Unauthorized';
		$tip = Tip::findOrFail($id);

		$tip->name		= Input::get('place_name');
		$tip->content	= Input::get('description');
		$tip->type_id	= Input::get('tip_category');
		$tip->lat		= Input::get('place_lat');
		$tip->lng		= Input::get('place_lng');
		$tip->place_name= Input::get('city_search');
		$tip->active	= Input::get('active');

		$tip->save();
		return Redirect::route('view-tip',$tip->id);
	}
}
