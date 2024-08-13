<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('backend.dashboard.index')}}" class="brand-link">
        <img src="{{asset('assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('backend.dashboard.index')}}" class="nav-link" active @if(request()->is('backend/dashboard/*')) active @endif>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p >
                            Dashboard
                        </p>
                    </a>
                </li>

{{--                Setup Data--}}
                <li class="nav-header">Primary Data</li>
                <li class="nav-item @if(request()->is('backend/parent*')) menu-open bg-primary @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Parent Data
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('backend.parent.tag.index')}}" class="nav-link @if(request()->is('backend/parent/tag*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tag</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('backend.parent.category.index')}}" class="nav-link @if(request()->is('backend/parent/category*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('backend.parent.subcategory.index')}}" class="nav-link @if(request()->is('backend/parent/subcategory*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subcategory</p>
                            </a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('backend.parent.specification.index')}}" class="nav-link @if(request()->is('backend/parent/specification*')) active @endif">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Specification</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        <li class="nav-item">
                            <a href="{{route('backend.parent.attribute.index')}}" class="nav-link @if(request()->is('backend/parent/attribute*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attribute</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header">Product</li>
                <li class="nav-item">
                    <a href="{{route('backend.product.index')}}" class="nav-link @if(request()->is('backend/product*')) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>




                <li class="nav-header">Orders</li>
                <li class="nav-item">
                    <a href="{{route('backend.order.index')}}" class="nav-link @if(request()->is('backend/order*')) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>









                <li class="nav-item">
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-copy"></i>--}}
{{--                        <p>--}}
{{--                            Customer--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                            <span class="badge badge-info right"></span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">ACL</li>
                <li class="nav-item @if(request()->is('backend/acl*')) menu-open bg-primary @endif">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            ACL
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('backend.acl.role.index')}}" class="nav-link @if(request()->is('backend/acl/role*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.acl.module.index')}}" class="nav-link @if(request()->is('backend/acl/module*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Module</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.acl.permission.index')}}" class="nav-link @if(request()->is('backend/acl/permission*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Profile</li>

                <li class="nav-item">
                    <a href="{{route('backend.user.index')}}" class="nav-link @if(request()->is('backend/user*')) active @endif">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('backend.settings.index')}}" class="nav-link @if(request()->is('backend/settings*')) active @endif">
                        <i class="nav-icon fas fa-gear"></i>
{{--                        <i class="fa-solid fa-gear"></i>--}}
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        {{__('Logout')}}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
