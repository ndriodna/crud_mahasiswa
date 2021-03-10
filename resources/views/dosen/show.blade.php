@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('dosen') }}</a>
    </div>
</nav>
    <div class="bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid mb-5" style="margin-top: -150px">
       <h3 class="text-white">Biodata Dosen</h3>
   <div class="bg-white rounded shadow-lg  p-6">
   @if(!empty($dosen->photos))
    <div class="form-row p-2">
     <div class="col-md-12">
         <img src="{{asset('storage/'.$dosen->photos)}}" alt="" width="200" height="250">
     </div>
    </div>
    @else
    <img src="http://via.placeholder.com/100x100">
    @endif
    <div class="form-row p-2">
     <div class="col-md-4">NIDN</div>
     <div class="col-md-8">{{$dosen->nidn}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Nama</div>
     <div class="col-md-8">{{$dosen->nama}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Jenis Kelamin</div>
     <div class="col-md-8">{{$dosen->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Alamat</div>
     <div class="col-md-8">{{$dosen->alamat}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Tempat lahir</div>
     <div class="col-md-8">{{$dosen->tempat_lahir}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Tanggal lahir</div>
     <div class="col-md-8">{{\Carbon\Carbon::parse($dosen->tgl_lahir)->format('j F Y')}}</div>
    </div>
   </div>
 </div>
@endsection
