@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Mahasiswa') }}</a>
    </div>
</nav>
    <div class="bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid mb-5" style="margin-top: -150px">
       <h3 class="text-white">User Detail</h3>
   <div class="bg-white rounded shadow-lg  p-6">
    <div class="form-row p-2">
     <div class="col-md-4">User ID</div>
     <div class="col-md-8">{{$user->kode_user}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">alamat</div>
     <div class="col-md-8">{{$user->mahasiswa->alamat}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Nama</div>
     <div class="col-md-8">{{$user->name}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Email</div>
     <div class="col-md-8">{{$user->email}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Role</div>
     <div class="col-md-8">
    @foreach($user->getRoleNames() as $role)
     {{$role}}
     @endforeach
     </div>
    </div>
   </div>
 </div>
@endsection
