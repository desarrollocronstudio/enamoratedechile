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

	Hola
	<div class="site_intro">
	    <div class="texts">
            <h3>¡Sé parte de esta gran comunidad de datos y picadas de Chile! </h3>
            <p>Busca un dato o entréganos el tuyo y comienza a enamorarte de Chile</p>
	    </div>
	</div>

	@include("incs/search-nav")

	<h2 class="title">{{ __("Los datos más populares") }}</h2>
	<p class="intro">
	    Estos son los datos que más le han gustado a nuestra comunidad.<br />
        ¡Navégalos y descubre por qué son tan famosos!
    </p>

	<section class="datos container">
		@foreach ($tips as $tip)
			@include("tips.preview",["tip" => $tip])
		@endforeach
	</section>
</div>
@stop

@section('js')
<script>
    $(function(){
        if(window.location.hash == "#busca"){
            $(".go-search").click();
        }
    });
</script>
@append