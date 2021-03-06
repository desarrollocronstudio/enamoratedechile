<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Tip extends Eloquent {
    use SoftDeletes;

 	public static $rules =  array(	
		'user_id' 	=> 'required|min:3',
		'email'		=> 'required|email');

    public function sluged_name(){
        return str_replace(' ','_',$this->name);
    }
 	public function author()
    {
        return $this->belongsTo('Person');
    }
    public function category()
    {
        return $this->belongsTo('TipType','type_id','id');
    }
    public function images(){
        $images = explode(",",$this->images);
        foreach($images as $k=> $v)
        {
            if(trim($v) == "")
            {
                unset($images[$k]);
            }else{
                $images[$k] = asset('uploads/'.$v);
            }
        }
        $images = array_merge([$this->image()],$images);
        return $images;
    }
    
	public function reviews()
	{
		return $this->hasMany('Review');
	}
    public function favorited()
    {
        return $this->hasMany('PostFavorite');
    }
    public function scopeActive($query){
        return $query->where('active',true);
    }
	public function scopeFeatured($query){
		return $query->orderBy('rating_cache','DESC');
	}

	public function city(){
		return $this->belongsTo('City');
	}
	public function image(){
        if($this->image){
           return asset('uploads/'.$this->image);
        }else{
            $pics = $this->category->pictures();
            return URL::to("/img/default")."/".((isset($pics[$this->default_image]))?$pics[$this->default_image]:"");
        }
        return false;
	}

    public function link(){
        return route('view-tip',[$this->id, $this->sluged_name()]);
    }

	public function recalculateRating()
	{
		$reviews = $this->reviews();
		$avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
		$this->save();
	}

	public function users_who_saved_it(){
		return $this->hasMany('Person');
	}

    public function alreadyFavoritedByCurrentUser(){
        if(!Auth::check())return false;
        return (bool)Auth::user()->saved_tips()->where('tip_id',$this->id)->first();
    }
    public function alreadyVotedByCurrentUser(){
        if(!Auth::check())return false;
        return (bool)$this->reviews()->where('author_id',Auth::user()->id)->first();
    }
 
}