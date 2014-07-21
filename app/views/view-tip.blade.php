@extends("layouts/default")
@section('page_title',ucwords($data['name']))
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
    <a name="tip-data"></a>

    <h3 class="lugar">{{ $data["name"] }}</h3>
    <h4 class="autor">{{ Str::words($data["author"],1) }}</h4>
    <div class="detalle_city">
        <h2 class="slide">Imágenes del lugar</h2>
        <ul class="imgs">
            @foreach($images as $img)
                <li><img src="{{ asset("uploads/$img") }}" alt="{{ $data['name'] }}" /></li>
            @endforeach
        </ul>
        <h2 class="slide">Mapa del lugar</h2>
        <div id="map">

        </div>
        <h2 class="slide recomendacion">Si estuviste aquí o te gustó el dato califícalo.</h2>
        <div class="rating-big">
            <span class="mark" alt="Ahí nomás"></span>
            <span class="mark" alt="Ni chicha ni limoná"></span>
            <span class="mark" alt="Muy piola"></span>
            <span class="mark" alt="Lo repetiría"></span>
            <span class="mark" alt="Me enamoré"></span>
            <label></label>
        </div>
        <div class="shared">
            <a class="ruta" href=""></a>
            <a href="" class="face"></a>
            <a class="tw"></a>
        </div>
    </div>
    <div class="comments">
        <div class="fb-comments" data-width="100%" data-href="{{ Config::get('app.url')."/" }}{{ Request::path() }}" data-numposts="5" data-colorscheme="light"></div>
    </div>
</div>

@stop
@section('js')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript">
  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(-34.397, 150.644),
      zoom: 8,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("map"),mapOptions);
}
</script>
<script type="text/javascript">
    $(function(){
        initialize();
        $('html, body').animate({
            scrollTop: $(".city-title").offset().top
        }, 0);
        $(".face").click(function(){
            FB.ui({
                method: 'share',
                href: '{{ Request::url() }}',
            },function(response) {

            });
        })
        $(".ruta").click(function(){
            var tip_id ='{{ $data["id"] }}';
            $.post("{{ URL::to('/tips/add-to-my-route') }}",{'id':tip_id},function(res){
                alert(res);
            });
            return false;
        });

        $(".rating-big .mark").hover(function(){
            var $mark = $(this);
            for(var i = 0; i <= $(".rating-big .mark").index($mark); i++){
                $(".rating-big .mark:eq("+i+")").addClass("hover")
            }
            $(".rating-big label").html($mark.attr("alt"));
        },function(){
            $(".rating-big .mark").removeClass("hover");
            $(".rating-big label").html("").html($(".rating-big .clicked").attr("alt"));
        }).click(function(){
            $(".rating-big .mark").removeClass("active").removeClass("clicked");
            var $mark = $(this).addClass("clicked");
            for(var i = 0; i <= $(".rating-big .mark").index($mark); i++){
                $(".rating-big .mark:eq("+i+")").addClass("active")
            }
        })


    });
</script>
@append