@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('main-content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('frontend.index')}}">Home</a></li>
                <li><a href="#" class="active">Register Customer</a></li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Checkout</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                        <form action="{{route('customer.register.create')}}" method="post">
                            @csrf
                            <div id="checkout" class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title">
                                        <a data-parent="#checkout-page" class="accordion-toggle">
                                            User Login
                                        </a>
                                    </h2>
                                </div>
                                <div id="checkout-content" class="panel-collapse collapse in">
                                    <div class="panel-body row">
                                        <div class="col-md-6 col-sm-6">
                                            <h3>Your Personal Details</h3>

                                            <div class="form-group">
                                                <label for="firstname">Full Name <span class="require">*</span></label>
                                                <input type="name" id="firstname" name="name" class="form-control" required>
                                                @if($errors->has('name'))
                                                    <span class="text-danger">{!! $errors->first('name') !!}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="email">E-Mail <span class="require">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control" required>
                                                @if($errors->has('email'))
                                                    <span class="text-danger">{!! $errors->first('email') !!}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Telephone <span class="require">*</span></label>
                                                <input type="text" id="telephone" name="phone" class="form-control" required>
                                                @if($errors->has('phone'))
                                                    <span class="text-danger">{!! $errors->first('phone') !!}</span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" name="address" class="form-control" required>
                                                @if($errors->has('address'))
                                                    <span class="text-danger">{!! $errors->first('address') !!}</span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-6">


                                            <h3>Your Password</h3>
                                            <div class="form-group">
                                                <label for="password">Password <span class="require">*</span></label>
                                                <input type="password" name="password" id="password" class="form-control" required onChange="onChange()">
                                                @if($errors->has('password'))
                                                    <span class="text-danger">{!! $errors->first('password') !!}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Confirm Password <span class="require">*</span></label>
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required onChange="onChange()">
                                                <span id='message'></span>
                                                @if($errors->has('confirm_password'))
                                                    <span class="text-danger">{!! $errors->first('confirm_password') !!}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <button class="btn btn-primary" type="submit">Register</button>
                                        </div>

                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </form>
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

@section('js')

    <script>
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=confirm_password]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Passwords do not match');
            }
        }
    </script>
@endsection
