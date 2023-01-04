<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
   function category() {
    	return $this->belongsTo('App\Models\JobCategory');
   }
   function user() {
    	return $this->belongsTo('App\Models\User');
   }

   function applicants() {
        return $this->belongsToMany('App\Models\Applicant', 'applicant_job', 'job_id', 'applicant_user_id');
    }
}
