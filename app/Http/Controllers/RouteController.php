<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class RouteController extends BaseController {
	public function my_route(){
		$tips = array();
		if(\Auth::check()){
			$tips = \Auth::user()->saved_tips()->simplePaginate(6);
		}
        foreach($tips as $key => $tip){
            $tip->id = $tip->tip_id;
            $tips[$key] = $tip;
        }
		return \View::make("my-route",array("tips" => $tips));
	}

	public function add_to_my_route($id){

		if(!\Auth::check())return \Redirect::back()->with('error','No has iniciado sesión.');
		$exists = \Auth::user()->saved_tips()->where('tip_id',$id)->first();
		if($exists){
			return \Redirect::route('my_route',["#view-content"])->with('saved_route',true)->with('already',true);
		}

		$tip = \Tip::find($id);
		$res = \Auth::user()->saved_tips()->save($tip,array("created_at" => time()));
		return \Redirect::route('my_route',["#view-content"])->with('saved_route',true);
	}
}