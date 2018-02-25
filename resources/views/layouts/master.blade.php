@include('layouts.header')

@include('layouts.nav')

@include('layouts.flash_message')

<div class="container">
	<div class="row">
		<section class="col-sm-12 main-content">

			@yield('content')

		</section>
	</div>
</div>


@include('layouts.footer')