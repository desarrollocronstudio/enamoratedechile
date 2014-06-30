<ul class="menu main-nav">
    <li><a href="{{ action('HomeController@index') }}">{{ __("INICIO") }}</a></li>
    <li><a href="{{ action('FeaturedController@index') }}">{{ __("DESTACADOS")}}</a></li>
    <li><a href="{{ action('RoutesController@my_route') }}">{{ __("MI RUTA")}}</a></li>
    <li><a href="{{ action('IdealRouteController@index') }}">{{ __("LA RUTA IDEAL")}}</a></li>
    <li><a href="{{ action('JennyController@index') }}">{{ __("BUSCANDO A JENNY")}}</a></li>
</ul>