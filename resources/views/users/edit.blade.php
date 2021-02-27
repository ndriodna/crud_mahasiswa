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
     <form action="{{route('users.update',$user->id)}}" method="POST" class="bg-white rounded p-6 shadow-lg mb-5">
         @csrf
         @method('PUT')
	     
	      <div class="form-group">
	        <label class="form-control-label">Mahasiswa ID</label>
	       <select name="kode_user" class="form-control">
	       	@foreach($mahasiswa as $data)
	       	<option value="{{$data->nim}}" {{$data->nim == $user->kode_user ? 'selected' : ''}}>{{$data->nim}} - {{$data->nama}}</option>
	       	@endforeach
	       </select>
	    </div>
	    <div class="form-group">
	        <label class="form-control-label">Nama</label>
	       <input type="text" class="form-control" name="name" value="{{$user->name}}">
         <p class="text-danger">{{ $errors->first('name') }}</p>
	    </div>
	    <div class="form-group">
	         <label class="form-control-label">Email</label>
	         <input class="form-control" type="email" name="email" required value="{{$user->email}}">
         <p class="text-danger">{{ $errors->first('email') }}</p>
	     </div>
	   <div class="form-group">
	        <label class="form-control-label">Password</label>
	        <input class="form-control" type="password" name="password">
         <p class="text-danger">kosong kan password jika tidak diubah</p>
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	     </form>
 </div>
@endsection
