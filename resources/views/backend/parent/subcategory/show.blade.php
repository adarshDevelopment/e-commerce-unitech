@extends('backend.layouts.master')
@section('title', $title.' '.$panel)
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
                                <th>Slug</th>
                                <td>{{$data['row']->slug}}</td>
                            </tr>

                            <tr>
                                <th>Short Description</th>
                                <td>{{$data['row']->short_description}}</td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{!! $data['row']->description !!}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img src="{{asset('images/backend/parent/category/'. $data['row']->image)}}"  alt="" width="100"></td>
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
                        <h4>Meta Information</h4>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Meta Title</th>
                                <td>{{$data['row']->meta_title}}</td>
                            </tr>
                            <tr>
                                <th>Meta Description</th>
                                <td>{{$data['row']->meta_description}}</td>
                            </tr>
                            <tr>
                                <th>Meta Keyword</th>
                                <td>{{$data['row']->meta_keyword}}</td>
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











