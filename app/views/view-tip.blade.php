@extends("layouts/default")
@section('content')
<div class="page" id="view">
	@include("incs/logo")

	<img style="margin:10px 0 " src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<h2 class="city-title">
		Puerto Varas
		<span>Desde 80 lukas</span>
	</h2> 
    
	@include("incs/tip-categories")
	
    <h3 class="lugar">nombre del lugar</h3>
    <h4 class="autor">nombre del autor</h3>
    <p class="intro">¡Todos estos datos son entregados por usuarios como ustedes, somos una verdadera comunidad!</p>
</div>
@stop