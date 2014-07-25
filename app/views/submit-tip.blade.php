@extends("layouts/default")
@section('content')
<div class="page" id="submit-tip">
	@include("incs/logo")

	@include("incs/search-nav")

    <section class="datos">
        <div id="content-form">
            <h1>SUBE TU DATO PARA TODOS PUEDAN ENAMORARSE DE CHILE</h1>
            {{ Form::open(array("files" => true)) }}
            {{ Form::hidden('place_lat',null,array("id" => "place_lat")) }}
            {{ Form::hidden('place_lng',null,array("id" => "place_lng")) }}
            <div class="form-in">
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
                    <div class="message" style='margin:40px 10px'>
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
                                "placeholder" => "Comienza a escribir el nombre de la ciudad...",
                                "required"
                            ]); }}
                        </span>
                    </div>
                    <span class="dato-in">
                        {{ Form::label("Nombre del lugar") }}
                        {{ Form::text('place_name','',array("placeholder" => "Onde'l Pala","required")); }}
                    </span>
                    <span class="dato-in">
                        {{ Form::label("Cateogría") }}<br />
                        {{ Form::select('tip_category',$categories,array("required")); }}
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

                    <img id="place_photo" data-default='{{ asset("img/img-form.jpg") }}' src='{{ asset("img/img-form.jpg") }}' />
                    <div class="menu-img">

                        {{ Form::radio("image_type[]",'default',true,array("id" => "default_image")) }}
                        {{ Form::label("default_image","USAR IMAGEN PREDETERMINADA") }} 
                        <br />
                        {{ Form::radio("image_type[]",'custom','',array("id" => "custom_image")) }}
                        {{ Form::label("custom_image","SUBIR IMAGEN") }} 
                        
                        <div class="image_upload_box">
                            <a class="bsc-btn" href="">{{ trans("BUSCAR") }}</a>
                            {{ Form::file("image",array("accept" => "image/*","id" => "image_file_input")) }}
                            <span id="file_name_value"></span>
                        </div>

                    </div>
                    <div class="despcripcion-form">
                        {{ Form::label("DESCRIPCIÓN") }}
                        <br />
                        {{ Form::textarea("description",null,array("class" => "area-form","placeholder" => "ESTE LUGAR ES UNA EXCELENTE PICADA PARA COMER EN FAMILIA Y CON LOS AMIGOS, ESTA UBICADA EN EL MERCADO DE CHILLÁN. BUENO, BONITO Y BARATO.")) }}    



                    </div>

                    <div class="btn-enviar">
                        <input type="submit" class="btn-envia-dato" value="SUBE TU DATO" />
                    </div>

                    <div class="dato-picada">*LA INFORMACIÓN QUE NOS ENTREGUES EN ESTE SITIO SERÁ PARA PROPORCIONAR DATOS ÚTILES A LA COMUNIDAD</div>
                @endif
            </div>
        </div>
        {{ Form::token() . Form::close() }}
    </div>
</section>
</div>
@stop
@section('js')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
<script type="text/javascript" src="{{ asset('js/vendor/jquery.geocomplete.js') }} "></script>
<script type="text/javascript">
    var map = false;
    var marker = false;
    @unless (Auth::check()) 
        show_popup("signup",null,null,false);
    @endunless

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
            $("#file_name_value").html(this.value.substr(this.value.lastIndexOf("\\")+1,15));
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
            location:"Santiago, Chile",
            componentRestrictions:{country: 'cl'},
            markerOptions: {
                draggable: true
            }
        });
        var map = $(".autocomplete input[type=text]").geocomplete("map");
        map.setZoom(16);

        //initialize_map();
    }).bind("geocode:result", function(event, result){
        console.log(result);
        var city = false;
        $.each(result.address_components, function (i, address_component) {
            if (address_component.types[0] == "locality"){
                city=address_component.long_name;
            }
        });
        
        if(city==false){
            console.log("vaciooo");
            $(".autocomplete input[type=text]").geocomplete("find","Santiago, Chile");
            return false;
        }
        $("#city_name").val(city);
        $("#place_lat").val(result.geometry.location.k);
        $("#place_lng").val(result.geometry.location.B);

        
    }).bind("geocode:dragged", function(event, latLng){ 
        $(".autocomplete input[type=text]").geocomplete("find", latLng.toString());
    });
    $(document).bind("fb_load",function(){
        
    });

    
    $(document).bind("position_changed",function(e,lat,lng){
        $("#place_lat").val(lat);
        $("#place_lng").val(lng);
    })
</script>
@append
