<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body style="margin:0; padding: 0; font-family: Verdana, Arial, sans-serif; font-size: 12px;">

		<div style="width: 600px; max-width: 100%; padding: 10px;padding-bottom: 30px;  background: #e2eadd url({{ asset('/img/bg.jpg') }}) left top; background-color:#ccc; border-radius:10px;  overflow: hidden;">
			<h1 style="margin: 0; padding-bottom: 20px;">¡Tu dato ha sido aprobado!</h1>


		    <img src="{{ $tip['image'] }}" style="float:left; width: 250px; border-radius: 10px;" width="250" />
		    <table style="float: left;">
		    	<tr>
		    		<td colspan="2" style="font-weight: bold">Este es el detalle de tu dato:</td>
		    	</tr>
		        <tr>
		            <td>Nombre</td>
		            <td>{{ $tip['name'] }}</td>
		        </tr>
		        <tr>
					<td>Autor</td>
					<td>{{ $author['name'] }} &lt;{{ $author['email'] }}&gt;</td>
				</tr>
		        <tr>
		            <td>Lugar</td>
		            <td>{{ $tip['place_name'] }}</td>
		        </tr>
		        <tr>
		            <td>Detalle</td>
		            <td width="200">{{ $tip['content'] }}</td>
		        </tr>
		        <tr>
		        	<td colspan="2" style="padding-top: 20px; font-weight: bold; width: 200px;">Puedes verlo y compartirlo en el siguiente link</td>
		        </tr>
		        <tr>
		            <td colspan="2"><a href="{{ $link }}">{{ $link }}</a></td>
		        </tr>
		    </table>

		</div>
	</body>
</html>
