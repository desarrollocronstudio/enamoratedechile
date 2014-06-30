@extends("layouts/default")
@section('content')
<div class="page" id="home">
	<img class="logo" src='{{ asset("img/logo.png") }}' />

	<div class="nav">
		<a href=""><img src="{{ asset('img/danos-un-dato.png') }}"></a>
		<a href=""><img src="{{ asset('img/busca-un-dato.png') }}"></a>
	</div>

	<h2 class="title">{{ __("Destacado") }}</h2>
	<p class="intro">¡Todos estos datos son entregados por usuarios como ustedes, somos una verdadera comunidad!</p>

	<section class="datos">
		@foreach ($tips as $tip)
		<div class="dato-small">
			<span class="nombre">Nombre del tip</span>
			<div class="img"><img src=""></div>
			<div class="meta">
				<span class="author">Por: Gonzalo Z.</span>
				<span class="city">Santiago</span>
				<span class="type">Comida</span>
			</div>
			<div class="text">Texto de ejemplo</div>
			<div class="rating">
				<span class="mark active"></span>
				<span class="mark active"></span>
				<span class="mark active"></span>
				<span class="mark"></span>
				<span class="mark"></span>
			</div>
			<a class="go-btn" href="{{ action('TipController@view',1) }}">{{ trans("Leer más") }}</a>
		</div>
		@endforeach
	</section>
</div>
@stop