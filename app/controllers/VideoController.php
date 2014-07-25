<?php

class VideoController extends BaseController {

	
	public function index($type)
	{
		if(!in_array($type,['jenny','ideal'])){
			return Redirect::to("/");
		}
		$featured = Video::type($type)->featured()->first();
		$videos = Video::type($type)->where('id','<>',$featured->id)->get();
		return View::make('videos.view',['videos' => $videos,'featured'=>$featured,'autoplay' => false]);
	}
	public function view($type,$id)
	{
		$featured = Video::where('id',$id)->first();
		$videos = Video::type($featured->type)->where('id','<>',$id)->get();
		return View::make('videos.view',['videos' => $videos,'featured'=>$featured,'autoplay' => true]);
	}
}
