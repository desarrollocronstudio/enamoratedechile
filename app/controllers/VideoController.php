<?php

class VideoController extends BaseController {

	
	public function jenny_index()
	{

		 return View::make('videos.jenny');
	}

	public function ideal_index()
	{

		 return View::make('videos.ideal_route');
	}
}
