@extends('layouts.master')

@section('content')

<h1>Job Submisson</h1>

<div class="row">
	<div class="col-md-6 col-md-offset-3 submisson-from">
		
		@if(count($errors))
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		<form method="POST" action="/jobs">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="job-title">Title</label>
				<input name="title" type="text" class="form-control" id="job-title" placeholder="Title" value="{{ old('title') }}">
			</div>
			<div class="form-group">
				<label for="job-desc">Description</label>
				<textarea name="description" class="form-control" rows="10" id="job-desc">{{ old('description') }}</textarea>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
			</div>
			<div class="btn-frame">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>
	</div>
</div>	

@endsection