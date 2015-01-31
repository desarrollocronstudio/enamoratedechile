@extends("layouts/default")
@section('page_title','Datos Destacados')
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
	<div class="intro-box">
        <h2 class="title">{{ __("Los datos más populares") }}</h2>
        <p class="intro">
            Estos son los datos que más le han gustado a nuestra comunidad.<br />
            ¡Navégalos y descubre por que son tan famosos!
        </p>
	</div>

	<section class="datos container">
		@foreach ($tips as $tip)
			@include("tips.preview",["tip" => $tip])
		@endforeach
	</section>
	{{ $tips->fragment('view-content')->links() }}
</div>
@stop
