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

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
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