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