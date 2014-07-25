<?php

class CityController extends BaseController {

	public function cities()
	{
		$q = Input::get("term");
		$words = explode(" ",$q);
		if($q){
			$cities = City::where('name','LIKE','%'.$q.'%')->select('id','name as label')->take(10)->get();
		}else{
			$cities = City::all()->take(10);
		}
		return Response::json(
			$cities->toArray()
		);
	}

}
