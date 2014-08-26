<?php
class TipFavorite extends Eloquent {
    protected $table = "tips_person";

    public function tip()
    {
        return $this->belongs_to('Tip');
    }
    public function user()
    {
        return $this->belongs_to('Person');
    }

}