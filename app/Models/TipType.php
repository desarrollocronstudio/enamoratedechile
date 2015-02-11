<?php
class TipType extends Eloquent {
 	protected $table = "tips_categories";

    public function pictures(){
        $pics = explode(",",$this->images);
        $pics = array_map(function($pic){
            return trim($pic);
        },$pics);
        return $pics;
    }
 
}