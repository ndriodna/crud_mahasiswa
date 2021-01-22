@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('jurusan.index') }}">{{ __('Jurusan') }}</a>
    </div>
</nav>
    <div class="bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid" style="margin-top: -150px">
     <form action="{{route('jurusan.store')}}" method="POST" class="bg-white rounded p-6 shadow-lg mb-5">
         @csrf
	     <div class="form-group">
	         <label class="form-control-label">Kode jurusan</label>
	         <input class="form-control" type="text" name="kd_jurusan">
	     </div>
	     <div class="form-group">
	        <label class="form-control-label">Nama Jurusan</label>
	        <input class="form-control" type="text" name="nama_jurusan">
	    </div>
	     <div class="form-group">
	        <label class="form-control-label">Akreditasi</label>
	        <input class="form-control" type="text" name="akreditasi">
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	     </form>
 </div>
@endsection
