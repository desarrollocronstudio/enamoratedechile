<span class="cerca">Resultados:</span>
<span class="cerca mobile"><font color="#D83E3F">12</font> Resultados para <font color="#575757">"Comida"</font></span>

<div class="categories">
	<select>
		<option>En otras secciones</option>
	</select>
</div>

<div class="categories">
	<ul>
		@foreach($tips_categories as $category)
			<li class="{{ $active == $category->id?'active':'' }} {{ $usable?'':'disabled' }}">
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