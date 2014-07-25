<?php
class Province extends Eloquent {
	protected $table = 'provinces';

	public function cities(){
		$this->hasMany("City");
	}
	public function region(){
		return $this->belongsTo("Region");
	}
 
}