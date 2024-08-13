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

                            <tr>
                                <th>Address</th>
                                <td>{{$data['row']->street_address}}</td>
                            </tr>

                            <tr>
                                <th>City</th>
                                <td>{{$data['row']->city}}</td>
                            </tr>

                            <tr>
                                <th>Country</th>
                                <td>{{$data['row']->country}}</td>
                            </tr>

                            <tr>
                                <th>About Us</th>
                                <td>{!! $data['row']->about_us !!}</td>
                            </tr>



                            <tr>
                                <th>Email</th>
                                <td>{{$data['row']->email}}</td>
                            </tr>

                            <tr>
                                <th>Pan number</th>
                                <td>{!! $data['row']->pan_no !!}</td>
                            </tr>


                            <tr>
                                <th>Logo</th>
                                <td><img src="{{asset('images/backend/settings/'. $data['row']->logo)}}"  alt="" width="100"></td>

                            </tr>

                            <tr>
                                <th>Fav Icon</th>
                                <td><img src="{{asset('images/backend/settings/'. $data['row']->fav_icon)}}"  alt="" width="100"></td>

                            </tr>

                            <tr>
                                <th>Facebook</th>
                                <td>{{$data['row']->facebook}}</td>
                            </tr>

                            <tr>
                                <th>Twitter</th>
                                <td>{{$data['row']->twitter}}</td>
                            </tr>

                            <tr>
                                <th>Youtube</th>
                                <th>{{$data['row']->youtube}}</th>
                            </tr>

                            <tr>
                                <th>Instagram</th>
                                <th>{{$data['row']->instagram}}</th>
                            </tr>


                            <tr>
                                <th>Google Map</th>
                                <th>{{$data['row']->google_map}}</th>
                            </tr>



                            @include('backend.includes.status')
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











