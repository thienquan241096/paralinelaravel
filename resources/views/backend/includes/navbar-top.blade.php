<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <ol class="breadcrumb float-sm-right breadcrumb-top-nav">
            <li class="breadcrumb-item"><a href="{{ route('backend.admin.dashboard.show') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            @if(isset($list))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $list ?? __('') }}</a></li>
            @endif
            @if(isset($show) && isset($id))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $show ?? __('') }}</a></li>
                <li class="breadcrumb-item active">{{ $id ?? __('') }}</li>
                <li class="breadcrumb-item active">View</li>
            @endif
            @if(isset($edit) && isset($id))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $edit ?? __('') }}</a></li>
                <li class="breadcrumb-item active">{{ $id ?? __('') }}</li>
                <li class="breadcrumb-item active">Edit</li>
            @endif
            @if(isset($add))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $add ?? __('') }}</a></li>
            @endif
        </ol>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> -->

        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.homepage.show') }}" >
                <i class="fas fa-home"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
