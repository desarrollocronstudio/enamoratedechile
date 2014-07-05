function get_geoposition_form_user(){
	navigator.geolocation.getCurrentPosition(
		function(position){
		   var lat = position.coords.latitude;
		   var long = position.coords.longitude;
		   alert('Found location: ' + lat + ', ' + long);
		 }, function(){
		 	alert('Could not find location');
	 	}
	 );

