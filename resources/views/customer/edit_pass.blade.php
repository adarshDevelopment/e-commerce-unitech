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
                    <div class="content-page" style="min-height: 50vh">

                        @if(session('success_message'))
                            <div class="alert alert-success" role="alert">
                                {{session('success_message')}}
                            </div>

                        @elseif(session('error_message'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error_message')}}
                            </div>
                        @endif

                        {!! Form::model($data['details'], ['route' => ['frontend.customer.update_pass', $data['details']->id], 'method' => 'PUT', 'files' => true ]) !!}

                        {!! Form::hidden('id', $data['details']->id) !!}
                            <div class="form-group">
                                {!! Form::label('new_password', 'Password') !!}
                                {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter new password', 'required' =>'required']) !!}
                                @if($errors->has('new_password'))
                                    <span class="text-danger">{!! $errors->first('new_password') !!}</span>
                                @endif
                            </div>

                        <div class="form-group">
                            {!! Form::label('confirm_password', 'Confirm Password') !!}
                            {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm password', 'required' =>'required']) !!}
                            @if($errors->has('confirm_password'))
                                <span class="text-danger">{!! $errors->first('confirm_password') !!}</span>
                            @endif
                        </div>
                            <div class="form-group">
                                {!! Form::label('old_password', 'Enter old Password') !!}
                                {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Enter old password', 'required' =>'required']) !!}
                                @if($errors->has('old_password'))
                                    <span class="text-danger">{!! $errors->first('old_password') !!}</span>
                                @endif
                            </div>
                        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                        {!! Form::Close() !!}



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
