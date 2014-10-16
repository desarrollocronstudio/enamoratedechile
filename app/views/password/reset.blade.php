@extends("layouts.default")
@section('content')
	<div class="page" id="home">
		@include("incs/logo")
		<div class="container">
			@if (Session::get("ok") != true)
				{{ Session::get('error') }}
				<div class="password form">
					{{ Form::open(['action' => 'RemindersController@postReset']) }}
					    <h3>Restablecer contraseña</h3>
					    {{ Form::hidden('token',$token) }}
					    {{ Form::text('rut',null,['placeholder' => 'RUT']) }}
					    <input type="password" name="password" placeholder="Nueva contraseña">
					    <input type="password" name="password_confirmation" placeholder="Confirma tu nueva contraseña">
					    <input type="submit" value="Reestablecer contraseña">
					{{ Form::close() }}
				</div>
			@else
				<div class="message">Contraseña modificada satisfactoriamente</div>
			@endif
		</div>
	</div>
@stop