<?php

class VideoController extends BaseController {

	
	public function index($type)
	{
		if(!in_array($type,['jenny','ideal'])){
			return Redirect::to("/");
		}
		$og = [
			'url'		=> URL::current(),
			'title' 	=> $type =='jenny'?"Videos: Buscando a Jenny":"Videos: La ruta ideal",
			'content'	=> 'Revisa los videos que Enamórate de Chile tiene para tí',
			'image'		=> asset("img/logo-square.png")];

		$featured = Video::type($type)->featured()->first();
		$videos = Video::type($type)->where('id','<>',$featured->id)->get();
        $intro = "Jean Phillipe se deja seducir por los encantos de San Pedro.<br />Te invitamos a vivir con él este loco amor.";
		return View::make('videos.view',['videos' => $videos,'featured'=>$featured,'autoplay' => false,"og" => $og,'intro' => $this->get_intro($type)]);
	}
	public function view($type,$id)
	{
		$featured = Video::where('id',$id)->first();
		$videos = Video::type($featured->type)->where('id','<>',$id)->get();
		$og = [
			'url'		=> URL::current(),
			'title' 	=> "Video: ".$featured->name,
			'content'	=> 'Revisa los videos que Enamórate de Chile tiene para tí',
			'image'		=> $featured->thumbnail(),
			'video'		=> 'http://www.youtube.com/v/'.$featured->youtube_code];


		return View::make('videos.view',['videos' => $videos,'featured'=>$featured,'autoplay' => true,'og' => $og,'intro' => $this->get_intro($type)]);
	}

    function get_intro($type){
        if($type == "jenny"){
            return "El dedo más apasionado de Chile recorre el país en busca de su amada<br />¿La encontrará?¿Triunfará el amor?";
        }else{
            return "Jean Phillipe se deja seducir por los encantos de San Pedro.<br />Te invitamos a vivir con él este loco amor.";
        }
        return "";
    }
}
