@extends("layouts/default")
@section('content')
<div class="page" id="home">
	@include("incs/logo")

	@include("incs/search-nav")


	<section class="datos">
        <div id="content-form">
            <h1>SUBE TU DATO PARA TODOS PUEDAN ENAMORARSE DE CHILE</h1>
            {{ Form::open() }}
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

            <img src='{{ asset("img/img-form.jpg") }}' />
            <div class="menu-img">
                <input name="" type="radio" value="" checked="checked" /> USAR IMAGEN PREDETERMINADA <br />
                <input name="" type="radio" value="" /> SUBIR IMAGEN
                <p>
                    <a class="bsc-btn" href="{{ action('TipController@view',1) }}">{{ trans("BUSCAR") }}</a>
                </p>
            
            </div>
            <div class="despcripcion-form">
                {{ Form::label("Descripción") }}
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
