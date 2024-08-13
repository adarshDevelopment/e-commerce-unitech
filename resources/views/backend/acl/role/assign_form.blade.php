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
                        <h3>{{$data['role']->name}}</h3>

                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => [$base_route. '.assign_permission'], 'method' => 'POST']) !!}
                        {!! Form::hidden('role_id', $data['role']->id) !!}
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{$data['role']->name}}</td>
                            </tr>

                            @foreach($data['modules'] as $module)

                                <tr>
                                    <td colspan="2">{{$module->name}}</td>
                                    <td>
                                        <ul type="none">
                                            @foreach($module->permissions as $permission)
                                                @if(in_array($permission->id, $data['assigned_permissions']))
                                                    <li>{!! Form::checkbox('permission_id[]', $permission->id,true) !!} {{$permission->name}}</li>
                                                @else
                                                    <li> {!! Form::checkbox('permission_id[]', $permission->id) !!} {{$permission->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>

                            @endforeach

                        </table>
                        {!! Form::submit('Assign Permissions', ['class' => 'btn btn-success']) !!}
                        {!! Form::Close() !!}
                    </div>

                </div>


            </div>
        </section>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection







