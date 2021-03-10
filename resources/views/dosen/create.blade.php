@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Dosen') }}</a>
    </div>
</nav>
    <div class="bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid" style="margin-top: -150px">
     <form action="{{route('dosen.store')}}" method="POST" class="bg-white rounded p-6 shadow-lg mb-5" enctype="multipart/form-data">
         @csrf
	     <div class="form-group">
	         <label class="form-control-label">NIDN</label>
	         <input class="form-control" type="text" name="nidn">
         <p class="text-danger">{{ $errors->first('nidn') }}</p>
	     </div>
	     <div class="form-group">
	        <label class="form-control-label">Nama</label>
	        <input class="form-control" type="text" name="nama">
         <p class="text-danger">{{ $errors->first('nama') }}</p>
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
         <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
	    </div>
	    <div class="form-group">
		     <label class="form-control-label">Alamat</label>
	       <textarea name="alamat" cols="10" rows="5" class="form-control"></textarea>
         <p class="text-danger">{{ $errors->first('alamat') }}</p>
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tempat Lahir</label>
	       <input type="text" name="tempat_lahir" class="form-control">
         <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
	    </div>
	    <div class="form-group">
	       <label class="form-control-label">Tanggal Lahir</label>
	       <input type="date" name="tgl_lahir" class="form-control">
       <p class="text-danger">{{ $errors->first('tgl_lahir') }}</p>
	    </div>
	    <div class="form-group">
         <label class="form-control-label">Upload Foto</label>
	       <input type="file" name="photos" class="form-control">
	       <p class="text-danger">{{ $errors->first('photo') }}</p>
	    </div>

	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	     </form>
 </div>
 @push('js')
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
	var lfm = $('#lfm').filemanager('image');
</script>
@endpush
@endsection
