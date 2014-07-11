<?php

class HomeController extends BaseController {


	public function index()
	{
		$tips = Tip::get_featured(6);
		return View::make('home',array("tips" => $tips));
	}

}
