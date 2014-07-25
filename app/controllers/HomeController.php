<?php

class HomeController extends BaseController {


	public function index()
	{
		$tips = Tip::featured()->take(6);
		return View::make('home',array("tips" => $tips));
	}

}
