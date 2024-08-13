@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('main-content')



<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <li class="active">Search result</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
                <div class="sidebar-filter margin-bottom-25">
{{--                    <h2>Search categories</h2>--}}
{{--                    <h3>Availability</h3>--}}
{{--                    <div class="checkbox-list">--}}
{{--                        <label><input type="checkbox"> Not Available (3)</label>--}}
{{--                        <label><input type="checkbox"> In Stock (26)</label>--}}
{{--                    </div>--}}

{{--                    <h3>Price</h3>--}}
                    <p>
{{--                        <label for="amount">Range:</label>--}}
{{--                        <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">--}}
{{--                    </p>--}}
{{--                    <div id="slider-range"></div>--}}
                </div>

{{--                <div class="sidebar-products clearfix">--}}
{{--                    <h2>Bestsellers</h2>--}}
{{--                    <div class="item">--}}
{{--                        <a href="shop-item.html"><img src="assets/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>--}}
{{--                        <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>--}}
{{--                        <div class="price">$31.00</div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <a href="shop-item.html"><img src="assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>--}}
{{--                        <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>--}}
{{--                        <div class="price">$23.00</div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <a href="shop-item.html"><img src="assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>--}}
{{--                        <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>--}}
{{--                        <div class="price">$86.00</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <div class="content-search margin-bottom-20">
                    <div class="row" >
                        <div class="col-md-6">
                            <h1>Search result for <em>{{$search}}</em></h1>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('frontend.search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{$search}}" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </span>

                                </div>
                            </form>
                        </div>



                    </div>
                </div>

                <!-- BEGIN PRODUCT LIST -->
                <div class="row product-list" style="min-height: 60vh">
                    <!-- PRODUCT ITEM START -->
                    @foreach ($data['details'] as $product)

                        @php
                            $image = $product->productImage()->first();
                        @endphp
                        <div class="col-md-4 col-sm-6 col-xs-12">

                            <div class="product-item">
                            <div class="pi-img-wrapper">
                                @if($image)
                                    <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive" alt="">

                                @else
                                    <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" >
                                @endif
                                <div>
                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="{{route('frontend.product', $product->slug)}}">{{$product->title}}</a></h3>
                                @if($product->discount)
{{--                                    <div class="pi-price">$29.00</div>--}}
                                    <div class="pi-price">Rs. {{$product->price - ($product->discount/100) * $product->price}}</div>
                                    <div class="discount-text">{{$product->price}}</div>
                                @else
                                    <div class="pi-price">Rs. {{$product->price}}</div>
                                @endif
                                @if($product->discount)
                                    <div class="sticker sticker-sale"></div>
                                @endif
{{--                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
                        </div>

                        </div>
                    @endforeach
                    <!-- PRODUCT ITEM END -->


                </div>


                <!-- END PRODUCT LIST -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>



<!-- BEGIN STEPS -->


@endsection
