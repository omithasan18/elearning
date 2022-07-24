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
                <li class="nav-item has-treeview">
                    <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.category.index')}}" class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('superadmin/users') || Request::is('superadmin/users/create') ? 'menu-open' : '' }}">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p> User <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.users.create')}}" class="nav-link {{ Request::is('superadmin/users/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.users.index')}}" class="nav-link {{ Request::is('superadmin/course') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('superadmin/course') || Request::is('superadmin/course/create') ? 'menu-open' : '' }}">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Course <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.course.create')}}" class="nav-link {{ Request::is('superadmin/course/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Course Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.course.index')}}" class="nav-link {{ Request::is('superadmin/course') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Course</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('superadmin/lesson') || Request::is('superadmin/lesson/create') ? 'menu-open' : '' }}">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p> lesson <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.lesson.create')}}" class="nav-link {{ Request::is('superadmin/lesson/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>lesson Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.lesson.index')}}" class="nav-link {{ Request::is('superadmin/lesson') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage lesson</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('superadmin/page-category') || Request::is('superadmin/pages') ? 'menu-open' : '' }}">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p> Page Management <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.page-category.index')}}" class="nav-link {{ Request::is('superadmin/page-category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.pages.index')}}" class="nav-link {{ Request::is('superadmin/pages') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Page</p>
                            </a>
                        </li>
                    </ul>
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