<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link" target="_blank">
        <img src="{{ asset('admin_assets/dist/img/AdminLTELogo.png') }}" alt="{{ config('app.name') }}"
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
                    <a href="{{ route('admin.notices.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Notices
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            SBH Admins
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Pages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 2) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Welcome message</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 3) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Page</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 4) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>History Page</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 5) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Residents Page</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 6) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Activities Page</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 7) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About SHBAA</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 8) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>member of SBHAA ?</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', 9) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Membership</p>
                            </a>
                        </li>



                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Alumni
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.alumins.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Notable alumni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.alumni-data.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alumni database</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.alumni-data-pending') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending approval</p>
                            </a>
                        </li>


                    </ul>
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
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Inquiry
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.site-settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sliders
                        </p>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
