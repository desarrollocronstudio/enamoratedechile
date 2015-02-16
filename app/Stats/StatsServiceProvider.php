<?php  namespace App\Stats;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class StatsServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //$this->loadViewsFrom(app_path('../resources/views/packages/stats'),'panel.stats');
        $this->loadViewsFrom(__DIR__.'/views','panel.stats');

        $this->publishes([
            __DIR__.'/resources' 	=> base_path('public/packages/panel-stats'),
            __DIR__.'/views'		=> base_path('resources/views/packages/panel-stats')
        ]);
    }

    public function boot(){
        $this->app->call([$this,'loadRoutes']);

    }

    public function loadRoutes(Router $router)
    {
        $router->group(['prefix' => 'panel/stats'], function($router)
        {
            require __DIR__.'/routes.php';
        });
    }
}