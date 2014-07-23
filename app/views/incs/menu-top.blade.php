<ul class="menu main-nav">
    <li><a href="{{ action('HomeController@index') }}">{{ __("INICIO") }}</a></li>
    <li><a href="{{ action('TipController@featured') }}">{{ __("DESTACADOS")}}</a></li>
    <li><a href="{{ action('RouteController@my_route') }}">{{ __("MI RUTA")}}</a></li>
    <li><a href="{{ action('RouteController@ideal') }}">{{ __("LA RUTA IDEAL")}}</a></li>
    <li><a href="{{ action('JennyController@index') }}">{{ __("BUSCANDO A JENNY")}}</a></li>
</ul>
<div class='submenu'>
	<div class="userdata"> 
		@if (Auth::check())
			<div class="user">
				<img src="https://graph.facebook.com/{{Auth::user()->fbid}}/picture" alt="{{ Auth::user()->name }}" />
				<span>{{ Auth::user()->name }}</span>
				<a href="{{ action('logout') }}">Cerrar sesión</a>
			</div>
		@else 
			<a href="{{ action('login') }}" class="login">Iniciar sesión</a>
			<a href="{{ action('signup') }}" class="signup">Regístrate</a>
		@endif
	</div>
</div>	