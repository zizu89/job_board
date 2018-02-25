@extends('layouts.master')

@section('content')

<h1>Jobs</h1>

<div class="row">
	<div class="col-md-10 col-md-offset-1 jobs-tbl">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Job Title</th>
						<th>Email</th>
						<th>Date created</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jobs as $job)
					<tr>
						<td>{{ $job->title }}</td>
						<td>{{ $job->email }}</td>
						<td>{{ $job->created_at->format('d.m.Y') }}</td>
						<td>{{ $job->jobStatus->name or 'unknown' }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>	
</div>

@endsection