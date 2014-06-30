<?php

class CityController extends BaseController {

	public function autocomplete()
	{
		$q = Input::get("q");

		return Response::json(array(
			'data'         =>     $q
		));
	}

}
