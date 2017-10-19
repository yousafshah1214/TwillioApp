<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkListsUpload extends Model
{
    //
    protected $table = "bulk_lists_upload";

    /**
    * Relationship function for fetching user
    */
    public function user(){
      return $this->belongsTo('App\User');
    }

    /**
    * Relationship function for retreiving all phone numbers of specified list
    */
    public function phoneList(){
      return $this->hasMany('App\PhoneList');
    }

}
