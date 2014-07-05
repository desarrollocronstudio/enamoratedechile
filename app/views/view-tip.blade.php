@extends("layouts/default")
@section('content')
<div class="page" id="home">
	@include("incs/logo")

	<img style="margin:10px 0 " src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<h2 class="city-title">
		{{ __("Punta Arenas") }}
		<span>Desde 80 lukas</span>
	</h2>

	@include("incs/tip-categories")
	<p class="intro">¡Todos estos datos son entregados por usuarios como ustedes, somos una verdadera comunidad!</p>
</div>
@stop