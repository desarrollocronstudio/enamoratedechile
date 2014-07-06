<?php

class TipController extends BaseController {

	public function search(){
		$data = array(
			"tips" => array(1,2,3,4,5,6),
			"city"	=> array("name" => "Puerto Varas")
		);
		return View::make('list-tips',$data);
	}
	public function view($tip_id)
	{
		$tip = Tip::find($tip_id);
		return View::make('view-tip',array("tip" => $tip));
	}

	public function post(){
		return View::make('submit-tip');
	}
	public function save(){
		print_r(Input::all());
		if(count(Input::all()) > 0){
			$this->layout = false;
			return "Hola";
		}
	}

}
