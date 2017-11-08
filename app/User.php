<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
    * Relationship function for states assigned to Each User
    */
    public function states(){
      return $this->hasMany('App\State');
    }

    /**
    * Relationship function for Bulk Lists Upload owner identity
    */
    public function BulkList(){
      return $this->hasMany('App\BulkListsUpload');
    }

    /**
    * Relationship function for templates assigned to each user
    */
    public function templates(){
      return $this->hasMany('App\Template');
    }

    /**
    * Relationship function for Conversations
    */
    public function conversations(){
      return $this->hasMany('App\Conversation');
    }
}
