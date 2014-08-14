<div class="categories">
	<ul>
		@foreach($tips_categories as $tip)
			<li class="{{ $active == $tip->id?'active':'' }} {{ $usable?'':'disabled' }}">
				@if ($usable)

					<a href="{{ URL::current().qs_url(['cat' => ($active == $tip->id?'':$tip->id)]) }}">{{ $tip["name"] }}</a>
				@else
					<span>{{ $tip["name"] }}</span>
				@endif
			</li>
		@endforeach
	</ul>
</div>