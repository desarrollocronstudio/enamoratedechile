<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> @yield("page_title",'Enamórate de Chile')- LAN</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <link rel="icon" href="{{ URL::to('/img/logo-small.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ URL::to('/img/logo-small.png') }}" type="image/x-icon">

        @yield('metatags')

        <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/diego.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('js/vendor/ui/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shadowbox.css') }}">

        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>
        
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header class="mobile">
             <span class="mobile menu"><img src="{{ asset('img/menu-mobile.png') }}"></span>
        </header>
        <header class="desktop">
            @include("incs/menu-top")
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
