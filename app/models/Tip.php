<?php
class Tip extends Eloquent {
 	public static $rules =  array(	
		'user_id' 	=> 'required|min:3',
		'email'		=> 'required|email');

 	public function author()
    {
        return $this->hasOne('People');
    }

	public function get_featured(){
		
	}
 
}