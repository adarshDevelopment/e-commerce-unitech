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
                </div>
                <div class="card-body">
                    @include('backend.includes.flash_message')
                    <table class="table table-bordered">
                        <tr>
                            <th>SN</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Options</th>
                        </tr>
                        <tbody>
                        @forelse($data['rows'] as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->id}}</td>
                                <td>{{$row->customers->name}}</td>
{{--                                <td>--}}
{{--                                    @if($row->status == 1)--}}
{{--                                        <span class="text-success">Active</span>--}}
{{--                                    @else--}}
{{--                                        <span class="text-danger">De-active</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td>{{$row->created_at->toDateString()}}</td>
                                <td>
                                    <a href="{{route($base_route.'.show', $row->id)}}" class="btn btn-primary">View</a>
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










