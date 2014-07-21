@extends("layouts/default")

@section('content')
<div class="page" id="home">
	@include("incs/logo")

	@include("incs/search-nav")

	<h2 class="title">{{ __("Destacados") }}</h2>
	<p class="intro">¡Todos estos datos son entregados por usuarios como ustedes, somos una verdadera comunidad!</p>

	<section class="datos container">
		@foreach ($tips as $tip)
		<div class="dato-small">
			<span class="nombre">{{ $tip["name"] }}</span>
			<div class="img"><img src="uploads/{{ $tip["image"] }}"></div>
			<div class="meta">
				<span class="author">Por: {{ $tip["author"] }}</span>
				<span class="city">{{ $tip["place_name"] }}</span>
				<span class="type">{{ $tip["category_name"]}}</span>
			</div>
			<div class="text">{{ substr($tip["content"], 0, 100) }}</div>
			<div class="rating">
				<span class="mark active"></span>
				<span class="mark active"></span>
				<span class="mark active"></span>
				<span class="mark"></span>
				<span class="mark"></span>
			</div>
			<a class="red-btn" href="{{ action('TipController@view',array($tip['id'])) }}">{{ trans("Leer más") }}</a>
		</div>
		@endforeach
	</section>
</div>
@stop
