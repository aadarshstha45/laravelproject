<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Cars Easy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">


                <a href="#" class="d-block">{{ ucwords(auth()->user()->name) }}</a>
            </div>
        </div>

        {{-- <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

                <li class="nav-item {{ request()->is('home*') ? 'menu-open' : "" }}">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home*') ? 'active' : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                 <li class="nav-item {{ request()->is('test*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('test*') ? 'active' : "" }}">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Test
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('test.index') }}" class="nav-link {{ request()->is('test') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('test.create') }}" class="nav-link {{ request()->is('test/create') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

              <li class="nav-item {{ request()->is('carbrand*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('carbrand*') ? 'active' : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Car Brand
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('carbrand.index') }}" class="nav-link {{ request()->is('carbrand') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('carbrand.create') }}" class="nav-link {{ request()->is('carbrand/create') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('car*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('car*') ? 'active' : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Car
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('car.index') }}" class="nav-link {{ request()->is('car') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('car.create') }}" class="nav-link {{ request()->is('car/create') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                  <li class="nav-item {{ request()->is('user*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('user*') ? 'active' : "" }}">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('tag.create') }}" class="nav-link {{ request()->is('tag/create') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

            {{--    <li class="nav-item {{ request()->is('attribute*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('attribute*') ? 'active' : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Attribute
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('attribute.index') }}" class="nav-link {{ request()->is('attribute') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('attribute.create') }}" class="nav-link {{ request()->is('attribute/create') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{ route('setting.create') }}" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
