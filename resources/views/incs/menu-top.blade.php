<div class="menu">

</div>
<div class='submenu'>
	<div class="userdata"> 
		@if (Auth::check())
			<div class="user">
				<img src="{{ Auth::user()->profile_image() }}" alt="{{{ Auth::user()->name }}}" />
				<span>{{{ Auth::user()->name }}}</span>
				<a class="sign_out" href="{{ route('logout') }}">Cerrar sesión</a>
			</div>
		@else
			<div class="links">
			    <a href="{{ route('signup') }}" class="signup registrate">Regístrate</a>
				<a href="{{ route('login') }}" class="login inicia-sesion">Iniciar sesión</a>
			</div>
		@endif
	</div>
	@if($canShare) 
	<div class="shares">
	    <div class="fb-like" data-href="{{ Config::get("app.url") }}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	    <a href="https://twitter.com/share" data-url="{{ Config::get("app.url") }}" class="twitter-share-button" data-lang="es">Tweet</a>
	</div>
	@endif
</div>