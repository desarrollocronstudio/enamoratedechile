<div class="categories">
	{{ Menu::handler('main') }}
	<ul>
		@foreach($tips_categories as $tip)
			<li><a href="{{ URL::to(URL::current(),array(Input::segment(2),"category" => $tip['id'])) }}">{{ $tip["name"] }}</a></li>
		@endforeach
	</ul>
</div>