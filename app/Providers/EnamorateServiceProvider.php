<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EnamorateServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$fb = init_facebook();
		
		if(\Auth::check() == false){
			try{
				$fbid = $fb->getUser();
			}catch(\Exception $e){
				$fbid=false;
			}
			if($fbid){
				$user = \Person::where('fbid', $fbid)->first();
				if ($user && \Auth::login($user))
				{
				    //return Redirect::intended('home');
				}
			}
		}

		$tips_categories = \Cache::remember('tip_types_complete',120,function(){
			return \TipType::all();
		});



		\View::share("tips_categories",$tips_categories);
        \View::share("is_home",false);
        \View::share("canShare",false);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		
		
	}

}
