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
            <div class="row margin-bottom-40"style="min-height: 100vh">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-2 col-sm-2">
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
                <div class="col-md-10 col-sm-10" style="min-height: 50vh">
                    <h1>Showing order  details of <b> {{Auth::guard('customer')->user()->name}}</b></h1>
                    <div class="content-page" style="min-height: 50vh">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Checkout Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['orders'] as $orders)
                                @foreach($orders->orderDetails as $order )
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$order->products->title}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>Rs. {{$order->total}}</td>
                                        <td>{{$order->created_at->toDateString()}}</td>

                                    </tr>
                                @endforeach

                            @endforeach
                            </tbody>
                        </table>


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
