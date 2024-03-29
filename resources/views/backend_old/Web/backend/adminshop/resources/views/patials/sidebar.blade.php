<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <form action="{{ route('postlogout') }}" method="post">
            @csrf
            <button type="submit">logout</button>
        </form>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
            @endif
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
                    @can('category-list')
                    <a href="{{ route('category_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh Mục Sản Phẩm
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('menu-list')
                    <a href="{{ route('menu_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menus
                        </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('product-list')
                    <a href="{{ route('product_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách sản phẩm
                        </p>
                    </a>
                    @endcan
                </li>

                <li class="nav-item">
                    @can('slider-list')
                    <a href="{{ route('slider_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                    @endcan
                </li>

                <li class="nav-item">
                    @can('setting-list')
                    <a href="{{ route('setting_index') }}" class="nav-link">
                        <i class="fas fa-project-diagram"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                    @endcan
                </li>


                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('user_index') }}" class="nav-link">
                        <i class="fas fa-user-alt"></i>
                        <p>
                            Danh Sách User
                        </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('role-list')
                    <a href="{{ route('role_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách vai trò
                        </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">

                    <a href="{{ route('create_permisstion') }}" class="nav-link">
                        <p>
                            Tạo dữ liệu Role
                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
