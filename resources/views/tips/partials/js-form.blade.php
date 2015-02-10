<script type="text/javascript">
    var map = false;
    var marker = false;
    var waiting_signin = false;
    var loged = {{ Auth::check()?"true":"false" }};
    var closedScopeAdress = false;

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
        var $autocomplete_input =  $(".autocomplete input[type=text]");

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
        });
        $("#default_image").trigger("change");
        $(".bsc-btn").click(function(){
            $("#image_file_input").click();
            return false;
        });
        $("#image_file_input").change(function(){
            readURL(this);
            $("#file_name_value").html(this.value.substr(this.value.lastIndexOf("\\")+1,55));
        });

        $("[name=image_type]").change(function(){
            if(this.value == 'custom')
            {
                $(".available_pictures").hide();
            }else{
                $(".available_pictures").show();
            }
        });
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


        $autocomplete_input.geocomplete({
            map: "#map",
            mapOptions: {
                zoom: 14
            },
            componentRestrictions:{country: 'cl'},
            markerOptions: {
                draggable: true
            },
            types:['geocode','establishment']
        }).bind("geocode:result", function(event, result){
            var country = get_locality_name_from_result(result,['country'],true);
            if(country.short_name != 'CL')
            {
                 $autocomplete_input.geocomplete("find","Santiago, Chile");
            }

            closedScopeAdress = get_locality_name_from_result(result,['route','street_number'])!=false;
            if(!closedScopeAdress)
            {
                $(".too-general").show();
            }else{
                $(".too-general").hide();
            }
            var city = get_locality_name_from_result(result);
            $("#city_name").val(city);
            $("#place_lat").val(result.geometry.location.lat());
            $("#place_lng").val(result.geometry.location.lng());

        }).bind("geocode:dragged", function(event, latLng){
            $autocomplete_input.geocomplete("find", latLng.toString());
        })


        var map = $autocomplete_input.geocomplete("map");
        var value = $autocomplete_input.val();
        if(value != ''){
            $autocomplete_input.geocomplete("find",value);
        }
        map.setZoom(16);

    //initialize_map();
    });

    $(document).bind("fb_load",function(){
        
    });

    function change_available_pictures(id){
        if(id == '')return false;

        $ap = $(".available_pictures").html("");
        $("#default_picture").val("");
        var url = $("[name=tip_category]").data("img-source");
        url = url.replace("{id}",id);

        $.get(url,function(data){
            for(var i = 0; i < data.images.length; i++){
                var img = data.images[i];
                $ap.append("<img src='{{ URL::to('img/default')."/" }}"+img+"' alt='' />");
            }
            //$ap.fadeIn(500);
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
        }else{
            if(!closedScopeAdress)
            {
                if(!confirm("La dirección ingresada es poco detallada. Es probable que no aprobemos tu dato si no colocas instrucciones sobre como llegar. Para editarla, presiona cancelar. Para continuar de todas formas, presiona aceptar."))
                    return false;
            }
            if(sending_form== true)return false;
            sending_form = true;
        }
        return true;
    });

    $("[name=tip_category]").change(function(){
        change_available_pictures(this.value);
    });
    change_available_pictures($("[name=tip_category]").val());
    
    $(document).bind("position_changed",function(e,lat,lng){
        $("#place_lat").val(lat);
        $("#place_lng").val(lng);
    });

$(function(){
    $("body").unbind("connected");
    $("body").bind("connected",function(){
        loged = true;
       if(waiting_signin){
        $("#submit-form").submit();
       }
    });

    $("[name=image_type]:selected").change();
})

</script>