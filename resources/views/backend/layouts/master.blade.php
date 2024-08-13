<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/backend/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('backend.includes.top_nav')
    <!-- Main Sidebar Container -->
    @include('backend.includes.sidebar')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ now()->year }} <a href="#">Unitech Computers</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
{{--            <b>Version</b> 3.1.0--}}
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


















<!-- jQuery -->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('assets/backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('assets/backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/backend/dist/js/pages/dashboard3.js')}}"></script>

@yield('js')

</body>
</html>

