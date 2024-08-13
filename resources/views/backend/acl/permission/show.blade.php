@extends('backend.layouts.master')
@section('title', $title. ' '. $panel)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.includes.top_header')

    <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="col-lg-12">
                <a href="{{route($base_route.'.index')}}" class="btn btn-primary">List {{$panel}}</a>
                <a href="{{route($base_route.'.create')}}" class="btn btn-success">Create {{$panel}} </a>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>{{$data['row']->name}}</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{$data['row']->name}}</td>
                            </tr>

                            @include('backend.includes.status')

                            <tr>
                                <th>Route</th>
                                <td>{{$data['row']->route}}</td>
                            </tr>

                            <tr>
                                <th>Module</th>
                                <td>{{$data['row']->getModuleId->name}}</td>
                            </tr>

                            <tr>
                                <th>Created by</th>
                                <td>@if($data['row']->created_by){{$data['row']->createdBy->name}} @endif</td>
                            </tr>

                            <tr>
                                <th>Updated by</th>
                                <th>{{$data['row']->updated_by}}</th>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <th>{{$data['row']->created_at}}</th>
                            </tr>

                            <tr>
                                <th>Updated at</th>
                                <th>
                                    {{$data['row']->updated_at}}
                                </th>
                            </tr>

                            <tr>
                                <th>Deleted at</th>
                                <th>{{$data['row']->deleted_at}}</th>
                            </tr>
                        </table>
                    </div>

                </div>


            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection











