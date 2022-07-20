<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/')}}" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="VGD Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('admin.category.index')}}" class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('superadmin/profile') || Request::is('superadmin/change-password') ? 'menu-open' : '' }}">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p> Settings <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.profile')}}" class="nav-link {{ Request::is('superadmin/profile') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.change-password')}}" class="nav-link {{  Request::is('superadmin/change-password') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>