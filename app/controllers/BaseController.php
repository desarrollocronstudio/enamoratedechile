<?php

class BaseController extends Controller {
	public $layout = 'layouts.default';
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */


	
	protected function setupLayout()
	{
		$fb = init_facebook();
		if(!Auth::check()){
			try{
				$fbid = $fb->getUser();
			}catch(Exception $e){
				$fbid=false;
			}
			if($fbid){
				$user = Person::where('fbid', $fbid)->first();
				if ($user && Auth::login($user))
				{
				    //return Redirect::intended('home');
				}
			}
		}

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			View::share("tips_categories",TipType::remember(60)->get());
		}
	}

}
