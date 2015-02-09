<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reestablecer contraseña</h2>

		<div>
			Para completar el proceso, debes llenar este formulario: <br />
			{{ URL::to('password/reset', array($token)) }}.<br/><br />
			Este link expira en {{ Config::get('auth.reminder.expire', 60) }} minutos.
		</div>
	</body>
</html>
