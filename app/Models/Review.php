<?php

class Review extends Eloquent
{
  protected $table = "tip_votes";

  public function person()
  {
    return $this->belongsTo('Person');
  }

  public function tip()
  {
    return $this->belongsTo('Tip');
  }

  public function scopeApproved($query)
  {
    return $query->where('approved', true);
  }

  public function scopeSpam($query)
  {
    return $query->where('spam', true);
  }

  public function scopeNotSpam($query)
  {
    return $query->where('spam', false);
  }
  public function storeReviewForTip($tip_id, $author_id,$comment,$rating)
  {
    $tip = Tip::find($tip_id);

    // this will be added when we add user's login functionality
    //$this->user_id = Auth::user()->id;
    
    $this->comment    = $comment;
    $this->rating     = $rating;
    $this->author_id  = $author_id;
    $tip->reviews()->save($this);

    // recalculate ratings for the specified tip
    $tip->recalculateRating();
  }
  public function getTimeagoAttribute()
  {
    $date = CarbonCarbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    return $date;
  }
}


