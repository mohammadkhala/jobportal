<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
	 protected $primaryKey = 'user_id';

   public $incrementing = false;

    function jobs() {
        return $this->belongsToMany('App\Models\Job')->withTimeStamps();
    }

    function user() {
    	return $this->belongsTo('App\Models\User');
   }

   function profile() {
    	return $this->hasOne('App\Models\Profile', 'profile');
   }
}
