<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="cemex Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CEMEX CLM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (isset(auth()->user()->img))
                    <img src="{{ asset('media/users/img/' . auth()->user()->img) }}"
                        class="img-circle elevation-2 bg-white" alt="User Image">
                @endif
                <img src="{{ asset('img/logo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-header">Basic Data</li> --}}
                @can('Basic Setting')
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                {{ __('Basic Data') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview text-capitalize">
                            @can('Regions List')
                                <li class="nav-item">
                                    <a href="{{ route('regions.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Regions') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Segments List')
                                <li class="nav-item">
                                    <a href="{{ route('segments.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('segments') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Locations List')
                                <li class="nav-item">
                                    <a href="{{ route('locations.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Locations') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Areas List')
                                <li class="nav-item">
                                    <a href="{{ route('areas.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('areas') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Operational States List')
                                <li class="nav-item">
                                    <a href="{{ route('op.states.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Operational State') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Dispatches List')
                                <li class="nav-item">
                                    <a href="{{ route('dispatches.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('switches') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Vlans List')
                                <li class="nav-item">
                                    <a href="{{ route('vlans.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vlans') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Record Devices List')
                                <li class="nav-item">
                                    <a href="{{ route('record.devices.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('record devices') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Maintenance Categories List')
                                <li class="nav-item">
                                    <a href="{{ route('maintenance.category.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('maintenance categories') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Maintenance Tools List')
                                <li class="nav-item">
                                    <a href="{{ route('maintenance.tools.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('maintenance tools') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Cleaning Tools List')
                                <li class="nav-item">
                                    <a href="{{ route('cleaning.tools.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('cleaning tools') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Cameras List')
                                <li class="nav-item">
                                    <a href="{{ route('cameras.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('cameras') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Roles List')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('roles') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Users List')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('users') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            {{ __('Tickets') }}
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-capitalize">
                        @can('Tickets List')
                            <li class="nav-item">
                                <a href="{{ route('tickets.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Open Tickets') }} || <span class="badge bg-danger">
                                            {{ App\Models\Ticket::where('state', 'open')->count() }}
                                        </span>
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('Tickets Closed')
                        <li class="nav-item">
                            <a href="{{ route('tickets.closed.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Closed Tickets') }}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-video"></i>
                        <p>
                            {{ __('Cameras') }}
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview text-capitalize">
                        @can('Cameras List')
                                <li class="nav-item">
                                    <a href="{{ route('cameras.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('cameras') }}</p>
                                    </a>
                                </li>
                            @endcan
                        <li class="nav-item">
                            <a href="{{ route('cameras.offline') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Offline Cameras') }} || <span class="badge bg-danger">
                                        {{ App\Models\Camera::where('state', 'offline')->count() }}
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cameras.online') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Online Cameras') }} || <span class="badge bg-success">
                                        {{ App\Models\Camera::where('state', 'online')->count() }}
                                    </span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
