<div id="login" class="bg">
	<span class="top"></span>
	<div class="wrapper">
		
		<a href="" class="facebook-connect">
			<img src="img/btn-fb-connect.png" alt="Conectar con Facebook">
		</a>
		<hr />
		{{ Form::open(array("url" => "register")) }}
		{{ Form::text("rut",null,array("placeholder" => "R.U.T.")) }}
		{{ Form::password("password",array("placeholder" => "Contraseña")) }}
		{{ Form::submit("Iniciar sesión",array("class" => "btn-red")) }}
		{{ Form::close() }}

	</div>
	<span class="bottom"></span>
</div>