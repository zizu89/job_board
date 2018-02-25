<nav class="navbar navbar-default main-nav">
	<div class="container-fluid">
		
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-manu" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand logo" href="/">Job Board</a>
		</div>

		<div class="collapse navbar-collapse" id="main-manu">
			<ul class="nav navbar-nav">
				<li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">Job Submission</a></li>
				<li {{ (Request::is('jobs') ? 'class=active' : '') }}><a href="/jobs">Jobs</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
		
	</div><!-- /.container-fluid -->
</nav>