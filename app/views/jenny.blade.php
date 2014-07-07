@extends("layouts.default")
@section('content')
<div class="page" id="jenny">
@include("incs/logo")
<div class="jenny">
  <h2 class="title_jenny">BUSCANDO A JENNY CAP. 1</h2>
  <div class="video">
    <iframe width="674" height="379" src="//www.youtube.com/embed/qZmRu8jAfy4" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="shared"> <a href="#" class="tw"></a> <a href="#" class="face"></a> </div>
  <div class="separate"></div>
  <div class="miniaturas">
    <div class="thumbs">
    <h2>BUSCANDO A JENNY CAP. 2</h2>
    <img  src="{{ asset('img/min_video.jpg') }}"/>
    <a href="#" class="vervideo"></a>
     </div>
     <div class="thumbs">
    <h2>BUSCANDO A JENNY CAP. 3</h2>
    <img  src="{{ asset('img/min_video2.jpg') }}"/>
    <a href="#" class="vervideo"></a>
     </div>
     <div class="thumbs">
    <h2>BUSCANDO A JENNY CAP. 4</h2>
    <img  src="{{ asset('img/min_video3.jpg') }}"/>
    <a href="#" class="vervideo"></a>
     </div>
  </div>
  <div class="separate"></div>
</div>
</div>
@stop