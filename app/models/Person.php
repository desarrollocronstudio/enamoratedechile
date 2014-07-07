<?php
class Person extends Eloquent {
	protected $table = 'people';
	public $rules =  array(	
		'name' 		=> 'required|min:3',
		'email'		=> 'required|email'
		'rut'		=> 'required');
	
 
}