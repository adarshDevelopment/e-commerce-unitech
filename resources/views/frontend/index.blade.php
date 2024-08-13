@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('main-content')

    <div class="main">
        <div class="container">
            <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SALE PRODUCT -->
                <div class="col-md-12 sale-product">
                    <h2>Latest Products</h2>
                    <div class="owl-carousel owl-carousel5">

                        @foreach($data['latest_products'] as $latest_product)
                            @php
                                $image = $latest_product->productImage()->first();
                            @endphp
                            <div>
                                <div>
                                    <div class="product-item">
                                        <div class="pi-img-wrapper">
                                            @if($image)
                                                {{--                                            <img src="{{asset('images/backend/product/255_271_'.$image->image_name)}}" class="img-responsive" alt="Berry Lace Dress">--}}
                                                <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive" alt="">
                                            @else
                                                <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" class="img-responsive" alt="">
                                            @endif
{{--                                            <img src="{{asset('assets/frontend/pages/img/products/k1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
                                        </div>
                                        <h3><a href="{{route('frontend.product', $latest_product->slug)}}">{{$latest_product->title}} </a></h3>
                                        @if($latest_product->discount)
                                            <div class="pi-price">Rs. {{$latest_product->price - ($latest_product->discount/100) * $latest_product->price}}</div>
                                            <div class="discount-text">{{$latest_product->price}}</div>
                                            <div class="sticker sticker-sale"></div>
                                        @else
                                            <div class="pi-price">Rs. {{$latest_product->price}}</div>
                                        @endif
                                    </div>
                                </div>




                            </div>

                        @endforeach



                    </div>
                </div>
                <!-- END SALE PRODUCT -->
            </div>
            <!-- END SALE PRODUCT & NEW ARRIVALS -->


            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40 ">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-4">
                    <ul class="list-group margin-bottom-25 sidebar-menu">

                        @foreach($categories as $category)
                            <li class="list-group-item clearfix"><a href="{{route('frontend.category',$category->slug)}}"><i class="fa fa-angle-right"></i>
                                {{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->

                <div class="col-md-9 col-sm-8">
                    <h2>Featured Products</h2>
                    <div class="owl-carousel owl-carousel3">


                        @foreach($data['featured_products'] as $featured)
                            @php
                                $image = $featured->productImage()->first();
                            @endphp
                            <div>
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        @if($image)
                                            {{--                                            <img src="{{asset('images/backend/product/255_271_'.$image->image_name)}}" class="img-responsive" alt="Berry Lace Dress">--}}
                                            <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive" alt="" >
                                        @else
                                            <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" >
                                        @endif
                                    </div>
                                    <h3><a href="{{route('frontend.product', $featured->slug)}}">{{$featured->title}}</a></h3>
                                    @if($featured->discount)
                                        <div class="pi-price">Rs. {{$featured->price - ($featured->discount/100) * $featured->price}}</div>
                                        <div class="discount-text">{{$featured->price}}</div>
                                        <div class="sticker sticker-sale"></div>
                                    @else
                                        <div class="pi-price">Rs. {{$featured->price}}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN TWO PRODUCTS & PROMO -->
{{--            <div class="row margin-bottom-35 ">--}}
{{--                <!-- BEGIN TWO PRODUCTS -->--}}
{{--                <div class="col-md-6 two-items-bottom-items">--}}
{{--                    <h2>Two items</h2>--}}
{{--                    <div class="owl-carousel owl-carousel2">--}}
{{--                        <div>--}}
{{--                            <div class="product-item">--}}
{{--                                <div class="pi-img-wrapper">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/products/k4.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    <div>--}}
{{--                                        <a href="{{asset('assets/frontend/pages/img/products/k4.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                <div class="pi-price">$29.00</div>--}}
{{--                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="product-item">--}}
{{--                                <div class="pi-img-wrapper">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/products/k2.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    <div>--}}
{{--                                        <a href="{{asset('assets/frontend/pages/img/products/k2.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                <div class="pi-price">$29.00</div>--}}
{{--                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="product-item">--}}
{{--                                <div class="pi-img-wrapper">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/products/k3.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    <div>--}}
{{--                                        <a href="{{asset('assets/frontend/pages/img/products/k3.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                <div class="pi-price">$29.00</div>--}}
{{--                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="product-item">--}}
{{--                                <div class="pi-img-wrapper">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/products/k1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    <div>--}}
{{--                                        <a href="{{asset('assets/frontend/pages/img/products/k1.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                <div class="pi-price">$29.00</div>--}}
{{--                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="product-item">--}}
{{--                                <div class="pi-img-wrapper">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/products/k4.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    <div>--}}
{{--                                        <a href="{{asset('assets/frontend/pages/img/products/k4.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                <div class="pi-price">$29.00</div>--}}
{{--                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="product-item">--}}
{{--                                <div class="pi-img-wrapper">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/products/k3.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    <div>--}}
{{--                                        <a href="{{asset('assets/frontend/pages/img/products/k3.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                <div class="pi-price">$29.00</div>--}}
{{--                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END TWO PRODUCTS -->--}}
{{--                <!-- BEGIN PROMO -->--}}
{{--                <div class="col-md-6 shop-index-carousel">--}}
{{--                    <div class="content-slider">--}}
{{--                        <div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--                            <!-- Indicators -->--}}
{{--                            <ol class="carousel-indicators">--}}
{{--                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--                                <li data-target="#myCarousel" data-slide-to="1"></li>--}}
{{--                                <li data-target="#myCarousel" data-slide-to="2"></li>--}}
{{--                            </ol>--}}
{{--                            <div class="carousel-inner">--}}
{{--                                <div class="item active">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/index-sliders/slide1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                </div>--}}
{{--                                <div class="item">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/index-sliders/slide2.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                </div>--}}
{{--                                <div class="item">--}}
{{--                                    <img src="{{asset('assets/frontend/pages/img/index-sliders/slide3.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END PROMO -->--}}
{{--            </div>--}}
            <!-- END TWO PRODUCTS & PROMO -->
        </div>
    </div>

    <!-- END PRODUCT DISPLAY CONTAINER -->




@endsection
