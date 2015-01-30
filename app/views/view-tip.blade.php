@extends("layouts/default")
@section('page_title',ucwords($tip->name))
@section('metatags')
    <meta property="og:url" content='{{{ Request::url() }}}' />
    <meta property="og:title" content="Visita {{{ $tip->name }}} en {{ $tip->city_name }}" />

    <meta property="og:description" content="{{{ $tip->content }}}" />
    <meta property="og:image" content="{{ $tip->image() }}" />
@stop
@section('content')
<div class="page" id="view">
	@include("incs/logo")

    <div class="intro-box">
        <h2 class="title">
            {{{ $tip->city_name }}}
            <!--<span>Desde 80 lukas</span>-->
        </h2>
    </div>

	@include("incs/tip-categories",['active' => $tip->type_id,'usable' => true,'from' => 'tip','tip' => $tip])
    <a name="tip-data"></a>

    <div class="detalle_city">
         <h3 class="lugar">{{{ $tip->name }}}</h3>
        <h4 class="autor">{{{ Str::words($tip->author->name,1,'') }}}</h4>

        <div class="images">
            <h2 class="slide">Imágenes del lugar</h2>
            <ul class="imgs">
                @foreach($tip->images() as $img)
                    <li><a href="{{ $img }}" rel="shadowbox[gal]">
                        <img src="{{ $img }}" alt="{{{ $tip['name'] }}}" />
                    </a></li>
                @endforeach
            </ul>
        </div>
        <div class="detail">
            <h2 class="slide">Detalle</h2>
            <p>{{{ $tip->content }}}</p>
        </div>
        <h2 class="slide">Mapa del lugar</h2>
        <span class="address">{{ $tip->place_name }}</span>
        <div id="map">

        </div>

        <h2 class="slide recomendacion">
            @if (!$already_voted)
                Si estuviste aquí o te gustó el dato califícalo.
            @endif
        </h2>
        <div class="rating-big">
            <span class="mark" alt="Ni chicha ni limoná"></span>
            <span class="mark" alt="Piola"></span>
            <span class="mark" alt="Está bacán"></span>
            <span class="mark" alt="Lo recomiendo"></span>
            <span class="mark" alt="Me enamoré"></span>
            <label></label>
            @if ($already_voted)
                <img class="already_voted" src="{{ asset('img/already-rated.png') }}" alt="Ya calificaste este dato" />
            @endif

        </div>
        <div class="rating-count">
            <img src="{{ asset('img/black-heart.png') }}" alt="" />
            <span>
                @if ($total_reviews == 0)
                    Este dato aún no ha sido calificado ¡Sé el primero!
                @elseif ($total_reviews > 0)
                    Este dato ha sido calificado {{ $total_reviews." ".(($total_reviews > 1)?"veces":"vez") }}
                @endif

            </span>
        </div>
        <div class="shared">
            @if($show_add_route_button)
                {{ Form::open(['action' => ['add_to_route',$tip->id]]) }}
                    <input type="submit" class="ruta" />
                {{ Form::close(); }}
            @endif
            @if($canShare)
                <a href="" class="face"></a>
                <a class="tw"></a>
            @endif

        </div>
    </div>
    <div class="comments">
        <div class="fb-comments" data-width="100%" data-href="{{{ Config::get('app.url')."/" }}}{{{ Request::path() }}}" data-numposts="5" data-colorscheme="light"></div>
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
            title:"{{{ $tip->name }}}"
        });
    }
</script>
<script type="text/javascript">
var current_rating = Math.round({{ $tip->rating_cache }});
var already_rated = {{ ($already_voted)?"true":"false"; }};
$(function(){

    initialize();
    $('html, body').animate({
        scrollTop: $(".title").offset().top
    }, 0);
    $(".ruta").click(function(){
        return;
        var tip_id ='{{ $tip->id }}';
        $.post("{{ URL::to('/tips/add-to-my-route/'.$tip->id) }}",function(res){
            alert(res);
        });
        return false;
    });

    $(".rating-big .mark").hover(function(){
        if($(".rating-big").hasClass("disabled"))return false;

        var $mark = $(this);
        for(var i = 0; i <= $(".rating-big .mark").index($mark); i++){
            $(".rating-big .mark:eq("+i+")").addClass("hover")
        }
        $(".rating-big label").html($mark.attr("alt"));
    },function(){
        if($(".rating-big").hasClass("disabled"))return false;

        $(".rating-big .mark").removeClass("hover");
        set_rating_text();//$(".rating-big label").html("").html($(".rating-big .clicked").attr("alt"));
    }).click(function(){
        var index = $(".rating-big .mark").index(this);
        set_rating(index+1);
        post_rating(index);
    })

    if(current_rating >= 1){
        set_rating(current_rating);
    }


    if(already_rated){
        $(".rating-big").addClass("disabled");
    }

});

function set_rating_text(){
    $mark = $(".rating-big .active:last");
    $(".rating-big label").html($mark.attr("alt"));
}
function set_rating(num){
    if($(".rating-big").hasClass("disabled"))return false;

    $(".rating-big .mark").removeClass("active").removeClass("clicked");

    var $mark = false;
    for(var i = 0; i <= num-1; i++){
        $mark = $(".rating-big .mark:eq("+i+")").addClass("active");
    }

    if($mark){
        set_rating_text()//$(".rating-big label").html($mark.attr("alt"));
    }

}
function post_rating(rating){
    if($(".rating-big").hasClass("disabled"))return false;

    $.post("{{ action('post_rating',$tip->id) }}",{rating:rating+1},function(res){
        $(".rating-big label").html(res.msg);
        if(res.status){
            window.location.reload();
        }else{

        }
    },"json");
}
Shadowbox.init();
</script>
@append