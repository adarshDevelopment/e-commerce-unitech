<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'Laravel')}} | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/backend/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{route('home')}}"><b>{{config('app.name')}}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Full name" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="text text-danger">
                        <strong>{{ $message }} </strong>
                        </span>
                    @enderror

                </div>


                {{--                <div class="form-group row">--}}
                {{--                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                {{--                    <div class="col-md-6">--}}
                {{--                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

                {{--                        @error('name')--}}
                {{--                        <span class="invalid-feedback" role="alert">--}}
                {{--                                        <strong>{{ $message }}</strong>--}}
                {{--                                    </span>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="input-group mb-3">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        @error('email')
                        <span class="text text-danger">
                            <strong>{{$message}} </strong>
                        </span>
                        @enderror
                    </div>
                </div>



                {{--                                <div class="form-group row">--}}
                {{--                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                {{--                                    <div class="col-md-6">--}}
                {{--                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

                {{--                                        @error('email')--}}
                {{--                                        <span class="invalid-feedback" role="alert">--}}
                {{--                                                        <strong>{{ $message }}</strong>--}}
                {{--                                                    </span>--}}
                {{--                                        @enderror--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                <div class="input-group mb-3">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" @error('password') is-invalid @enderror" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="text text-danger">
                        <strong>{{ $message }} </strong>
                    </span>
                    @enderror
                </div>


                {{--                <div class="form-group row">--}}
                {{--                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                {{--                    <div class="col-md-6">--}}
                {{--                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                {{--                        @error('password')--}}
                {{--                        <span class="invalid-feedback" role="alert">--}}
                {{--                                        <strong>{{ $message }}</strong>--}}
                {{--                                    </span>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="input-group mb-3">
                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Retype password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span class="text text-danger">
                        <strong>{{ $message }} </strong>
                    </span>
                    @enderror
                </div>

                {{--                <div class="form-group row">--}}
                {{--                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                {{--                    <div class="col-md-6">--}}
                {{--                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

                {{--                <a href="{{route('login')}}" class="btn btn-primary"> Sign in </a>--}}


            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
