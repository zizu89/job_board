<?php

namespace App\Mail;

use App\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobPostedModerator extends Mailable
{
    use Queueable, SerializesModels;

    protected $new_job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Job $new_job)
    {
        $this->new_job = $new_job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Job Posted')
                    ->markdown('emails.job_posted_mod')
                    ->with([
                        'job_title' => $this->new_job->title,
                        'job_description' => $this->new_job->description,
                        'job_token' => $this->new_job->token
                    ]);
    }
}
