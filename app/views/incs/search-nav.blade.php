

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
	var redirecting = false;

	$(function(){

		$(".go-search").click(function(){
			$(".search-box").fadeIn(500).find("input[type=text]").focus();
			$('html, body').animate({
                scrollTop: $("#search-nav").offset().top-50
            }, 800);
			return false;
		});


		var cache = {};
		$("#search-form").submit(function(){
			if(redirecting)return false;
			alert('Debes seleccionar una localidad en el buscador');
			return false;
		});

		$("#search-form .box").geocomplete({
			componentRestrictions:{country: 'cl'}
		}).bind("geocode:result", function(event, result){

			var loc = result.geometry.location;

			var city = get_locality_name_from_result(result);
			redirecting = true;

			$("#search-form [type=submit]").val('Buscando...').attr("disabled",'disabled');

			//var address = result.formatted_address.toString().toLowerCase().replace(/,/g,'').replace(/ /g,'-');
			var address = city.replace(/ /g,'_');
			//alert(address);

			window.location = '{{ URL::to('/search') }}/'+address+'/'+loc.lat()+'/'+loc.lng();
		});

	});
</script>
@stop