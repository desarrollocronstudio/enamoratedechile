<?php
class Tip extends Eloquent {
 	public static $rules =  array(	
		'user_id' 	=> 'required|min:3',
		'email'		=> 'required|email');

 	public function author()
    {
        return $this->hasOne('People');
    }

	public static function get_featured($length = 6){
		return Tip::take($length)->join('tips_categories as tc', 'tc.id', '=', 'type_id')->join('people', 'people.id', '=', 'author_id')->select('people.name as author','tips.name','tips.image','tc.name as category_name','content')->get();
	}
 
}