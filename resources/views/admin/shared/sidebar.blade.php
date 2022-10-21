<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('admin_assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SBH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="nav-icon fas fa-user-circle fa-2x" style="color: white;"></i>
                {{-- <img src="{{ asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <span href="#" class="d-block text-white">{{ auth()->user()->name }}</span>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Admins
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Pages
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.administrator.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Administrator
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.notices.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Notices
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
