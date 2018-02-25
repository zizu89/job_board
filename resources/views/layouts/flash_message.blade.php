@if($flash = session('feedback_msg'))
<div id="flash-msg" class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{ $flash }}
</div>	
@endif