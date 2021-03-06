@extends('layouts.app')

@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Jurusan') }}</a>
    </div>
</nav>
    <div class="bg-primary pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid" style="margin-top: -150px; margin-bottom: 50px;">
        <div class="p-2 bg-white rounded">
    	<a href="{{route('jurusan.create')}}" class="btn btn-success m-3"><i class="fas fa-plus-square"></i> Tambah</a>
    	<div>
    		
     <table class="table table-striped table-bordered data-table bg-white tex-dark">
        <thead>
            <tr>
                <th>kode Jurusan</th>
                <th>Jurusan</th>
                <th>Akreditasi</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($jurusans as $data)
        	<tr>
        		<td>{{$data->kd_jurusan}}</td>
        		<td>{{$data->nama_jurusan}}</td>
        		<td>{{$data->akreditasi}}</td>
        		<td>
        			<form action="{{route('jurusan.destroy',$data->id)}}" method="POST">
        				@csrf
        				@method('DELETE')
        		<a href="{{route('jurusan.edit',$data->id)}}" class="btn btn-warning"><i class="fas fa-pen-square"></i></a>
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
