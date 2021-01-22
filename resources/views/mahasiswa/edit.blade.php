@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Edit Mahasiswa') }}</a>
    </div>
</nav>
    <div class="bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid" style="margin-top: -150px">
     <form action="{{route('mahasiswa.update',$mahasiswas->id)}}" method="POST" class="bg-white rounded p-6 shadow-lg mb-5">
         @csrf
         @method('PUT')
	     <div class="form-group">
	         <label class="form-control-label">NIM</label>
	         <input class="form-control" type="text" name="nim" value="{{$mahasiswas->nim}}">
	     </div>
	     <div class="form-group">
	        <label class="form-control-label">Nama</label>
	        <input class="form-control" type="text" name="nama" value="{{$mahasiswas->nama}}">
	    </div>
	    <div class="form-group">
	        <label class="form-control-label">Jurusan</label>
	        <select name="jurusan_id" class="form-control">
	        @foreach($jurusans as $data)
	       <option value="{{$data->id}}"  {{$data->id == $mahasiswas->jurusan_id ? 'selected' : ''}} >
	         {{$data->nama_jurusan}}
	       </option>
	       @endforeach    
	        </select>
	    </div>
	    <div class="form-group">
			<label class="form-control-label">Jenis Kelamin</label>
			<div class="custom-control custom-radio mb-3">
				<input class="custom-control-input" id="laki" type="radio" name="jenis_kelamin" value="L" {{$mahasiswas->jenis_kelamin == 'L' ? 'checked' : ''}}>
				<label class="custom-control-label" for="laki">
				Laki-laki
				</label>
			</div>
			<div class="custom-control custom-radio mb-3">
				<input class="custom-control-input" id="Perempuan" type="radio" name="jenis_kelamin" value="P"  {{$mahasiswas->jenis_kelamin == 'P' ? 'checked' : ''}}>
				<label class="custom-control-label" for="Perempuan">
				Perempuan
				</label>
				</div>
	    </div>
	    <div class="form-group">
		     <label class="form-control-label">Alamat</label>
	       <textarea name="alamat" cols="10" rows="5" class="form-control">{{$mahasiswas->alamat}}</textarea>
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tempat Lahir</label>
	       <input type="text" name="tempat_lahir" class="form-control" value="{{$mahasiswas->tempat_lahir}}">
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tanggal Lahir</label>
	       <input type="date" name="tgl_lahir" class="form-control" value="{{ $mahasiswas->tgl_lahir}}">
	    </div>
	    <div class="form-group">
         <label class="form-control-label">Tahun Masuk</label>
	       <input type="number" name="thn_masuk" class="form-control" value="{{$mahasiswas->thn_masuk}}">
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Update</button>
	    </div>
	     </form>
 </div>
@endsection
