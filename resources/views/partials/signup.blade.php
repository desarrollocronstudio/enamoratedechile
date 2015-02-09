<div id="signup" class="bg">
	<span class="top"></span>
	<div class="wrapper">
		
		<a href="" class="facebook-connect">
			<img src="{!! asset('img/btn-fb-connect.png') !!}" alt="Conectar con Facebook">
		</a>
		<div class="mini-profile">
			<img src="" alt="Foto de perfil">
			<span class="name"></span>
		</div>
		<hr />
		{!! Form::open(array("url" => "register")) !!}
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

		{!! Form::text("name",null,array("placeholder" => "Nombre")) !!}
		{!! Form::text("email",null,array("placeholder" => "Email")) !!}
		{!! Form::text("rut",null,array("placeholder" => "R.U.T.")) !!}
		{!! Form::password("password",array("placeholder" => "Contraseña")) !!}
		{!! Form::password("password_confirmation",array("placeholder" => "Confirma contraseña")) !!}
		{!! Form::submit("Regístrate",array("class" => "btn-red")) !!}
		<a class="already_registered" href="#" onclick="show_popup('login');$(this).closest('.popup').remove();">Ya estoy registrado</a>
		{!! Form::close() !!}

	</div>
	<span class="bottom"></span>
</div>
<script>
$(function(){
	$('input, textarea').placeholder();
	$('[name=rut]').Rut();
})
</script>