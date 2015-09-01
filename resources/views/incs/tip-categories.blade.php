<span class="cerca">Resultados:</span>

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