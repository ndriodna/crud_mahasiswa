@extends('layouts.app')
@section('content')
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
			<form action="{{route('users.add_permission')}}" method="POST" class="card-body">
				@csrf
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " required>
				</div>
					<button class="btn btn-primary" type="sumbit">Add Permission</button>
			</form>
			</div>
		</div>
	<div class="col-md-8">
		<div class="card rounded p-3 shadow-lg">
			<form action="{{route('users.role_permissions')}}" method="GET">
     <div class="form-group">
     	<label for="">Role</label>
     	<select name="role" id="" class="form-control">
     		@foreach($roles as $data)
     		<option value="{{$data}}" {{ request()->get('role') == $data ? 'selected' : '' }}>{{$data}}</option>
     		@endforeach
     	</select>
     	<button class="btn btn-success float-right m-2" type="sumbit">Check</button>
     </div>
			</form>
		</div>
	@if(!empty($permission))
		<div class="card rounded p-3 m-2">
			<form action="{{route('users.setRolePermission',request()->get('role'))}}" method="POST">
				@csrf
				@method('PUT')
				<div style="overflow-y: scroll; height: 150px;" class="m-2">
				@foreach($permission as $key => $row)
				<input type="checkbox" 
				name="permission[]"
				value="{{$row}}"
				{{ in_array($row, $hasPermission) ? 'checked' : ''	}}> {{$row}} <br>
				@endforeach
				</div>
				<button class="btn btn-danger btn-sm float-right m-2" type="sumbit">set permission</button>
			</form>
		</div>
	@endif
    	</div>
	</div>
 </div>
@endsection