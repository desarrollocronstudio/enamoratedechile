<div id="forgot" class="bg">
	<div class="wrapper">
		<h3>Recuperar contraseña</h3>
		<div class="msg"></div> 
		{{ Form::open(array("url" => "remind_password")) }}
		{{ Form::text("rut",null,array("placeholder" => "Ingresa tu R.U.T.")) }}
		{{ Form::submit("Recuperar",array("class" => "btn-red")) }}
		{{ Form::close() }}

	</div>
	<span class="bottom"></span>
</div>