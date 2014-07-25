@extends("layouts/default")
@section('metatags')
<meta property="og:url" content="{{ URL::to('/?i=1') }}" /> 
<meta property="og:title" content="Enámorate de Chile - LAN.com" />

<meta property="og:description" content="Encuentra los mejores datos a lo largo de todo Chile, y hazte parte de nuestra comunidad dejando los tuyos." /> 
<meta property="og:image" content="{{ asset('img/logo.png') }}" />
@stop

@section('content')
<div class="page" id="home">
	@include("incs/logo")

	<img style="margin:10px 0 " class="principal"  src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<h2 class="title">{{ __("Destacados") }}</h2>
	<p class="intro">¡Todos estos datos son entregados por usuarios como ustedes, somos una verdadera comunidad!</p>

	<section class="datos container">
		@foreach ($tips as $tip)
			@include("tips.preview",["tip" => $tip])
		@endforeach
	</section>
</div>
@stop
