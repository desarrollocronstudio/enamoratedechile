<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield("page_title",'Enamórate de Chile') - LAN</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="_token" content="{{ csrf_token() }}" />

        <link rel="icon" href="{{ URL::to('/img/logo-small.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ URL::to('/img/logo-small.png') }}" type="image/x-icon">

        @yield('metatags')

        <link rel="stylesheet" href="{{ asset('css/everything.css') }}">

        <script>
        var BASE_URL    = '{{ URL::to('/') }}';
        var CURRENT_URL = '{{ Request::path() }}';
        var LOGGED_IN ={{ Auth::check()?'true':'false' }};
        </script>
        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 9]>
                <p class="browsehappy">Están usando un navegador web <strong>obsoleto</strong>. Por favor <a href="http://browsehappy.com/">actualízalo</a> para mejorar tu experiencia.</p>
        <![endif]-->
        <header class="mobile" style="position: fixed; top: 0px; z-index: 1000;">
             <span class="mobile menu">

             <img src="{{ asset('img/menu-mobile.png') }}">
             <img id="avatar" src="//graph.facebook.com/10207277755040967/picture" alt="Ricardo Wichar Mosqueira">
             </span>
        </header>
        <header class="desktop" stats="hidden">
            @include("incs/menu-top",['is_home'=>$is_home])
        </header>
        <div id="container">
            <div id="content">

                @yield('content')
            </div>
            <footer>
                @include("incs/footer")
            </footer>
        </div>

        @include("incs/js-footer")
        
        <!-- JS -->
        @yield('js')

    </body>
</html>
