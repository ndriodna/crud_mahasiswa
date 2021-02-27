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
       <h3 class="text-white">Biodata Mahasiswa</h3>
   <div class="bg-white rounded shadow-lg  p-6">
   @if(!empty($mahasiswa->photos))
    <div class="form-row p-2">
     <div class="col-md-12">
         <img src="{{asset('storage/'.$mahasiswa->photos)}}" alt="" width="200" height="200">
     </div>
    </div>
    @else
    <img src="http://via.placeholder.com/100x100">
    @endif
    <div class="form-row p-2">
     <div class="col-md-4">NIM</div>
     <div class="col-md-8">{{$mahasiswa->nim}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Nama</div>
     <div class="col-md-8">{{$mahasiswa->nama}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Jurusan</div>
     <div class="col-md-8">{{$mahasiswa->jurusan->nama_jurusan}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Akreditasi</div>
     <div class="col-md-8">{{$mahasiswa->jurusan->akreditasi}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Jenis Kelamin</div>
     <div class="col-md-8">{{$mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Alamat</div>
     <div class="col-md-8">{{$mahasiswa->alamat}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Tempat lahir</div>
     <div class="col-md-8">{{$mahasiswa->tempat_lahir}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Tanggal lahir</div>
     <div class="col-md-8">{{\Carbon\Carbon::parse($mahasiswa->tgl_lahir)->format('j F Y')}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Tahun Masuk</div>
     <div class="col-md-8">{{$mahasiswa->thn_masuk}}</div>
    </div>
   </div>
 </div>
@endsection
