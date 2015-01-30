@extends("...layouts.default")
@section('page_title','Datos en '.$city['name'])
@section('content')
<div class="page" id="search-tips">
	@include("...incs.logo")

	<a id="view-content"></a>
	<span class="cerca">Datos Cerca de</span>
	<h2 class="title">
		{{ $city['name'] }}
		<!--<span>Desde 80 lukas</span>-->
	</h2>

	@include("...incs.tip-categories",['active' => Input::get('cat'),'usable' => true])
	<p class="info">Estos son los datos que te van a robar el corazón cerca de <span>{{ $city['name'] }}</span></p>
	<!-- Distance: {{ $distance }}kms.-->
	<section class="datos container">
		@if ($tips->count() > 0)
			@foreach ($tips as $tip)
				@include("preview",["tip" => $tip])
			@endforeach
		@else 
			<div class='message'>
				Aún no tenemos tips en este lugar. ¡Se el primero en agregar uno!
			</div>
		@endif
	</section>
	{{ $tips->fragment('anchor-content')->appends(array('cat' => Input::get('cat')))->links() }}

	<a href="http://www.lan.com" class="black-btn cotizar">Cotiza tu pasaje</a>
</div>
@stop
@section("js")
<script>
	window.location.hash="view-content";
</script>
@append
