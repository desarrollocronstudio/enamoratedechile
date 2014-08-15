@extends("layouts/default")
@section('content')
<div class="page" id="submit-tip">
    @include("incs/logo")

    <section class="datos">
        <div id="content-form">
            <div class="thanks">
                <h1>GRACIAS POR ABRIR TU CORAZÓN Y CONTARNOS ESAS INFIDENCIAS DE TU AMOR POR CHILE</h1>

                <h1>SIGUE REGANDO ESTE AMOR Y CONTINÚA NAVEGANDO EN ENAMÓRATE DE CHILE</h1>

                <div class="btn-enviar">
                    <form method="get" action="{{ URL::route('view-tip',$tip->id) }}">
                        <input type="submit" class="btn-envia-dato" value="VER MI DATO" />
                    </form>
                </div>
            </div>

        </div>
</div>
</section>
</div>
@stop
