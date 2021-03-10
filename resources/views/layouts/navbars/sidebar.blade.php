<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        @foreach(Auth::user()->getRoleNames() as $role)
        <span>{{$role}}</span>
        @endforeach
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @role('Dosen')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Biodata') }}
                    </a>
                </li>
                @endrole
                @role('mahasiswa')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Biodata') }}
                    </a>
                </li>
                @endrole
                @can('edit dosen')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dosen.index') }}">
                        <i class="ni ni-circle-08 text-primary"></i> {{ __('Dosen') }}
                    </a>
                </li>
                @endcan
                @can('edit mahasiswa')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                        <i class="ni ni-circle-08 text-blue"></i> {{ __('Mahasiswa') }}
                    </a>
                </li>
                @endcan
                @can('edit jurusan')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jurusan.index') }}">
                        <i class="ni ni-tag text-blue"></i> {{ __('Jurusan') }}
                    </a>
                </li>
                @endcan
                {{-- user management --}}
                @role('super admin')
                <div class="dropdown">
                    <li class="nav-item">
                        <a class="nav-link" href="#" d="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            <i class="ni ni-tag text-blue"></i> {{ __('Management user') }}
                        </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="ni ni-tag text-blue"></i> {{ __(' user') }}
                            </a>
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <i class="ni ni-tag text-blue"></i> {{ __('Role') }}
                            </a>
                            <a class="nav-link" href="{{ route('roles.role_permissions') }}">
                                <i class="ni ni-tag text-blue"></i> {{ __('Permission') }}
                            </a>
                    </div>
                </li>
                </div>
                @endrole
            </ul>
        </div>
    </div>
</nav>
