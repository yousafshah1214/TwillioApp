<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
  use SoftDeletes;

  /**
  *  Relationship function of user
  */
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function phoneList(){
        return $this->hasMany('App\PhoneList');
    }
}
