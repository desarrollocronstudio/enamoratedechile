

<div class="nav" id="search-nav">
	<a href="{{ action('TipController@post') }}"><img src="{{ asset('img/danos-un-dato.png') }}"></a>
	<a class="go-search" href=""><img src="{{ asset('img/busca-un-dato.png') }}"></a>
</div>

<div class="search-box">
	<form id="search-form" action="{{ action('TipController@search') }}" method="get">
		<input type="text" class="box" name="q" placeholder="Buscar por ciudad...">
		<input type="submit" class="submit" value="Buscar">
	</form>
	<hr class="main-sep" />
</div>

@section('js')
	<script type="text/javascript">
	$(function(){
		$("#search-form").submit(function(){
			var data = $(this).serialize();
			//return false;
		});
		$(".go-search").click(function(){
			$(".search-box").fadeIn(500).find("input[type=text]").focus();
			$('html, body').animate({
                scrollTop: $("#search-nav").offset().top-50
            }, 800);
			return false;
		});
	})
</script>
@stop