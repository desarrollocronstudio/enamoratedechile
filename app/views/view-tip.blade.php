@extends("layouts/default")
@section('page_title','Titulo')
@section('metatags')
    <meta property="og:url" content="{{ Request::url() }}" /> 
    <meta property="og:title" content="Visita {{ $data['name'] }} en {{ $data['place_name'] }}" />
    <meta property="og:description" content="{{ $data['content'] }}" /> 
    <meta property="og:image" content="" />
@stop
@section('content')
<div class="page" id="view">
	@include("incs/logo")

	<img style="margin:10px 0 " class="principal"  src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<h2 class="city-title">
		Puerto Varas
		<span>Desde 80 lukas</span>
	</h2> 
    
	@include("incs/tip-categories")
	
    <h3 class="lugar">{{ $data["name"] }}</h3>
    <h4 class="autor">{{ $data["author"] }}</h4>
    <div class="detalle_city">
    <h2 class="slide">Imágenes del lugar</h2>
    <ul class="imgs">
        @foreach($images as $img)
            <li><img src="{{ asset("uploads/$img") }}"/></li>
            <li><img src="{{ asset("uploads/$img") }}"/></li>
            <li><img src="{{ asset("uploads/$img") }}"/></li>
            <li><img src="{{ asset("uploads/$img") }}"/></li>
            <li><img src="{{ asset("uploads/$img") }}"/></li>
            <li><img src="{{ asset("uploads/$img") }}"/></li>
        @endforeach
    </ul>
    <h2 class="slide">Mapa del lugar</h2>
    <iframe src="https://www.google.com/maps/embed?q=Darío+urzua+2021" width="850" height="262" frameborder="0" style="border:0"></iframe>
    <h2 class="slide recomendacion">Si estuviste aquí o te gustó el dato califícalo.</h2>
    <div class="rating">
				<span class="mark active"></span>
				<span class="mark active"></span>
				<span class="mark active"></span>
				<span class="mark"></span>
				<span class="mark"></span>
			</div>
            <div class="shared">
            <a class="ruta"></a>
            <a href="" class="face"></a>
            <a class="tw"></a>
            </div>
    </div>
    <div class="fb-comments" data-href="{{ Config::get('app.url')."/" }}{{ Request::path() }}" data-numposts="5" data-colorscheme="light"></div>
</div>
<script type="text/javascript">
    $(".face").click(function(){
        FB.ui({
            method: 'share',
            href: '{{ Request::url() }}',
        },function(response) {
           
        });
    })
</script>
@stop