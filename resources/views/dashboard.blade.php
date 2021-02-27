@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
    </div>
    @if(Auth::check())
    <div class="p-2">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            @method('POST')
       <button type="submit" class="btn btn-warning">
            <i class="fa fa-sign-out-alt"></i>
       </button>
        </form>
    </div>
    @else
    @endif
</nav>
    @include('layouts.headers.cards')
    <div style="margin-top: -150px;" class="row container-fluid">
    	<div class="col-xl-3 col-lg-6">
	        <div class="card card-stats mb-4 mb-xl-0">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col">
	                        <h5 class="card-title text-uppercase text-muted mb-0">Mahasiswa</h5>
	                        <span class="h2 font-weight-bold mb-0">{{$mahasiswa->count()}}</span>
	                    </div>
	                    <div class="col-auto">
	                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
	                            <i class="fas fa-users"></i>
	                        </div>
	                    </div>
	                </div>
	                 <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">last update</span>
                </p>
	            </div>
	        </div>
	    </div>
	    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jurusan</h5>
                        <span class="h2 font-weight-bold mb-0">{{$jurusan->count()}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">last update</span>
                </p>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
        {{-- {{Auth::user()->getRoleNames()}} --}}
                
            </div>
            
            </div>
        </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush