<div class="categories">
	<ul>
		@foreach($tips_categories as $tip)
			<li><a href="{{ action('TipController@view',array(Input::segment(2),"category" => $tip['id'])) }}">{{ $tip["name"] }}</a></li>
		@endforeach
	</ul>
</div>