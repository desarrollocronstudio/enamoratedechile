<?php namespace App\Panel;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class PanelServiceProvider
 * @package App\Providers
 */
class PanelServiceProvider extends ServiceProvider {
	/**
	 * @var string
     */
	protected $prefix = 'panel';
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(app_path('../resources/views/packages/panel-core'),'panel');

		$this->publishes([
			__DIR__.'/resources' 	=> base_path('public/packages/panel-core'),
			__DIR__.'/views'		=> base_path('resources/views/packages/panel-core')
		]);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{


		$this->app->call([$this,'loadRoutes']);
	}

	/**
	 * @param Router $router
     */
	public function loadRoutes(Router $router){
		$router->group(['prefix' => $this->prefix], function($router)
		{
			require __DIR__.'/routes.php';
		});
	}

}
