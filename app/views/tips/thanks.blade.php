@extends("layouts/default")
@section('content')
<div class="page" id="submit-tip">
    @include("incs/logo")

    <section class="datos">
        <div id="content-form">
            <div class="thanks">
                <h1>¡GRACIAS POR COMPARTIR TU DATO! PODRÁS VERLO DENTRO DE LAS PRÓXIMAS 24 HORAS.</h1>

                <h1>TE INVITAMOS A PREPARAR TU PRÓXIMO VIAJE BUSCANDO AQUÍ MÁS DATOS DE CHILE.</h1>

                <div class="btn-enviar">
                    <form method="get" action="{{ URL::route('featured') }}">
                        <input type="submit" class="btn-envia-dato" value="VER DATOS" />
                    </form>
                </div>
            </div>

        </div>
</div>
</section>
</div>
@stop
