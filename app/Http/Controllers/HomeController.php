<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController {


	public function index()
	{

		$tips = \Tip::active()->featured()->take(6)->get();
		return \View::make('home',array("tips" => $tips,"is_home" => true));
	}

}
