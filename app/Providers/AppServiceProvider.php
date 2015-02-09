<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		require app_path().'/events.php';
		if($this->app->environment() == 'production' && !$this->app->runningInConsole()){
			if(!isset($_SERVER['HTTP_X_FORWARDED_SERVER']) || $_SERVER['HTTP_X_FORWARDED_SERVER'] != 'ssl.lan.com'){
				$uri = (isset($_SERVER['REQUEST_URI']))?$_SERVER['REQUEST_URI']:'';
				header("HTTP/1.1 301 Moved Permanently",null,301);
				header('Location: https://ssl.lan.com/enamoratedechile'.$uri);
				exit;
			}
			app('url')->forceSchema('https');
			app('url')->forceRootUrl('https://ssl.lan.com/enamoratedechile');
		}


	}

}
