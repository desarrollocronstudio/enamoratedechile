<div class="categories">
	<ul>
		@foreach($tips_categories as $tip)
			<li class="{{ Input::get('cat') == $tip->id?'active':'' }}">
				<a href="{{ URL::current().qs_url(['cat' => $tip->id]) }}">{{ $tip["name"] }}</a>
			</li>
		@endforeach
	</ul>
</div>