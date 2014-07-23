<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Person extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;
	
	protected $table = 'people';
	public static $rules =  array(	
		'name' 		=> 'required|min:3',
		'email'		=> 'required|email',
		'rut'		=> 'required|rut');
	
	protected $hidden = array('password', 'remember_token');

	public function profile_image(){
		if($this->fbid){
			return "//graph.facebook.com/".$this->fbid."/picture";
		}
		return asset("img/default_profile.jpg");
	}
}