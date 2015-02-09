<?php

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Person extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;
	
	protected $table = 'people';
	public static $rules =  array(	
		'name' 		=> 'required|min:3',
		'email'		=> 'required|email',
		'rut'		=> 'required|cl_rut');
	
	protected $hidden = array('password', 'remember_token');

	public function profile_image(){
		if($this->fbid){
			return "//graph.facebook.com/".$this->fbid."/picture";
		}
		return asset("img/default_profile.jpg");
	}

	public function saved_tips(){
		return $this->belongsToMany('Tip','tips_person','author_id','tip_id');
	}
}