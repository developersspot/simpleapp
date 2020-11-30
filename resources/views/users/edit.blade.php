@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">User Edit</h6>
        <div class="d-flex align-content-end">
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Back to list</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <p class="help-block"><b>Note:</b> <em>Leave it brank if you dont want to change password</em></p>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option {{ $user->status == '1' ? 'selected' : null }} value="1">Active</option>
                            <option {{ $user->status == '0' ? 'selected' : null }} value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sms btn-success">Update</button>
            <a href="{{ route('user.edit', ['user' => $user]) }}" class="btn btn-sms btn-secondary">Reset</a>
        </form>
    </div>
</div>
@endsection
