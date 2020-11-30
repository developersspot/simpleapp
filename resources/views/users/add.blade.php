@extends('layouts.app')

@section('content')
<div class="container"  id="adduser">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form action="{{ route('user.store') }}" id="adduser" name="adduser" method="POST" class='form-horizontal form-bordered form-validate' autocomplete="off">
                            @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">

                                    <input name="name" id="name" class="form-control form-control-user" value="" data-rule-required="true" onkeypress="return numsonly(event)" type="text">

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" id="email"
                                placeholder="Email Address">

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <input type="password" name="password" class="form-control form-control-user"
                                    id="password" placeholder="Repeat Password">

                                </div>
                            </div>
                            <div class="form-group row">
                               <div class="col-sm-12">
                                   <select name="status" id="status">
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                  </select>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
