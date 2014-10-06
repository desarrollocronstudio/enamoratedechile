@extends("layouts/default")
@section('metatags')
	<meta property="og:url" content="{{ URL::to('/?i=1') }}" /> 
	<meta property="og:title" content="Enámorate de Chile - LAN.com" />

	<meta property="og:description" content="Encuentra los mejores datos a lo largo de todo Chile, y hazte parte de nuestra comunidad dejando los tuyos." /> 
	<meta property="og:image" content="{{ asset('img/logo-square.png') }}" />
@stop

@section('content')
<div class="page" id="my_route">
	@include("incs/logo")


	<a id="view-content">&nbsp;</a>
	<h2 class="city-title">{{ __("Mis favoritos") }}</h2>

	@if (Auth::check())
    	<h3 class="ruta">¡Hola, {{{ Str::words(Auth::user()->name,1,'') }}}!</h3>
	@endif

	<p class="intro">Estos son los datos y picadas que más te han gustado y que harán de tu próximo viaje una
	experiencia inolvidable.</p>
	@if (Session::has('saved_route'))
	<div class="message container">
		Este tip ha sido guardado satisfactoriamente en tus rutas.
	</div>
	@endif

	<section class="datos container">
		@if (count($tips) > 0)
			@foreach ($tips as $tip)
				@include("tips.preview",["tip" => $tip])
			@endforeach
		@else 
			<div class='message'>
				Aún no agregas datos en este lugar. ¡Ahora puede ser el momento de hacerlo!<br />
				<a href="{{ action('featured') }}#view-content">Ver datos destacados</a>
			</div>
		@endif
	</section>

	@if (count($tips) > 0)
		{{ $tips->fragment('view-content')->links() }}
	@endif
</div>
@stop