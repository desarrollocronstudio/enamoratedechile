<?php
if(!function_exists('__')) {

	function __($trans, $fallback=false) {
		return call_user_func_array("trans", func_get_args());
	}
}

$start_time = microtime(true);
App::finish(function() use ($start_time) {
    echo "<script>console.log('App finish: ".round((microtime(true)-$start_time)*1000,3)." ms')</script>";
});

Validator::extend('rut', function($attribute, $value, $parameters)
{
    return validate_rut($value);
});

function normalizar_rut($rut){
	return str_replace(array(",","-","."," "),"",$rut);
}
function validate_rut($rut){
    $rut = normalizar_rut($rut);
    $elRut = substr($rut, 0, -1);
    $RUT[1] = substr($rut, -1);
    $factor = 2;
    $suma = 0;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   return ($dv == trim(strtolower($RUT[1])));
}

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
