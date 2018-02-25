@component('mail::message')
# {{ $job_title }}

{{ $job_description }}

@component('mail::button', ['url' => url("/jobs/published/$job_token"), 'color' => 'green' ])
Publish
@endcomponent

@component('mail::button', ['url' => url("/jobs/spam/$job_token"), 'color' => 'red' ])
Mark As Spam
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
