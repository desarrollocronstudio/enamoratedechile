$(function(){
	$("header .mobile.menu").click(function(){
		$("header ul").toggle();
	})
})

function facebook_connect(on_success, on_failure){
	FB.login(function(response) {
		if (response.authResponse) {
			if(typeof(on_success) == "function")on_success(response);
		} else {
			if(typeof(on_failure) == "function")on_failure(response);
		}
	});
}