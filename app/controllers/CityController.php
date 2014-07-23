<?php

class CityController extends BaseController {

	public function cities()
	{
		$q = Input::get("q");
		$words = explode(" ",$q);
		if($q){
			$cities = City::where('name','LIKE','%'.$q.'%')->select('id','name')->get();
		}else{
			$cities = City::all();
		}
		return Response::json(
			$cities->lists('name','id')
		);
	}

}
