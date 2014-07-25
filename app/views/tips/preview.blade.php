<div class="dato-small">
	<span class="nombre">{{ $tip->name }}</span>
	<div class="img">
		<a href="{{ action('view-tip',array($tip->id)) }}">
			<img src="{{ $tip->image() }}">
		</a>
	</div>
	<div class="meta">
		<span class="author">Por: {{ Str::limit($tip->author->name,12) }}</span>
		<span class="city">{{ ($tip->city_name) }}</span>
	
		<span class="type">{{ $tip->category->name }}</span>
	</div>
	<div class="text">{{ substr($tip["content"], 0, 100) }}</div>
	<div class="rating">
		@for ($i = 1; $i <= 5; $i++)
			<span class="mark {{ ($i > $tip->rating_cache)?'':'active'  }}"></span>
		@endfor
	</div>
	<a class="red-btn" href="{{ action('view-tip',array($tip->id)) }}">{{ trans("Leer más") }}</a>
</div>