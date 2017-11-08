<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    public function conversation()
    {
      return $this->belongsTo('App\Conversation');
    }

    public function message(){
      return $this->belongsTo('App\Message');
    }
}
