<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
	protected $guarded = [];

	public function jobStatus()
	{
		return $this->belongsTo('App\JobStatus', 'status_id');
	}

	public function scopeJobsByEmail($query, $email)
	{
		return $query->where('email', '=', $email);
	}

	/*public function scopeJobsByStatus($query, $status_name)
	{
		return Job::whereHas('jobStatus', function ($query) use ($status_name){
		    $query->where('name', '=', $status_name);
		});
	}*/

	public function scopeJobsByStatus($query, $status_id)
	{
		return $query->where('status_id', '=', $status_id);
	}

}
