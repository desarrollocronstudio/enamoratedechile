<div id='thanks' class="bg">
	<div class="wrapper">
		<h3>Gracias por registrarte.</h3>
		<p>Solo debes confirmar tu cuenta con el email que te enviamos.</p>
		<a href="" class="close btn-red">Aceptar</a>
	</div>
</div>
<script>
(function(){
	$popup = $("#thanks").parent();
	$popup.find(".close").click(function(){
		$popup.fadeOut(function(){
			$(this).remove()
		});
		return false;
	});
})();

</script>