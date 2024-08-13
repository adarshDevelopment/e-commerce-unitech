@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('main-content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Customer</a></li>
                <li class="active">Login</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Login</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">


{{--                        <div class="col-md-6 col-sm-6">--}}
{{--                            <h3>Returning Customer</h3>--}}
{{--                            <p>I am a returning customer.</p>--}}
{{--                            <form action="{{route('frontend.cart.make_order')}}" method="post">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email-login">E-Mail</label>--}}
{{--                                    <input type="text" id="email-login" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="password-login">Password</label>--}}
{{--                                    <input type="password" id="password-login" class="form-control">--}}
{{--                                </div>--}}
{{--                                <a href="javascript:;">Forgotten Password?</a>--}}
{{--                                <div class="padding-top-20">--}}
{{--                                    <button class="btn btn-primary" type="submit">Login</button>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                                <div class="login-socio">--}}
{{--                                    <p class="text-muted">or login using:</p>--}}
{{--                                    <ul class="social-icons">--}}
{{--                                        <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>--}}
{{--                                        <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>--}}
{{--                                        <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>--}}
{{--                                        <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-parent="#checkout-page" class="accordion-toggle">
                                        User Login
                                    </a>
                                </h2>
                            </div>
                            @if(session('success_message'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success_message')}}
                                </div>

                            @elseif(session('failure_message'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('failure_message')}}
                                </div>
                            @endif
                            <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
{{--                                    <div class="col-md-6 col-sm-6">--}}
{{--                                        <h3>New Customer</h3>--}}
{{--                                        <p>Checkout Options:</p>--}}
{{--                                        <div class="radio-list">--}}
{{--                                            <label>--}}
{{--                                                <input type="radio" name="account"  value="register"> Register Account--}}
{{--                                            </label>--}}
{{--                                            <label>--}}
{{--                                                <input type="radio" name="account"  value="guest"> Guest Checkout--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>--}}
{{--                                        <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</button>--}}
{{--                                    </div>--}}
                                    <div class="col-md-6 col-sm-6">
{{--                                        <h3>User Login</h3>--}}
                                        <form action="{{route('customer.login')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email-login">E-Mail</label>
                                                <input type="text" name="email" id="email-login" class="form-control">
                                                @if($errors->has('email'))
                                                    <span class="text-danger">{!! $errors->first('email') !!}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="password-login">Password</label>
                                                <input type="password" name="password" id="password-login" class="form-control">
                                                @if($errors->has('password'))
                                                    <span class="text-danger">{!! $errors->first('password') !!}</span>
                                                @endif
                                            </div>
                                            <a href="javascript:;">Forgotten Password?</a>
                                            <div class="padding-top-20">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                                <a href="{{route('customer.register.create')}}" class="btn btn-success"> Register</a>
                                            </div>
                                            <hr>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END CHECKOUT -->


                    </div>
                    <!-- END CHECKOUT PAGE -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@endsection
