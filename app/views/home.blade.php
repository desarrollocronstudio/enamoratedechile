@extends("layouts/default")
@section('metatags')
	<meta property="og:url" content="{{ URL::to('/?i=1') }}" /> 
	<meta property="og:title" content="Enámorate de Chile - LAN.com" />

	<meta property="og:description" content="Encuentra los mejores datos a lo largo de todo Chile, y hazte parte de nuestra comunidad dejando los tuyos." /> 
	<meta property="og:image" content="{{ asset('img/logo-square.png') }}" />
@stop

@section('content')
<div class="page" id="home">
	@include("incs/logo")

	<div class="intro-forrest">
	    <p>Buscando a mi polola, me terminé enamorando de Chile. Enamórate tu también con estos increíbles datos.</p>
	</div>


	@include("incs/search-nav")

	<div class="intro-box">
        <h2 class="title">{{ __("Datos más vistos") }}</h2>
        <p class="intro">
            Antes de enamorarse hay que pinchar.<br />
            Pincha en algunos de estos datos o picadas y deja que cupido haga su pega.
        </p>
    </div>

	<section class="datos container">
		@foreach ($tips as $tip)
			@include("tips.preview",["tip" => $tip])
		@endforeach
	</section>
</div>
@stop
