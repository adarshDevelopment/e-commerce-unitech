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
            <div class="card">
                <div class="card-header">
                    {{--                    <h3 class="card-title">{{$title}} {{$panel}}</h3>--}}
                    <a href="{{route($base_route.'.create')}}" class="btn btn-info">Create {{$panel}}</a>
                </div>
                <div class="card-body">
                    @include('backend.includes.flash_message')
                    <table class="table table-bordered">
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
{{--                            <th>Role</th>--}}
                            <th>Options</th>
                        </tr>
                        <tbody>
                        @forelse($data['rows'] as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
{{--                                <td>{{$row->roles}}</td>--}}
                                <td>
                                    <a href="{{route($base_route.'.show', $row->id)}}" class="btn btn-primary">View</a>
                                    <a href="{{route($base_route.'.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route($base_route.'.destroy', $row->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Data Not found</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection










