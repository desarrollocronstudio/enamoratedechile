

<div class="nav" id="search-nav">
	<a href="{{ route('submit_tip_form') }}"><img src="{{ asset('img/danos-un-dato.png') }}"></a>
	<a class="go-search" href=""><img src="{{ asset('img/busca-un-dato.png') }}"></a>
</div>

<div class="search-box">
	<form id="search-form" action="{{ route('tip_search') }}" method="get">
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
                scrollTop: $("#search-nav").offset().top-10
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
			componentRestrictions:{country: 'cl'},
			types:['geocode','establishment']
		}).bind("geocode:result", function(event, result){
			var loc = result.geometry.location;
			var place = false;

			$("#search-form [type=submit]").val('Buscando...').attr("disabled",'disabled');
			if(check_type_from_result(result,'establishment'))
			{
				place = result.name;
			}
			else
			{
				place = get_locality_name_from_result(result,['neighborhood','administrative_area_level_3','locality','administrative_area_level_2','administrative_area_level_1']);
			}
			console.log(result);
			//var address = result.formatted_address.toString().toLowerCase().replace(/,/g,'').replace(/ /g,'-');
			var place_url = place.replace(/ /g,'_');
			//alert(address);

			window.location = '{{ URL::to('/search') }}/'+place_url+'/'+loc.lat()+'/'+loc.lng();
		});

	});
</script>
@stop