@extends("layouts/default")
@section('page_title','Titulo')
@section('metatags')
    <meta property="og:url" content="{{ Request::url() }}" /> 
    <meta property="og:title" content="" />
    <meta property="og:description" content="" /> 
    <meta property="og:image" content="" />
@stop
@section('content')
<div class="page" id="view">
	@include("incs/logo")

	<img style="margin:10px 0 " src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<h2 class="city-title">
		Puerto Varas
		<span>Desde 80 lukas</span>
	</h2> 
    
	@include("incs/tip-categories")
	
    <h3 class="lugar">nombre del lugar</h3>
    <h4 class="autor">nombre del autor</h4>
    <div class="detalle_city">
    <h2 class="slide">Imágenes del lugar</h2>
    <ul>
    <li><img src="{{ asset('img/detalle1.jpg') }}"/></li>
    <li><img src="{{ asset('img/detalle2.jpg') }}" /></li>
    <li><img src="{{ asset('img/detalle3.jpg') }}" /></li>
    <li><img src="{{ asset('img/detalle1.jpg') }}"/></li>
    <li><img src="{{ asset('img/detalle2.jpg') }}"/></li>
    <li><img src="{{ asset('img/detalle3.jpg') }}"/></li>
    <li><img src="{{ asset('img/detalle1.jpg') }}" /></li>
    </ul>
    <h2 class="slide">Mapa del lugar</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3329.8482786191244!2d-70.6038805!3d-33.42719969999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf6e080d5f15%3A0x38cf49fd622be98b!2sCarlos+Ant%C3%BAnez!5e0!3m2!1ses!2scl!4v1404687428294" width="850" height="262" frameborder="0" style="border:0"></iframe>
    <h2 class="slide">Si estuviste aquí o te gustó el dato califícalo.</h2>
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