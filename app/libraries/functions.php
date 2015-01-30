<?php
if(!function_exists('__')) {

	function __($trans, $fallback=false) {
		return call_user_func_array("trans", func_get_args());
	}
}

$start_time = microtime(true);
App::finish(function() use ($start_time) {
    if(!Request::ajax()) echo "<script>console.log('App finish: ".round((microtime(true)-$start_time)*1000,3)." ms')</script>";
});



function str_rand($length=20) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;

}  

function init_facebook(){
     $config = array(
        'appId' => Config::get('facebook.appId'),
        'secret' => Config::get('facebook.secret'),
    );

    $facebook = new Facebook($config);

    return $facebook;
}

function qs_url($qs = array(),$merge = array())
{
    if($merge == true)$merge = Request::query();
    $qs = array_merge($merge,$qs);
    $url = "";
    if (count($qs)){

        foreach($qs as $key => $value){
            $qs[$key] = sprintf('%s=%s',$key, urlencode($value));
        }
        $url = sprintf('%s?%s', $url, implode('&', $qs));
    }
    return $url;
}

function is_admin(){
    return (Auth::check() && Auth::user()->admin);
}
