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

function validate_rut($rut){
	if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
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