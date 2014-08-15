<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="{{ asset('js/vendor/ui/jquery-ui.js') }}"></script>
<script src="{{ asset('js/vendor/shadowbox.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
$(function(){
    var cache = {};
    $("#search-form").submit(function(){
    return false;
    });
    $("#search-form .box").autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache ) {
              response( cache[ term ] );
              return;
            }

            $.getJSON( '{{ action("get-cities") }}', request, function( data, status, xhr ) {
              cache[ term ] = data;
              response( data );
            });
        },
        minLength: 2,
        delay:0,
        select: function( event, ui ) {
            window.location = "{{ URL::to('/search') }}"+"/"+ui.item.id+"/"+ui.item.value.replace(" ","-");
        }
    });
});
</script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43478943-5', 'auto');
  ga('send', 'pageview');

</script>

<!-- Twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Facebook -->
<div id="fb-root"></div>
<script>
  var BASE_URL = '<?php echo URL::to("/"); ?>';
  var CURRENT_URL = '<?php echo URL::current(); ?>';
  var USER_IP = '{{ Request::getClientIp() }}';  
  window.fbAsyncInit = function() {

    FB.init({
      appId       : '1451242411800345',
      cookie      : true,
      xfbml       : true,
      version     : 'v2.0'
    });
    $(document).trigger("fb_load");
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/es_LA/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>