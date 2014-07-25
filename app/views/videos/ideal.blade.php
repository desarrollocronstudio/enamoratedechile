@extends("layouts.default")
@section('content')
<div class="page" id="jenny">
  @include("incs/logo")
  <div class="jenny">
    <h2 class="title_jenny">JEAN PHILIPPE EN SAN PEDRO</h2>
    <div class="video">
      <iframe width="674" height="379" src="//www.youtube.com/embed/qZmRu8jAfy4" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="shared"> <a href="#" class="tw"></a> <a href="#" class="face"></a> </div>
    <div class="separate"></div>
    <div class="miniaturas">
      <div class="thumbs">
        <h2>JEAN PHILIPPE EN LUGAR 01</h2>
        <img  src="{{ asset('img/min__jean.jpg') }}"/>
        <a href="#" class="vervideo"></a>
      </div>
      <div class="thumbs">
        <h2>JEAN PHILIPPE EN LUGAR 02</h2>
        <img  src="{{ asset('img/min__jean2.jpg') }}"/>
        <a href="#" class="vervideo"></a>
      </div>
      <div class="thumbs">
        <h2>JEAN PHILIPPE EN LUGAR 03</h2>
        <img  src="{{ asset('img/min__jean3.jpg') }}"/>
        <a href="#" class="vervideo"></a>
      </div>
      <div class="thumbs">
        <h2>JEAN PHILIPPE EN LUGAR 04</h2>
        <img  src="{{ asset('img/min__jean4.jpg') }}"/>
        <a href="#" class="vervideo"></a>
      </div>
      <div class="thumbs">
        <h2>JEAN PHILIPPE EN LUGAR 05</h2>
        <img  src="{{ asset('img/min__jean5.jpg') }}"/>
        <a href="#" class="vervideo"></a>
      </div>
      <div class="thumbs">
        <h2>JEAN PHILIPPE EN LUGAR 06</h2>
        <img  src="{{ asset('img/min__jean6.jpg') }}"/>
        <a href="#" class="vervideo"></a>
      </div>
    </div>
    <div class="separate"></div>
  </div>
</div>
@stop