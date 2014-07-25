@extends("layouts.default")
@section('metatags')
    <meta property="og:url" content="{{ $og['url'] }}" /> 
    <meta property="og:title" content="{{ $og['title'] }}" />

    <meta property="og:description" content="{{ $og['content'] }}" /> 
    <meta property="og:image" content="{{ $og['image'] }}" />
    @if (isset($og['video']))
      <meta property="og:video" content="{{ $og['video'] }}" />
    @endif
@stop
@section('content')
<div class="page" id="jenny">
  @include("incs/logo")
  <div class="jenny">
    <a id="view-content"></a>
    <h2 class="title_jenny">{{ $featured->name }}</h2>

    <div class="video">
      <iframe width="674" height="390" src="//www.youtube.com/embed/{{ $featured->youtube_code }}?{{ $autoplay?'autoplay=1':''}}" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="shared"> <a href="#" class="tw"></a> <a href="#" class="face"></a> </div>
    <div class="separate"></div>
    <div class="miniaturas">
      @foreach($videos as $video)
        <div class="thumbs">
          <h2>{{$video->name}}</h2>
          <div class="img" style="background-image:url({{ $video->thumbnail() }});">
            <a href="{{ action('view_video',[$video->type,$video->id]) }}#view-content">
              <img src="{{ asset('img/btn-play.png') }} " alt="">
            </a>
          </div>
          <a href="{{ action('view_video',[$video->type,$video->id]) }}#view-content" class="vervideo"></a>
        </div>
      @endforeach
    </div>
    <div class="separate"></div>
  </div>
</div>
@stop