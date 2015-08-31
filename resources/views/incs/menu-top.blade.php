<div class="menu">
    <?php

        $menu = Menu::handler('main')->addClass("main-nav");
        $menu->add(route('home'),"<img src='".asset("img/logo-header.jpg")."' alt='' />",null,['class' => 'img-btn logo']);

        $menu->add(route('home'),"INICIO");
        $menu->add(route('home'),"<img src='".asset("img/icono-home.png")."' alt='' />",null,['class' => 'logo-casa']);
        $menu->add(route('featured'),'LOS DATOS MÁS<br />POPULARES',null,['class'=>'double']);
        $menu->add(route('my_route'),"MIS FAVORITOS");
        //->add(route('list_videos','ideal'),'ESPECIAL<BR />SAN PEDRO',null,['class'=>'double'])
        //$menu->add(route('list_videos','jenny'),'BUSCANDO A JENNY');

        if(!$is_home){
            $menu->addClass("complete");
            $menu->add(route('submit_tip_form'),"<img src='".asset("img/btn-sube-tu-dato-top.png")."' alt='' />",null,['class' => 'img-btn']);
        	$menu->add(route('home')."#busca","<img src='".asset("img/btn-busca-un-dato-top.png")."' alt='' />",null,['class' => 'img-btn']);
        }

        echo $menu;
    ?>
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