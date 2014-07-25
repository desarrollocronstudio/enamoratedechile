<?php

class RouteController extends BaseController {
	public function my_route(){
		$tips = Tip::get_featured(6);
		return View::make("my-route",array("tips" => $tips));
	}
}