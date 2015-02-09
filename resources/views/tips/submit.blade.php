@extends("layouts.default")
@section('page_title','Sube tu dato')
@section('content')
<div class="page" id="submit-tip">
	@include("...incs.logo")

    <section class="datos">
        <div id="content-form">
            <H1>ENTRÉGANOS TU DATO PARA QUE TODOS PUEDAN ENAMORARSE DE CHILE</H1>
            {!! Form::open(array("route" => 'save_tip',"files" => true,"id" => "submit-form")) !!}
            <div class="form-in">
                @if ( !Auth::check() )
                    <div class="message warning">
                        Debes iniciar sesión para poder incribir tu dato. 
                    </div>
                @endif

                @include('partials.errors',compact('errors'))

                @if ( Session::has('tip_saved') )
                    <div class="message">
                        Tu dato ha sido guardado exitosamente. ¡Gracias!
                    </div>
                @else
                    @include('tips.partials.form-fields')

                    <div class="btn-enviar">
                        <input type="submit" class="btn-envia-dato" value="SUBE TU DATO" />
                    </div>

                    <div class="dato-picada">*LA INFORMACIÓN QUE NOS ENTREGUES EN ESTE SITIO SERÁ PARA PROPORCIONAR DATOS ÚTILES A LA COMUNIDAD</div>
                @endif
            </div>

            {!! Form::token() . Form::close() !!}
        </div>
    </div>
</section>
</div>
@stop
@section('js')
    @include('tips.partials.js-form')
@append
