@extends('layouts.master')

@section('content')

<div class="panel panel-default job-status-pnl">
	<div class="panel-heading">Job Status</div>
	<div class="panel-body">{{ $status_msg }}</div>
</div>

@endsection