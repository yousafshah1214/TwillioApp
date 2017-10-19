<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

  /**
  *  Relationship function of user
  */
    public function user(){
      return $this->belongsTo('App\User');
    }
}
