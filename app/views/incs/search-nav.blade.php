<div class="nav">
	<a href=""><img src="{{ asset('img/danos-un-dato.png') }}"></a>
	<a class="go-search" href=""><img src="{{ asset('img/busca-un-dato.png') }}"></a>
</div>

<div class="search-box">
	<form id="search-form" action="" method="get">
		<input type="text" class="box" name="q">
		<input type="submit" class="submit" value="Buscar">
	</form>
	<hr class="main-sep" />
</div>
@section('js')
@parent
<script type="text/javascript">
$(function(){
	$("#search-form").submit(function(){
		var data = $(this).serialize();
		return false;
	});
	$(".go-search").click(function(){
		$(".search-box").fadeIn(500);
		return false;
	});
})
</script>
@stop