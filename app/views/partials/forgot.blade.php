<div id="forgot" class="bg">
	<div class="wrapper">
		<h3>Recuperar contraseña</h3>
		<div class="msg"></div> 
		{{ Form::open(array("url" => "remind_password")) }}
		{{ Form::text("email",null,array("placeholder" => "Email")) }}
		{{ Form::submit("Recuperar",array("class" => "btn-red")) }}
		{{ Form::close() }}

	</div>
	<span class="bottom"></span>
</div>