<?php
class Tip extends Eloquent {
 
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