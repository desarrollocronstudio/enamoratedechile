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


	<a id="view-content">&nbsp;</a>
	<h2 class="title">{{ __("Los datos más populares") }}</h2>
	<p class="intro">ESTOS SON LOS DATOS Y PICADAS QUE MÁS TE HAN GUSTADO Y QUE HARÁN DE TU PRÓXIMO VIAJE UNA EXPERIENCIA INOLVIDABLE.</p>

	<section class="datos container">
		@foreach ($tips as $tip)
			@include("tips.preview",["tip" => $tip])
		@endforeach
	</section>
	{{ $tips->fragment('view-content')->links() }}
</div>
@stop
