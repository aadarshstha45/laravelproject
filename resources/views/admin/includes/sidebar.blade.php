<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('fronthome') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"> Hotel </span>
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

                <li class="nav-item {{ request()->is('dashboard*') ? 'menu-open' : "" }}">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : "" }}">

                        <i class="nav-icon fas fa-tachometer-alt" ></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>



              <li class="nav-item {{ request()->is('roomcategory*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('roomcategory*') ? 'active' : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Room Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('roomcategory.index') }}" class="nav-link {{ request()->is('roomcategory') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roomcategory.create') }}" class="nav-link {{ request()->is('roomcategory/create') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('room*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('room*') ? 'active' : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Room
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('room.index') }}" class="nav-link {{ request()->is('room') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('room.create') }}" class="nav-link {{ request()->is('room/create') ? 'active' : "" }}">
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

                    </ul>
                </li>

                <li class="nav-item {{ request()->is('bookings*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('bookings*') ? 'active' : "" }}">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Bookings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bookings.list') }}" class="nav-link {{ request()->is('bookings') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ request()->is('payment*') ? 'menu-open' : "" }}">
                    <a href="#" class="nav-link {{ request()->is('payment*') ? 'active' : "" }}">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Payment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('payment.index') }}" class="nav-link {{ request()->is('payment') ? 'active' : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>

                    </ul>
                </li>



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
