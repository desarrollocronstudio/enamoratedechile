<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Nuevo dato recibido</h2>

		<div>
			Hemos recibido un nuevo dato:

		    <table>
		        <tr>
		            <td>Nombre</td>
		            <td>{{ $tip['name'] }}</td>
		        </tr>
		        <tr>
					<td>Autor</td>
					<td>{{ $author['name'] }}</td>
				</tr>
		        <tr>
		            <td>Lugar</td>
		            <td>{{ $tip['place_name'] }}</td>
		        </tr>
		        <tr>
		            <td>Imagen</td>
		            <td><img src='{{ $tip['image'] }}' alt="" /></td>
		        </tr>
		        <tr>
		            <td>Detalle</td>
		            <td>{{ $tip['detail'] }}</td>
		        </tr>
		    </table>
			<div>
		    	<a href="{{ URL::action('tip.active',['true',$tip['id'],$token]) }}">APROBAR</a> | <a href="{{ URL::action('tip.active',['false',$tip['id'],$token]) }}">DESAPROBAR</a>
			</div>
		</div>
	</body>
</html>
