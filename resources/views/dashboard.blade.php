@extends('layouts.app')

@section('content')
@if(Auth::user()->role == 1)
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<a href="{{ route('user.create') }}" class="btn btn-primary" style="float:right; margin-top: -54px;"> <i class="icon-plus"></i>&nbsp Add Grade</a>
<div class="row" id="dashboard">
	<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           {{ $total_users }}
                       </div>
                   </div>
                   <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>



</div>


</div>
@else
<h1 class="h3 mb-4 text-gray-800">Welcome to our web portal</h1>
@endif
@endsection
