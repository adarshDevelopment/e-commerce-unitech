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

                        <h3 class="card-title">Assign Price to Product</h3>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => [$base_route. '.assign_price'], 'method' => 'POST', 'files' => true]) !!}
                        {!! Form::hidden('product_id', $data['product']->id) !!}


{{--                            <h3>{{$attribute->attribute->name}}</h3>--}}


                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{$data['product']->name}}</td>
                                    </tr>
                                    @foreach($data['attributes'] as $attribute)

                                        @php
                                            $attValue = explode(',', $attribute->attribute_value);
                                        @endphp

                                        <tr>
                                            <td colspan="1">{{$attribute->attribute->name}}</td>
                                            <td colspan="5">
                                                <ul type="none">
                                                    @foreach($attValue as $att)

                                                        {{--                                                        {!! Form::label('price', $attribute->attribute->name) !!}--}}
{{--                                                        {!! Form::select('price',null,['class' => 'form-control','placeholder' => "Select Category", 'required' =>'required']) !!}--}}

                                                        {!! Form::label($att, $att) !!}
                                                        {!! Form::hidden('attribute_id[]', $attribute->attribute_id) !!}
                                                        {!! Form::hidden('attribute_name[]', $att) !!}
                                                        {!! Form::number('price[]', null, ['class' => 'form-control', 'placeholder' => 'Enter price','required' =>'required']) !!}




{{--                                                        <p>{{$att}}</p>--}}
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>

                                    @endforeach

                                </table>


                                <div class="form-group">
{{--                                    {!! Form::label('price', $attribute->attribute->name) !!}--}}
{{--                                    {!! Form::select('attribute_name',$data['module'],null,['class' => 'form-control','placeholder' => "Select Category", 'required' =>'required']) !!}--}}

                                </div>
{{--                                <div class="form-group">--}}
{{--                                    {!! Form::label('price', 'Name') !!}--}}
{{--                                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter price', 'required'=>'required']) !!}--}}
{{--                                    @if($errors->has('price'))--}}
{{--                                        <span class="text-danger">{!! $errors->first('price') !!}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

                        {!! Form::submit('Assign Price', ['class' => 'btn btn-success']) !!}

                        {!! Form::Close() !!}

                    </div>
                </div>



            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection



