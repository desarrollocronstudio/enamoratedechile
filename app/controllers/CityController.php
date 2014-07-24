<?php

class CityController extends BaseController {

	public function cities()
	{
		$q = Input::get("term");
		$words = explode(" ",$q);
		if($q){
			$cities = City::where('name','LIKE','%'.$q.'%')->select('id','name as label')->get();
		}else{
			$cities = City::all();
		}
		return Response::json(
			$cities->toArray()
		);
	}

}
