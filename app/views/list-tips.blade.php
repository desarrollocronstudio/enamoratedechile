@extends("layouts/default")
@section('content')
<div class="page" id="search-tips">
	@include("incs/logo")

	<img class="principal" style="margin:10px 0 " src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<a id="view-content"></a>
	<h2 class="city-title">
		{{ $city['name'] }}
		<!--<span>Desde 80 lukas</span>-->
	</h2>
	<!--<a href="" class="black-btn">Cotiza tu pasaje</a>-->
	<p class="info">Estos son los destacados cerca de {{ $city['name'] }}</p>

	@include("incs/tip-categories")
	<!-- Distance: {{ $distance }}kms.-->
	<section class="datos container">
		@if ($tips->count() > 0)
			@foreach ($tips as $tip)
				@include("tips.preview",["tip" => $tip])
			@endforeach
		@else 
			<div class='message'>
				Aún no tenemos tips en este lugar. ¡Se el primero en agregar uno!
			</div>
		@endif
	</section>
	{{ $tips->fragment('anchor-content')->appends(array('cat' => Input::get('cat')))->links() }}
</div>
@stop
@section("js")
<script>
	window.location.hash="view-content";
</script>
@append
