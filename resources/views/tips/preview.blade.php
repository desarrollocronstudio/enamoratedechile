<div class="dato-small">
	<span class="nombre">{{{ $tip->name }}}</span>
	<div class="img">
		@if($tip->distance)
			<span class="distance">{{ round($tip->distance,1) }} <small>Kms.</small></span>
		@endif
		<a href="{{ route('view-tip',[$tip->id, $tip->sluged_name()]) }}">
			<img src="{{ $tip->image() }}">
		</a>
	</div>
	<div class="meta">
		<span class="author">Por: {{{ str_limit($tip->author->name,12) }}}</span>
		<span class="city">{{ ($tip->city_name) }}</span>
	
		<span class="type">{{ $tip->category->name }}</span>

	</div>
	<div class="text">{{{ str_limit($tip["content"], 100) }}}</div>
	@if (isset($show_rating) && $show_rating === true)
	<div class="rating">
		@for ($i = 1; $i <= 5; $i++)
			<span class="mark {{ ($i > $tip->rating_cache)?'':'active'  }}"></span>
		@endfor
	</div>
	@endif
	<a class="red-btn" href="{{ route('view-tip',[$tip->id, $tip->sluged_name()]) }}#view-content">{{ trans("Leer más") }}</a>
</div> 