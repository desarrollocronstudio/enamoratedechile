<?php
class PartialController extends BaseController{

	public function show($partial_name){
		return View::make("partials.$partial_name");
	}
}