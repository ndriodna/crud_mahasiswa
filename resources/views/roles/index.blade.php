@extends('layouts.app')
@section('content')
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('dashboard') }}">{{ __('Mahasiswa') }}</a>
    </div>
</nav>
    <div class="bg-primary pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid" style="margin-top: -100px; margin-bottom: 50px;">
	<div class="row ">
		<div class="col-md-4">
			<div class="card bg-white rounded p-2 shadow-lg">
			<form action="{{route('roles.store')}}" method="POST" class="card-body">
				@csrf
				<div class="form-group">
					<label for="">Role</label>
					<input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " required>
				</div>
					<button class="btn btn-primary">Simpan</button>
			</form>
			</div>
		</div>
	<div class="col-md-8">
		<div class="card rounded p-3 shadow-lg">
     <table class="table table-striped table-bordered data-table bg-white text-dark card-body">
        <thead>
            <tr>
                <th>#</th>
                <th>Role</th>
                <th>Guard</th>
                <th>created At</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        	@php $no=1; @endphp
        	@foreach($roles as $data)
        	<tr>
        		<td>{{$no++}}</td>
        		<td>{{$data->name}}</td>
        		<td>{{$data->guard_name}}</td>
        		<td>{{ date('d-m-Y', strtotime($data->created_at))}}</td>
        		<td>
        			<form action="{{route('roles.destroy',$data->id)}}" method="POST">
        				@csrf
        				@method('DELETE')
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
 </div>
@endsection