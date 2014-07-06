@extends("layouts/default")
@section('content')
<div class="page" id="search-tips">
	@include("incs/logo")

	<img style="margin:10px 0 " src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	
	<h2 class="city-title">
		{{ $city['name'] }}
		<span>Desde 80 lukas</span>
	</h2>
	<a href="" class="black-btn">Cotiza tu pasaje</a>
	<p class="info">Estos son los destacados en {{ $city['name'] }}</p>

	@include("incs/tip-categories")
	<section class="datos container">
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
			<a class="red-btn" href="{{ action('TipController@view',1) }}">{{ trans("Leer más") }}</a>
		</div>
		@endforeach
	</section>
</div>
@stop
