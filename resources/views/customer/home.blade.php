@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('main-content')

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Store</a></li>
                <li class="active">My Account Page</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-3">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="{{route('customer.home')}}"><i class="fa fa-angle-right"></i> Home</a></li>
                        <li class="list-group-item clearfix"><a href="{{route('frontend.customer.edit_pass')}}"><i class="fa fa-angle-right"></i> Change Password</a></li>
                        <li class="list-group-item clearfix"><a href="{{route('frontend.customer.orders')}}"><i class="fa fa-angle-right"></i> View Orders</a></li>
                        <li class="list-group-item clearfix"><a class="nav-link" href="{{ route('customer.logout') }}"
                                                                onclick="event.preventDefault();
                                document.getElementById('logout-form-customer').submit();">
                                {{__('Logout')}}
                            </a></li>
                    </ul>
                </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7" style="min-height: 50vh">
                    <h1>Welcome {{Auth::guard('customer')->user()->name}}</h1>
                    @if(session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>

                    @elseif(session('failure_message'))
                        <div class="alert alert-danger" role="alert">
                            Error Adding Product to cart!
                        </div>
                    @endif
                    <div class="content-page" style="min-height: 50vh">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="{{route('frontend.customer.edit_info')}}">Edit your account information</a></li>
                            <li><a href="{{route('frontend.customer.edit_pass')}}">Change your password</a></li>
                        </ul>
                        <hr>

                        <h3>My Orders</h3>
                        <ul>
                            <li><a href="{{route('frontend.customer.orders')}}">View your order history</a></li>
                        </ul>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>




@endsection
{{--<div class="panel-body row">--}}


{{--    <a class="nav-link" href="{{ route('customer.logout') }}"--}}
{{--       onclick="event.preventDefault();--}}
{{--        document.getElementById('logout-form-customer').submit();">--}}
{{--        <i class="nav-icon fas fa-sign-out-alt"></i>--}}
{{--        {{__('Logout')}}--}}
{{--    </a>--}}

{{--    <form id="logout-form-customer" action="{{route('customer.logout')}}" method="POST">--}}
{{--        @csrf--}}
{{--    </form>--}}

{{--    <div class="col-md-6 col-sm-6">--}}
{{--                                                <h3>User Login</h3>--}}
{{--        <h2>Customer panel</h2>--}}
{{--    </div>--}}
{{--</div>--}}
