<div class="col-md-12">
	@if (session('status-success'))
	<div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> {{ session('status-success') }}
	</div>
	@endif

	@if (session('status-danger'))
	<div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Danger!</strong> {{ session('status-danger') }}
	</div>
	@endif

	@if (session('status-info'))
	<div class="alert alert-info alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Info!</strong> {{ session('status-info') }}
	</div>
	@endif

	@if (session('status-warning'))
	<div class="alert alert-warning alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Warning!</strong> {{ session('status-warning') }}
	</div>
	@endif
</div>
