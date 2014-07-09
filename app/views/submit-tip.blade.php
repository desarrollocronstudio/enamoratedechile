@extends("layouts/default")
@section('content')
<div class="page" id="submit-tip">
	@include("incs/logo")

	@include("incs/search-nav")

    <div class="facebox">
        <h4>Conéctate con Facebook para rellenar los campos solicitados</h4>
    </div>
	<section class="datos">
        <div id="content-form">
            <h1>SUBE TU DATO PARA TODOS PUEDAN ENAMORARSE DE CHILE</h1>
            {{ Form::open(array("files" => true)) }}
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
                    <div class="message">
                    Tu dato ha sido guardado exitosamente. ¡Gracias!
                    </div>
                @endif
                <span class="dato-in">
                    {{ Form::label("Nombre") }}<br />
                    {{ Form::text('name','',array("placeholder" => "Carlos Ríos","required")); }}
                </span>
                <span class="dato-in">
                    {{ Form::label("Email") }}<br />
                    {{ Form::text('email','',array("placeholder" => "carlos@mail.com","required")); }}
                </span>
                <span class="dato-in">
                    {{ Form::label("R.U.T.") }}<br />
                    {{ Form::text('rut','',array("placeholder" => "12345678-9","required")); }}
                </span>
                <span class="dato-in">
                    {{ Form::label("Email") }}<br />
                    {{ Form::text('email','',array("placeholder" => "carlos@mail.com","required")); }}
                </span>
                <span class="dato-in">
                    {{ Form::label("¿Dónde es tu dato?") }}<br />
                    {{ Form::text('city','',array("placeholder" => "Ej. Chillán","required")); }}
                </span>
                <span class="dato-in">
                    {{ Form::label("Región") }}<br />
                    {{ Form::select('region',$regions,array("required")); }}
                </span>
                 <span class="dato-in">
                    {{ Form::label("Nombre del lugar") }}
                    {{ Form::text('place_name','',array("placeholder" => "Onde'l Pala","required")); }}
                </span>
                <span class="dato-in">
                    {{ Form::label("Cateogría") }}<br />
                    {{ Form::select('tip_category',$categories,array("required")); }}
                </span>
                <div class="dato-picada">*SI TU DATO O PICADA ESTÁ CERCA DE UNA CIUDAD Y NO <br />
            EN ELLA EXACTAMENTE, ESCRÍBELO EN LA DESCRIPCIÓN</div>

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

        </div>
        {{ Form::token() . Form::close() }}
    </div>
</section>
</div>
@stop
@section('js')
    <script type="text/javascript">
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

    })
    </script>
@append
