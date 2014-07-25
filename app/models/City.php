<?php
class City extends Eloquent {
	public $timestamps = false;

	public function tips(){
		return $this->hasMany('Tip');
	}

	public function province(){
		return $this->belongsTo("Province",'province_id','id');
	}

	public function get_position(){
		$position = false;
		if((int)$this->lat == 0 || (int)$this->lng == 0){
			$adapter  = new \Geocoder\HttpAdapter\CurlHttpAdapter();
			$provider = new \Geocoder\Provider\GoogleMapsProvider($adapter);
			$geocoder = new \Geocoder\Geocoder($provider);

			$address = $this->name.','.$this->province->name.','.$this->province->region->name.', Chile';
			
			$result = $geocoder->geocode($address);
			$position = array("lat" => $result->getLatitude(),"lng" => $result->getLongitude());

			$this->lat = $position["lat"];
			$this->lng = $position["lng"];
			$this->save();
		}else{
			$position = array("lat" => $this->lat,"lng" => $this->lng);
		}
		return $position;
	}
 
}