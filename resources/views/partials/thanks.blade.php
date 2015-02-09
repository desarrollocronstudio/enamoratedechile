<div id='thanks' class="bg">
	<div class="wrapper">
		<h3>Gracias por registrarte.</h3>
		<p>Ya puedes subir nuevos datos y calificar los que ya existen.</p>
		<a href="" class="close btn-red">Aceptar</a>
	</div>
</div>
<script>
(function(){
	$popup = $("#thanks").parent();
	$popup.find(".close").click(function(){
		$("body").trigger("connected");
		return false;
	});
})();

</script>