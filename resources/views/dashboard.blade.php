<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="wrapper">

                    <!-- Navbar -->
                    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="z-index:2">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav navbar-collapse">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                        class="fas fa-bars"></i></a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="index3.html" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <!-- Right navbar links -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Navbar Search -->
                            <li class="nav-item">
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <!-- Teams Dropdown -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                        <div class="ml-3 relative">
                                            <x-jet-dropdown align="right" width="60">
                                                <x-slot name="trigger">
                                                    <span class="inline-flex rounded-md">
                                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                            {{ Auth::user()->currentTeam->name }}
                    
                                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </x-slot>
                    
                                                <x-slot name="content">
                                                    <div class="w-60">
                                                        <!-- Team Management -->
                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            {{ __('Manage Team') }}
                                                        </div>
                    
                                                        <!-- Team Settings -->
                                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                            {{ __('Team Settings') }}
                                                        </x-jet-dropdown-link>
                    
                                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                                {{ __('Create New Team') }}
                                                            </x-jet-dropdown-link>
                                                        @endcan
                    
                                                        <div class="border-t border-gray-100"></div>
                    
                                                        <!-- Team Switcher -->
                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            {{ __('Switch Teams') }}
                                                        </div>
                    
                                                        @foreach (Auth::user()->allTeams() as $team)
                                                            <x-jet-switchable-team :team="$team" />
                                                        @endforeach
                                                    </div>
                                                </x-slot>
                                            </x-jet-dropdown>
                                        </div>
                                    @endif
                    
                                    <!-- Settings Dropdown -->
                                    <div class="ml-3 relative">
                                        <x-jet-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                    </button>
                                                @else
                                                    <span class="inline-flex rounded-md">
                                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                            {{ Auth::user()->name }}
                    
                                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                @endif
                                            </x-slot>
                    
                                            <x-slot name="content">
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Account') }}
                                                </div>
                    
                                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>
                    
                                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                        {{ __('API Tokens') }}
                                                    </x-jet-dropdown-link>
                                                @endif
                    
                                                <div class="border-t border-gray-100"></div>
                    
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                    
                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             @click.prevent="$root.submit();">
                                                        {{ __('Log Out') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                                </div>
                    
                                <!-- Hamburger -->
                                <div class="-mr-2 flex items-center sm:hidden">
                                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.navbar -->

                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-collapse sidebar-light-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="index3.html" class="brand-link">
                            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                                class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-weight-light">AdminLTE 3</span>
                        </a>

                        <!-- Sidebar -->
                        <div class="sidebar">
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                                        alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                                </div>
                            </div>

                            <!-- SidebarSearch Form -->
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                                    <li class="nav-item menu-open">
                                        <a href="#" class="nav-link active">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                        <!-- /.sidebar -->
                    </aside>

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Dashboard</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Small boxes (Stat box) -->
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <x-card b-type="info" i-type="bag" detail="New Orders" count="500"/>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <x-card b-type="success" i-type="stats-bars" detail="Bounce Rate" count="20%"/>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <x-card b-type="warning" i-type="person-add" detail="User Registration" count="240"/>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <x-card b-type="danger" i-type="pie-graph" detail="Unique Visitors" count="1500"/>
                                    </div>
                                   
                                </div>
                                <!-- /.row -->
                                <!-- Main row -->
                                <div class="row">
                                    <!-- Left col -->
                                    <section class="col-lg-7 connectedSortable">
                                        <!-- Custom tabs (Charts with tabs)-->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-chart-pie mr-1"></i>
                                                    Sales
                                                </h3>
                                            </div><!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="tab-content p-0">
                                                    <!-- Morris chart - Sales -->
                                                    <div class="chart tab-pane active" id="revenue-chart"
                                                        style="position: relative; height: 340px;">
                                                        <canvas id="salesChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->


                                    </section>
                                    <!-- /.Left col -->
                                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                                    <section class="col-lg-5 connectedSortable">

                                        <!-- Map card -->
                                        <div class="card bg-gradient-primary">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    Visitors
                                                </h3>
                                                <!-- card tools -->
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-primary btn-sm daterange"
                                                        title="Date range">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <div class="card-body">
                                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                                            </div>
                                            <!-- /.card-body-->
                                            <div class="card-footer bg-transparent">
                                                <div class="row">
                                                    <div class="col-4 text-center">
                                                        <div id="sparkline-1"></div>
                                                        <div class="text-white">Visitors</div>
                                                    </div>
                                                    <!-- ./col -->
                                                    <div class="col-4 text-center">
                                                        <div id="sparkline-2"></div>
                                                        <div class="text-white">Online</div>
                                                    </div>
                                                    <!-- ./col -->
                                                    <div class="col-4 text-center">
                                                        <div id="sparkline-3"></div>
                                                        <div class="text-white">Sales</div>
                                                    </div>
                                                    <!-- ./col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </section>
                                    <!-- right col -->
                                </div>
                                <!-- /.row (main row) -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>

                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                        <!-- Control sidebar content goes here -->
                    </aside>
                    <!-- /.control-sidebar -->

                    @push('script')
                        <script>
                            // var months = {!! json_encode($labels, JSON_HEX_TAG) !!};
                            // var userCount = {!! json_encode($data, JSON_HEX_TAG) !!};
                            // or,
                            var months = {{ Js::from($labels) }};
                            var userCount = {{ Js::from($data) }};

                            const data = {
                                labels: months,
                                datasets: [{
                                    label: 'Users Dataset',
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: userCount,
                                }],
                            };

                            const config = {
                                type: 'line',
                                data: data,
                                options: {}
                            };

                            const salesChart = new Chart(
                                document.getElementById('salesChart'),
                                config
                            );
                        </script>
                    @endpush
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
