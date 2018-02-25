<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\JobStatus;
use App\Mail\JobPostedHR;
use App\Mail\JobPostedModerator;

class JobController extends Controller
{

	public function create()
	{
		return view('jobs.create');
	}

	public function store()
	{

		$this->validate(request(), [

			'title' => 'required|max:255',
			'description' => 'required',
			'email' => 'required|email|max:190'

		]);

		/****
			STATUSES
				published
				spam
				moderation
		****/
		
		$published_status = JobStatus::where('name', '=', 'published')->first()->id;
		$moderation_status = JobStatus::where('name', '=', 'moderation')->first()->id; 

		//publish if alredy exist and status is published otherwise put in moderation and send mail
		if (Job::jobsByEmail(request('email'))->jobsByStatus($published_status)->count() > 0) {
			$status_id = $published_status;
		}else{
			$status_id = $moderation_status;
		}

		$new_job = Job::create([
			'title' => request('title'),
			'description' => request('description'),
			'email' => request('email'),
			'status_id' => $status_id,
			'token' => str_random(40)
		]);

		if ($new_job->status_id == $moderation_status) {
			//this is first job submisson for this HR manager send mail to him
			\Mail::to($new_job->email)->send(new JobPostedHR);

			//notify moderator that somebody post job for first time
			\Mail::to('moderator@jobboard.com')->send(new JobPostedModerator($new_job));

		}

		session()->flash('feedback_msg', 'Thank you for posting a job!');

		return redirect('/');
	}

	public function show()
	{

		$jobs = Job::orderBy('created_at', 'desc')->get();

		$data = [
			'jobs' => $jobs
		];

		return view('jobs.show', $data);
	}
	
	public function changeStatus($status, $token)
	{
		$moderation_status = JobStatus::where('name', '=', 'moderation')->first();
		$new_status = JobStatus::where('name', '=', $status)->first();

		$job = Job::where('token', '=', $token)->first();

		if( (count($job) > 0) && ($job->status_id == $moderation_status->id) ){
			
			//update status
			if ( Job::where('id', '=', $job->id)->update(['status_id' => $new_status->id]) ) {
				$status_msg = "Job status successfully changed to {$new_status->name}!";
			}else{
				$status_msg = "Problem with changing job status to {$new_status->name}!";
			}

		}else{
			$status_msg = "Can not change job status! Job status is {$job->jobStatus->name}!";
		}

		$data = [
			'status_msg' => $status_msg 
		];

		return view('jobs.job_status_msg', $data);
	}



}
