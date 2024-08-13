@extends('backend.layouts.master')
@section('title', $title. ' '. $panel)

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

                        {!! Form::model($data['row'], ['route' => [$base_route. '.update', $data['row']->id], 'method' => 'PUT', 'files' => true ]) !!}

                        {!! Form::hidden('id', $data['row']->id) !!}
                        @include($view_path.'.includes.main_form', ['button' => 'Update'])
                        {!! Form::Close() !!}

                    </div>
                </div>



            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection







