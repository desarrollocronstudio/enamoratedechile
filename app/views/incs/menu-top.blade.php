{{ 
	Menu::handler('main')->addClass("menu main-nav")
		->add(action('home'),"INICIO")
		->add(action('featured')."#view-content",'DESTACADOS')
		->add(action('RouteController@my_route')."#view-content","MI RUTA")
		->add(action('list_videos','ideal')."#view-content",'LA RUTA IDEAL')
		->add(action('list_videos','jenny')."#view-content",'BUSCANDO A JENNY') 
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
			<div class="links">
				<a href="{{ action('login') }}" class="login">Iniciar sesión</a>
				<a href="{{ action('signup') }}" class="signup">Regístrate</a>
			</div>
		@endif
	</div>
	<div class="shares">
	<div class="fb-like" data-href="{{ URL::to('/')}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	</div>
</div>	