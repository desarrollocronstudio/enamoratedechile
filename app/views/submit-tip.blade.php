@extends("layouts/default")
@section('page_title','Sube tu dato')
@section('content')
<div class="page" id="submit-tip">
	@include("incs/logo")

    <section class="datos">
        <div id="content-form">
            <H1>ENTRÉGANOS TU DATO PARA QUE TODOS PUEDAN ENAMORARSE DE CHILE</H1>
            {{ Form::open(array("route" => 'save_tip',"files" => true,"id" => "submit-form")) }}
            {{ Form::hidden('place_lat',null,array("id" => "place_lat")) }}
            {{ Form::hidden('place_lng',null,array("id" => "place_lng")) }}
            <div class="form-in">
                @if ( !Auth::check() )
                    <div class="message warning">
                        Debes iniciar sesión para poder incribir tu dato. 
                    </div>
                @endif
                @if ( $errors->count() > 0 )
                <div class="errors">
                    <p><strong>Se encontraron los siguientes errores:</strong></p>
                    <ul>
                        @foreach( $errors->all() as $message )
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ( Session::has('tip_saved') )
                    <div class="message">
                        Tu dato ha sido guardado exitosamente. ¡Gracias!
                    </div>
                @else
                    <div class="autocomplete">
                        <span class="dato-in large">
                            {{ Form::label("¿Dónde es tu dato?") }}<br />
                            {{ Form::hidden('city','',
                                ["required","id" => "city_name"]); 
                            }}
                            {{ Form::text('city_search','',[
                                "placeholder" => "Comienza a escribir la dirección del lugar...",
                                "required"
                            ]); }}
                        </span>
                    </div>
                    <span class="dato-in">
                        {{ Form::label("Nombre del lugar") }}
                        {{ Form::text('place_name','',array("placeholder" => "Onde'l Pala","required")); }}
                    </span>
                    <span class="dato-in">
                        {{ Form::label("Categoría") }}<br />
                        {{ Form::select('tip_category',['' => "Seleccione una categoría"]+$categories,null,array("required",'data-img-source' => URL::to('/category/{id}/pictures') )); }}
                    </span>
                    <div class="precisar">
                       <p>Puedes arrastrar el marcados para precisar mejor la ubicación de tu dato.</p>
                    </div>
                    <div id="map-container">
                        <div id="map">
                                
                        </div>
                    </div>
                    <div class="dato-picada">
                        *SI TU DATO O PICADA ESTÁ CERCA DE UNA CIUDAD Y NO<br />
                        EN ELLA EXACTAMENTE, ESCRÍBELO EN LA DESCRIPCIÓN
                    </div>

                    <div class="available_pictures">

                    </div>
                    {{ Form::hidden("default_picture",null,['id' => 'default_picture']) }}

                    <div class="menu-img">
                        <div class="option">
                            {{ Form::radio("image_type",'default',true,array("id" => "default_image")) }}
                            {{ Form::label("default_image","USAR IMAGEN PREDETERMINADA") }}
                        </div>
                        <div class="option">
                            {{ Form::radio("image_type",'custom','',array("id" => "custom_image")) }}
                            {{ Form::label("custom_image","SUBIR IMAGEN") }}
                        </div>

                        <div class="image_upload_box">
                            <a class="bsc-btn" href="">{{ trans("BUSCAR") }}</a>
                            {{ Form::file("image",array("accept" => "image/*","id" => "image_file_input")) }}
                            <span id="file_name_value"></span>
                        </div>

                    </div>
                    <div class="despcripcion-form">
                        {{ Form::label("DESCRIPCIÓN") }}
                        <br />
                        {{ Form::textarea("description",null,array("class" => "area-form","placeholder" =>
"EJEMPLO:

ESTE LUGAR ES UNA EXCELENTE PICADA PARA COMER EN FAMILIA Y CON LOS AMIGOS, ESTÁ UBICADA EN EL MERCADO DE CHILLÁN.

BUENO, BONITO Y BARATO.")) }}



                    </div>

                    <div class="btn-enviar">
                        <input type="submit" class="btn-envia-dato" value="SUBE TU DATO" />
                    </div>

                    <div class="dato-picada">*LA INFORMACIÓN QUE NOS ENTREGUES EN ESTE SITIO SERÁ PARA PROPORCIONAR DATOS ÚTILES A LA COMUNIDAD</div>
                @endif
            </div>

            {{ Form::token() . Form::close() }}
        </div>
    </div>
</section>
</div>
@stop
@section('js')
<script type="text/javascript">
    var map = false;
    var marker = false;
    var waiting_signin = false;
    var loged = {{ Auth::check()?"true":"false" }};

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#place_photo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function(){
        $("#custom_image,#default_image").change(function(){
            if($("#custom_image").is(":checked")){
                $(".image_upload_box").show();
                $("#image_file_input").attr("disabled",false);
                if($('#place_photo').data("last-src")){
                    $('#place_photo').attr("src",$('#place_photo').data("last-src"));
                }
            }else{
                $(".image_upload_box").hide();
                $("#image_file_input").attr("disabled","disabled");
                $('#place_photo').data("last-src",$('#place_photo').attr("src")).attr("src",$('#place_photo').data("default"));
            }
        })
        $("#default_image").trigger("change");
        $(".bsc-btn").click(function(){
            $("#image_file_input").click();
            return false;
        });
        $("#image_file_input").change(function(){
            readURL(this);
            $("#file_name_value").html(this.value.substr(this.value.lastIndexOf("\\")+1,55));
        })
        /*$(".autocomplete input[type=text]").autocomplete({
          source: "get-cities",
          minLength: 2,
          delay:100,
          select: function( event, ui ) {
            var $hidden = $(this).parent().find("[type=hidden]");
            if(ui.item){
               $hidden.val(ui.item.id);
            }else{
                $hidden.val("");
            }
            get_geo(ui.item.value+",chile",function(status,pos){
                if(status)change_pos(pos[0],pos[1]);
            });
          }
        });*/
        $(".autocomplete input[type=text]").geocomplete({
            map: "#map",
            mapOptions: {
                zoom: 14
            },
            componentRestrictions:{country: 'cl'},
            markerOptions: {
                draggable: true
            }
        });
        var map = $(".autocomplete input[type=text]").geocomplete("map");
        map.setZoom(16);

        //initialize_map();
    }).bind("geocode:result", function(event, result){
        //console.log(result);
        var city = false;
        $.each(result.address_components, function (i, address_component) {
            if (address_component.types[0] == "locality"){
                city=address_component.long_name;
            }
        });
        
        if(city==false){
            
            $(".autocomplete input[type=text]").geocomplete("find",'Santiago, Chile');
            return false;
        }
        $("#city_name").val(city);
        $("#place_lat").val(result.geometry.location.lat());
        $("#place_lng").val(result.geometry.location.lng());

        
    }).bind("geocode:dragged", function(event, latLng){ 
        $(".autocomplete input[type=text]").geocomplete("find", latLng.toString());
    });
    $(document).bind("fb_load",function(){
        
    });

    function change_available_pictures(id){
        if(id == '')return false;

        $ap = $(".available_pictures").hide().html("");
        $("#default_picture").val("");
        var url = $("[name=tip_category]").data("img-source");
        url = url.replace("{id}",id);

        $.get(url,function(data){
            for(var i in data.images){
                var img = data.images[i];
                //console.log(img);
                $ap.append("<img src='{{ URL::to('img/default')."/" }}"+img+"' alt='' />");
            }
            $ap.fadeIn(500);
        },"json");
    }
    $("#submit-tip").on("click",".available_pictures img",function(e){
        $(this).addClass("selected").siblings().removeClass("selected");
        var index = $(".available_pictures img").index(this);
        $("#default_picture").val(index);
        e.preventDefault();
    });

    var sending_form = false;
    $("#submit-form").submit(function(e){
        if(!loged){
            waiting_signin = true;
            show_popup("signup",null,null,true);
            e.preventDefault();
        }

        if(sending_form== true)return false;
        sending_form = true;
    });

    $("[name=tip_category]").change(function(){
        change_available_pictures(this.value);
    });
    change_available_pictures($("[name=tip_category]").val());
    
    $(document).bind("position_changed",function(e,lat,lng){
        $("#place_lat").val(lat);
        $("#place_lng").val(lng);
    })

$(function(){
    $("body").unbind("connected");
    $("body").bind("connected",function(){
        loged = true;
       if(waiting_signin){
        $("#submit-form").submit();
       }
    });
})

</script>
@append
