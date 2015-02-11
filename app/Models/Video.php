<?php
class Video extends Eloquent {
 	protected $table = "videos";
 	
 	public function scopeNotFeatured($query){
 		return $query->where('featured',false);
 	}
 	public function scopeFeatured($query){
 		return $query->where('featured',true);
 	}
 	public function scopeType($query,$type){
 		return $query->where('type',$type);
 	}
 	public function thumbnail(){
 		return 'http://img.youtube.com/vi/'.$this->youtube_code.'/0.jpg';
 	}
}