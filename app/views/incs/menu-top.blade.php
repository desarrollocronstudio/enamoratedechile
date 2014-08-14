<?php
	$menu = Menu::handler('main')->addClass("menu main-nav")
		->add(action('home'),"INICIO")
		->add(action('featured')."#view-content",'POPULARES')
		->add(action('RouteController@my_route')."#view-content","MIS FAVORITOS")
		->add(action('list_videos','ideal')."#view-content",'ESPECIAL<BR />SAN PEDRO',null,['class'=>'double'])
		->add(action('list_videos','jenny')."#view-content",'BUSCANDO A JENNY');

	if(!$is_home){
	    $menu->addClass("complete");
	    $menu->add(action('home')."#busca","<img src='".asset("img/btn-busca-un-dato-top.png")."' alt='' />",null,['class' => 'img-btn']);
	    $menu->add(action('submit_tip_form'),"<img src='".asset("img/btn-sube-tu-dato-top.png")."' alt='' />",null,['class' => 'img-btn']);
	}

	echo $menu;
?>
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