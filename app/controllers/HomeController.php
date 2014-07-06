<?php

class HomeController extends BaseController {


	public function index()
	{
		$tips = array(1,2,3,4,5,6);
		return View::make('home',array("tips" => $tips));
	}

}
