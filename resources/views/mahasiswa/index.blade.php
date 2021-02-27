@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Mahasiswa') }}</a>
    </div>
</nav>
    <div class="bg-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container" style="margin-top: -150px; margin-bottom: 50px;">
        <div class="p-2 bg-white rounded">
    	<a href="{{route('mahasiswa.create')}}" class="btn btn-success m-3"><i class="fas fa-plus-square"></i> Tambah</a>
            
	<div style="overflow-x: auto;">
     <table class="table table-striped table-bordered data-table bg-white tex-dark">
        <thead>
            <tr>
                <th>nim</th>
                <th>nama</th>
                <th>Jurusan</th>
                <th>JenKel</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tgl lahir</th>
                <th>Thn masuk</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($mahasiswas as $data)
        	<tr>
        		<td><a href="{{route('mahasiswa.show',$data->id)}}">{{$data->nim}}</a></td>
        		<td>{{$data->nama}}</td>
        		<td>{{$data->jurusan->nama_jurusan ? $data->jurusan->nama_jurusan : ''}}</td>
        		<td>{{$data->jenis_kelamin}}</td>
        		<td>{{$data->alamat}}</td>
        		<td>{{$data->tempat_lahir}}</td>
        		<td>{{$data->tgl_lahir}}</td>
        		<td>{{$data->thn_masuk}}</td>
        		<td>
        			<form action="{{route('mahasiswa.destroy',$data->id)}}" method="POST">
        				@csrf
        				@method('DELETE')
        		<a href="{{route('mahasiswa.edit',$data->id)}}" class="btn btn-warning"><i class="fas fa-pen-square"></i></a>
        			<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        		</form>
        		</td>
        	</tr>
        	@endforeach
        </tbody>
    </table>
    	</div>
        </div>
 </div>
 @push('js')
 <script>
    var table = $('.data-table').DataTable()
 </script>
@endpush
@endsection
