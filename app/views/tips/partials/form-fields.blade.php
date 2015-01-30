{{ Form::hidden('place_lat',null,array("id" => "place_lat")) }}
{{ Form::hidden('place_lng',null,array("id" => "place_lng")) }}
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
   <p>Puedes arrastrar el marcador para precisar mejor la ubicación de tu dato.</p>
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