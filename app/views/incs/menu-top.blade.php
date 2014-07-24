{{ 
	Menu::handler('main')->addClass("menu main-nav")
		->add(action('HomeController@index'),"INICIO")
		->add(action('TipController@featured'),'DESTACADOS')
		->add(action('RouteController@my_route'),"MI RUTA")
		->add(action('RouteController@ideal'),'LA RUTA IDEAL')
		->add(action('JennyController@index'),'BUSCANDO A JENNY') 
}}
<div class='submenu'>
	<div class="userdata"> 
		@if (Auth::check())
			<div class="user">
				<img src="{{ Auth::user()->profile_image() }}" alt="{{ Auth::user()->name }}" />
				<span>{{ Auth::user()->name }}</span>
				<a href="{{ action('logout') }}">Cerrar sesión</a>
			</div>
		@else 
			<a href="{{ action('login') }}" class="login">Iniciar sesión</a>
			<a href="{{ action('signup') }}" class="signup">Regístrate</a>
		@endif
	</div>
</div>	