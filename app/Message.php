<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
  use softDeletes;
    //

    public function conversation()
    {
      return $this->belongsTo('App\Conversation');
    }

    public function replies(){
      return $this->hasMany('App\Reply');
    }

    public function scopeNewMessages($query){
      return $query->where('type',0);
    }
}
