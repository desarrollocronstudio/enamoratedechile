<?php
class Tip extends Eloquent {
 	public static $rules =  array(	
		'user_id' 	=> 'required|min:3',
		'email'		=> 'required|email');

 	public function author()
    {
        return $this->belongsTo('Person');
    }
    public function category()
    {
        return $this->belongsTo('TipType','type_id','id');
    }
    public function images(){
    	return array($this->image());
    }
    
	public function reviews()
	{
		return $this->hasMany('Review');
	}
	public static function get_featured($length = 6){
		return Tip::take($length)->orderBy('rating_cache','DESC')->get();
	}

	public function city(){
		return $this->belongsTo('City');
	}
	public function image(){
		return ($this->image)?asset('uploads/'.$this->image):asset('img/img-form.jpg');
	}

	public function recalculateRating()
	{
		$reviews = $this->reviews();
		$avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
		$this->save();
	}
 
}