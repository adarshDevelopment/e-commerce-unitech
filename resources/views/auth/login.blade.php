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

            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <span class="alert text-danger">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <span class="alert text-danger">
                        <strong>{{$meyssage}}</strong>
                    </span>
                @enderror


                {{--                <a href="{{route('register')}}" class="btn btn-primary">Register</a>--}}

                <div class="row">
                {{--                    <div class="col-8">--}}
                {{--                        <div class="icheck-primary">--}}
                {{--                            <input type="checkbox" id="remember" name="remember" {{old('remember') ? 'checked' : ''}}>--}}
                {{--                            <label for="remember">--}}
                {{--                               --}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <!-- /.col -->
                    {{--                    <div class="col-4">--}}
                    {{--                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>--}}
                    {{--                    </div>--}}

                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="col-4">--}}
                    {{--                        <a href="{{route('register')}}" class="btn btn-primary">Register</a>--}}
                    {{--                    </div>--}}
                </div>
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
