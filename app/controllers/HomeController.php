<?php

class HomeController extends BaseController {


	public function index()
	{
		$tips = Tip::take(6)->join('tips_categories as tc', 'tc.id', '=', 'type_id')->join('people', 'people.id', '=', 'author_id')->select('people.name as author','tips.name','tips.image','tc.name as category_name','content')->get();
		return View::make('home',array("tips" => $tips));
	}

}
