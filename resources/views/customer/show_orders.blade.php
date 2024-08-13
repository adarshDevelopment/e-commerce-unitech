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
{{--                    <h1>Welcome {{Auth::guard('customer')->user()->name}}</h1>--}}
                    <div class="content-page" style="min-height: 50vh">

                        <table class="table table-bordered">
                            <thead>
                            @foreach($data['order_details'] as $order)
                                <tr>
                                    <th>{{$order->products->title}}</th>
                                    <td>
                                        <ul>
                                            <li>Unit Price: Rs. <b>{{$order->total}}</b></li>
                                            <li>Quantity: <b>{{$order->quantity}}</b></li>
                                            <li>Discount amount: Rs. <b>{{$order->discount}}</b></li>
                                            <li>Discounted Price: Rs. <b>{{$order->discounted_price}}</b></li>
                                            <li>Taxable amount: Rs. <b{{$order->tax}}></b></li>
                                            <li>Total amount before tax: Rs. <b>{{$order->subtotal}}</b></li>
                                            <li>Total amount after tax: Rs. <b>{{$order->total}}</b></li>
                                            <li>Checkout Date: <b>{{$order->created_at->toDateString()}}</b></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </thead>
                            <tbody>
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
