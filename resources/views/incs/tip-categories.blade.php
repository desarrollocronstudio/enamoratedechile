<span class="cerca">Resultados:</span>
<?php echo Session::get('categoria'); ?>
<span class="cerca mobile "><font color="#D83E3F">{{$tips->count()}}</font> Resultados para <font color="#575757">"comida"</font></span>

<div class="categories">
	<ul>
			<li id="secciones">
				<a href="#">En otras secciones</a>
			</li>
		@foreach($tips_categories as $category)
			<li class="{{ $active == $category->id?'active':'no-active' }} {{ $usable?'':'disabled' }}">
				@if ($usable)
					@if(isset($from) && $from == 'tip')
						<a href="{{ URL::route('tip_search',[$tip->sluged_name(),$tip['lat'],$tip['lng']]).qs_url(['cat' => ($active == $category->id?'':$category->id)]) }}">{{ $category["name"] }}</a>
					@else
						<a href="{{ URL::current().qs_url(['cat' => ($active == $category->id?'':$category->id)]) }}">{{ $category["name"] }}</a>
					@endif
				@else
					<span>{{ $category["name"] }}</span>
				@endif
			</li>
		@endforeach
	</ul>
</div>