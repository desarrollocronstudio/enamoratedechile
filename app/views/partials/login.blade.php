<div id="login" class="bg">
	<span class="top"></span>
	<div class="wrapper">
		
		<a href="" class="facebook-connect">
			<img src="{{ asset('img/btn-fb-connect.png') }}" alt="Conectar con Facebook">
		</a>
		<hr />
		{{ Form::open(array("url" => "register")) }}
		{{ Form::text("rut",null,array("placeholder" => "R.U.T.")) }}
		{{ Form::password("password",array("placeholder" => "Contraseña")) }}
		{{ Form::submit("Iniciar sesión",array("class" => "btn-red")) }}
		{{ Form::close() }}
		<a class="already_registered" href="#" onclick="show_popup('forgot');$(this).closest('.popup').remove();">¿Olvidó su contraseña?</a>

	</div>
	<span class="bottom"></span>
</div>
<script>
$(function(){
	$('input, textarea').placeholder();
})
</script>
