<?php
class Tip extends Eloquent {
 	public static $rules =  array(	
		'user_id' 	=> 'required|min:3',
		'email'		=> 'required|email');

	public function scopePopular($query){
		TipVote::groupBy('tip_id')->get(array(
			'tip_id',
			DB::raw('count(*) as count')
		));
	}
	public function get_featured(){
		$users = Tip::popular()->get();
	}
 
}