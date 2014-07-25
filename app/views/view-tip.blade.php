@extends("layouts/default")
@section('page_title',ucwords($tip->name))
@section('metatags')
<meta property="og:url" content="{{ Request::url() }}" /> 
<meta property="og:title" content="Visita {{ $tip->name }} en {{ $tip->city_name }}" />

<meta property="og:description" content="{{ $tip->content }}" /> 
<meta property="og:image" content="{{ $tip->image() }}" />
@stop
@section('content')
<div class="page" id="view">
	@include("incs/logo")

	<img style="margin:10px 0 " class="principal"  src="{{ asset('img/img-top-home.jpg') }}" alt="Bienvenido a " />

	@include("incs/search-nav")

	<h2 class="city-title">
		{{ $tip->city_name }}
		<!--<span>Desde 80 lukas</span>-->
	</h2> 

	@include("incs/tip-categories")
    <a name="tip-data"></a>

    <h3 class="lugar">{{ $tip->name }}</h3>
    <h4 class="autor">{{ Str::words($tip->author->name,1,'') }}</h4>
    <div class="detalle_city">
        <h2 class="slide">Imágenes del lugar</h2>
        <ul class="imgs">
            @foreach($tip->images() as $img)
                <li><img src="{{ $img }}" alt="{{ $tip['name'] }}" /></li>
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
        var pos = new google.maps.LatLng({{ $tip->lat }}, {{ $tip->lng }});
        var mapOptions = {
          center: pos,
          zoom: 15,
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"),mapOptions);
        var marker = new google.maps.Marker({
            position: pos,
            map: map,
            title:"{{ $tip->name }}"
        });
    }
</script>
<script type="text/javascript">
var current_rating = Math.round({{ $tip->rating_cache }});
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
        return false;
    })
    $(".ruta").click(function(){
        var tip_id ='{{ $tip->id }}';
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
        var index = $(".rating-big .mark").index(this);
        set_rating(index+1);
        post_rating(index);
    })

    if(current_rating >= 1){
        set_rating(current_rating);
    }

    function set_rating(num){
        $(".rating-big .mark").removeClass("active").removeClass("clicked");
        var $mark = $(this).addClass("clicked");
        
        for(var i = 0; i <= num-1; i++){
            $(".rating-big .mark:eq("+i+")").addClass("active")
        }
    }
});
function post_rating(rating){
    $.post("{{ action('post_rating',$tip->id) }}",{rating:rating+1},function(res){
        $(".rating-big label").html(res.msg);
        if(res.status){

        }else{

        }
    },"json");
}
</script>
@append