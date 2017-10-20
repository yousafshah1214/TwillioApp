<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneList extends Model
{
  use SoftDeletes;
    //
    protected $table = 'phone_list';

    /**
    * Relationship function for Bulk Lists upload identity
    */
    public function bulkList(){
      return $this->belongsTo('App\BulkListsUpload');
    }
}
