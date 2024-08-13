@extends('frontend.layouts.frontend_master')
@section('title', $title)

@section('css')
    <style>
        .custom_button {
            background-color: #f44336; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
    @endsection
@section('main-content')


    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Store</a></li>
                <li class="active">My Wish List</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->

                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
{{--                style="min-width: 100vh"--}}
                <div class="col-md-12 col-sm-12" >
                    <h1>Product Comparison</h1>
                    <div class="goods-page">
                        <div class="goods-data compare-goods clearfix">
                            <div class="table-wrapper-responsive">


                                <table class="table table-bordered" style="table-layout: fixed">




                                    <tr>
                                        @foreach($productList as $list)
                                            @php
                                                $image = $list->productImage()->first();
                                            @endphp
                                            <td class="compare-item">
                                                @if($image)
                                                    <a href="javascript:;"><img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}"></a>
{{--                                                    <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive fc-center" height="200px" width="200px" >--}}
                                                @else
                                                    <a href="javascript:;"><img src="{{asset('images/600_550_no_image.png')}}" alt="Berry Lace Dress"></a>
{{--                                                    <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" >--}}
                                                @endif
{{--                                                <a href="javascript:;"><img src="assets/pages/img/products/model3.jpg" alt="Berry Lace Dress"></a>--}}
                                                <h3><b><a href="{{route('frontend.product', $list->slug)}}"><span style="color: cornflowerblue">{{$list->title}}</span></a></b></h3>
                                                    <a href="{{route('frontend.remove_item_from_compare',$list->slug)}}" class="btn btn-primary">Remove</a><br>

                                                    @if($list->discount)
                                                        <strong class="compare-price"><span>Rs.</span>{{$list->price - ($list->discount/100) * $list->price}}</strong>
                                                    @else
                                                        <strong class="compare-price"><span>Rs.</span>{{$list->price}}</strong>
                                                    @endif

                                            </td>
                                        @endforeach
                                    </tr>


                                    <tr>
                                        @foreach($productList as $list)
                                            <td>
                                                    @foreach($list->specifications as $spec)
                                                       <b>{{$spec->attributes->name}}</b>: {{$spec->specification_value}}
                                                            <hr>
                                                    @endforeach
                                                        <hr>

{{--                                                        <a href="{{route('frontend.remove_item_from_compare',$list->slug)}}">Remove item</a>--}}
{{--                                                        <a href="{{route('')}}">Remove item</a>--}}
                                            </td>

                                        @endforeach

                                    </tr>














{{--                                    <tr>--}}

{{--                                        @foreach($productList as $list)--}}
{{--                                            <th>--}}
{{--                                                {{$list->title}}--}}
{{--                                            </th>--}}
{{--                                        @endforeach--}}
{{--                                    </tr>--}}


{{--                                    <tr>--}}
{{--                                        @foreach($productList as $list)--}}
{{--                                            <td>--}}
{{--                                                @foreach($list->specifications as $spec)--}}
{{--                                                    <b>{{$spec->attributes->name}}</b>: {{$spec->specification_value}}--}}
{{--                                                    <hr>--}}
{{--                                                @endforeach--}}
{{--                                                <hr>--}}
{{--                                            </td>--}}

{{--                                        @endforeach--}}

{{--                                    </tr>--}}







                                </table>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>




<!-- BEGIN STEPS -->


@endsection
