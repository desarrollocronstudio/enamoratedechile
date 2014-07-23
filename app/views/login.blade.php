<div id="login">
	<span class="top"></span>
	<div class="wrapper">
		
		<a href="" class="facebook-connect">
			<img src="img/btn-fb-connect.png" alt="Conectar con Facebook">
		</a>
		<hr />
		{{ Form::open(array("url" => "register")) }}
		{{ Form::text("name",null,array("placeholder" => "Nombre")) }}
		{{ Form::text("email",null,array("placeholder" => "Email")) }}
		{{ Form::text("rut",null,array("placeholder" => "R.U.T.")) }}
		{{ Form::password("password",array("placeholder" => "Contraseña")) }}
		{{ Form::password("password_confirm",array("placeholder" => "Confirma contraseña")) }}
		{{ Form::submit("Registrate") }}
		{{ Form::close() }}

	</div>
	<span class="bottom"></span>
</div>