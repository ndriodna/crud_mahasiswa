@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Edit Dosen') }}</a>
    </div>
</nav>
    <div class="bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container-fluid" style="margin-top: -150px">
     <form action="{{route('dosen.update',$dosen->id)}}" method="POST" enctype="multipart/form-data" class="bg-white rounded p-6 shadow-lg mb-5">
         @csrf
         @method('PUT')
	     <div class="form-group">
	         <label class="form-control-label">NIDN</label>
	         <input class="form-control" type="text" name="nidn" value="{{$dosen->nidn}}">
	     </div>
	     <div class="form-group">
	        <label class="form-control-label">Nama</label>
	        <input class="form-control" type="text" name="nama" value="{{$dosen->nama}}">
	    </div>
	    <div class="form-group">
			<label class="form-control-label">Jenis Kelamin</label>
			<div class="custom-control custom-radio mb-3">
				<input class="custom-control-input" id="laki" type="radio" name="jenis_kelamin" value="L" {{$dosen->jenis_kelamin == 'L' ? 'checked' : ''}}>
				<label class="custom-control-label" for="laki">
				Laki-laki
				</label>
			</div>
			<div class="custom-control custom-radio mb-3">
				<input class="custom-control-input" id="Perempuan" type="radio" name="jenis_kelamin" value="P"  {{$dosen->jenis_kelamin == 'P' ? 'checked' : ''}}>
				<label class="custom-control-label" for="Perempuan">
				Perempuan
				</label>
				</div>
	    </div>
	    <div class="form-group">
		     <label class="form-control-label">Alamat</label>
	       <textarea name="alamat" cols="10" rows="5" class="form-control">{{$dosen->alamat}}</textarea>
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tempat Lahir</label>
	       <input type="text" name="tempat_lahir" class="form-control" value="{{$dosen->tempat_lahir}}">
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tanggal Lahir</label>
	       <input type="date" name="tgl_lahir" class="form-control" value="{{ $dosen->tgl_lahir}}">
	    </div>
	    <div class="form-group">
         <label class="form-control-label">Foto</label>
	       <input type="file" name="photos" class="form-control">
	       <img src="{{asset('storage/'.$dosen->photos)}}" alt="" width="200" height="200" class="p-2">
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Update</button>
	    </div>
	     </form>
 </div>
@endsection
