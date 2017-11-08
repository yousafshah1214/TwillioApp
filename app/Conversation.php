<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
  use SoftDeletes;
    //

    public function messages(){
      return $this->hasMany('App\Message');
    }

    public function replies(){
      return $this->hasMany('App\Reply');
    }

    public function phoneList(){
      return $this->belongsTo('App\PhoneList');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
}
