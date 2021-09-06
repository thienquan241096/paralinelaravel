<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard.index') }}" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if(Auth::user())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>
        @endif
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                {{-- data-accordion="false" --}}
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.group.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Group</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.team.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Team</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.employee.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>