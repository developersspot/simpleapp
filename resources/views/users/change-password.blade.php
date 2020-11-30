@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-light d-flex justify-content-between">
				<div class="head-label d-flex align-items-center">Change Password</div>
			</div>
			<div class="card-body py-3">
				<form autocomplete="off" id="changepassword-form" action="{{ route('changePassword') }}" method="post" class="form-horizontal" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label">Current Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" name="current_password" placeholder="">
							@if ($errors->has('current_password'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('current_password') }}</strong>
							</span>
							@endif
							
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">New Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password" placeholder="">
							@if ($errors->has('new_password'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('new_password') }}</strong>
							</span>
							@endif
							
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-3">&nbsp;</div>
						<div class="col-sm-9">
							<div class="float-left">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-secondary">Reset</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
