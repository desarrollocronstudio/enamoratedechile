<?php

class TipController extends BaseController {

	public function list_tips(){
		$tips = array(1,2,3,4,5,6);
		return View::make('list-tips',array("tips" => $tips));
	}
	public function view($tip_id)
	{
		$tip = Tip::find($tip_id);
		return View::make('view-tip',array("tip" => $tip));
	}

	public function post(){
		return View::make('post-tip',array("tip" => $tip));
	}

}
