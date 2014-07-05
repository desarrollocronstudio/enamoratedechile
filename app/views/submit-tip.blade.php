@extends("layouts/default")
@section('content')
<div class="page" id="home">
	@include("incs/logo")

	@include("incs/search-nav")


	<section class="datos">
    <div id="content-form">
    <h1>ENTRÉGANOS TU DATO PARA TODOS PUEDAN ENAMORARSE DE CHILE</h1>
    <form action="" method="get">
    <div class="form-in">
        <span class="dato-in">
        NOMBRE<br />
        <input name="" type="text" class="input-in" placeholder="Ej. Gonzalo Ríos" required  />
        </span>
        <span class="dato-in">
        EMAIL<br />
        <input name="" type="text" class="input-in" placeholder="gonzalo@mail.com" required />
        </span>
                <span class="dato-in">
        RUT<br />
        <input name="" type="text" class="input-in" placeholder="16796049-9" required  />
        </span>
        <span class="dato-in">
        EMAIL<br />
        <input name="" type="text" class="input-in" placeholder="gonzalo@mail.com" required />
        </span>
         <span class="dato-in">
        DÓNDE ES TU DATO<br />
        <input name="" type="text" class="input-in" placeholder="Chillán" required />
        </span>
         <span class="dato-in">
        REGIÓN<br />
        <select name="" class="input-in">
          <option>Selecciona una región</option>
        </select>
        </span>
         <span class="dato-in">
        NOMBRE DEL LUGAR<br />
        <input name="" type="text" class="input-in" placeholder="gonzalo@mail.com" required />
        </span>
        <span class="dato-in">
        REGIÓN<br />
        <select name="" class="input-in">
          <option>Selecciona una categoría</option>
        </select>
        </span>

    </div>
    </form>
    </div>
	</section>
</div>
@stop
