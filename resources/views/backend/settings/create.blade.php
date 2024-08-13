@extends('backend.layouts.master')
@section('title', $title . " ". $panel)

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.includes.top_header')
    <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">

            <!-- Default box -->
            <div class="col-lg-12">
                <a href="{{route($base_route.'.index')}}" class="btn btn-info">List {{$panel}}</a>
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <h3 class="card-title">Create {{$panel}}</h3>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => [$base_route. '.store'], 'method' => 'POST', 'files' => true]) !!}

                        @include($view_path.'.includes.main_form', ['button' => 'save'])

                        {!! Form::Close() !!}

                    </div>
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection


@section('js')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        CKEDITOR.replace('about_us');
    </script>
@endsection

