var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix.styles([
        'public/css/normalize.min.css',
        'public/css/diego.css',
        'public/css/fonts.css',
        'public/css/main.css',
        'public/js/vendor/ui/jquery-ui.css',
        'public/css/shadowbox.css',
        'public/css/cronstudio.css' 
    ],'public/css/everything.css','public/css');
});
