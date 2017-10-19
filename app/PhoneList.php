<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneList extends Model
{
    //
    protected $table = 'phone_list';

    /**
    * Relationship function for Bulk Lists upload identity
    */
    public function bulkList(){
      return $this->belongsTo('App\BulkListsUpload');
    }
}
