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
    <div class="container-fluid" style="margin-top: -150px">
     <form action="{{route('mahasiswa.store')}}" method="POST" class="bg-white rounded p-6 shadow-lg mb-5">
         @csrf
	     <div class="form-group">
	         <label class="form-control-label">NIM</label>
	         <input class="form-control" type="text" name="nim">
	     </div>
	     <div class="form-group">
	        <label class="form-control-label">Nama</label>
	        <input class="form-control" type="text" name="nama">
	    </div>
	    <div class="form-group">
	        <label class="form-control-label">Jurusan</label>
	        <select name="jurusan_id" class="form-control">
	        @foreach($jurusans as $data)
	       <option value="{{$data->id}}">
	           {{$data->nama_jurusan}}
	       </option>
	       @endforeach    
	        </select>
	    </div>
	    <div class="form-group">
			<label class="form-control-label">Jenis Kelamin</label>
			<div class="custom-control custom-radio mb-3">
				<input class="custom-control-input" id="laki" type="radio" name="jenis_kelamin" value="L">
				<label class="custom-control-label" for="laki">
				Laki-laki
				</label>
			</div>
			<div class="custom-control custom-radio mb-3">
				<input class="custom-control-input" id="Perempuan" type="radio" name="jenis_kelamin" value="P">
				<label class="custom-control-label" for="Perempuan">
				Perempuan
				</label>
				</div>
	    </div>
	    <div class="form-group">
		     <label class="form-control-label">Alamat</label>
	       <textarea name="alamat" cols="10" rows="5" class="form-control"></textarea>
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tempat Lahir</label>
	       <input type="text" name="tempat_lahir" class="form-control">
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tanggal Lahir</label>
	       <input type="date" name="tgl_lahir" class="form-control">
	    </div>
	    <div class="form-group">
         <label class="form-control-label">Tahun Masuk</label>
	       <input type="number" name="thn_masuk" class="form-control">
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	     </form>
 </div>
@endsection
