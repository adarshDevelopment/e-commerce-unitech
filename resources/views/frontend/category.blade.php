@extends('frontend.layouts.frontend_master')
@section('title', $title)

@section('main-content')


    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">{{$catName->name}}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->

                <div class="sidebar col-md-3 col-sm-5">
                    <ul class="list-group margin-bottom-25 sidebar-menu">

                        <li class="list-group-item clearfix ">
                            @foreach($categories as $category)

                                <a class="" data-target="#" href="{{route('frontend.category',$category->slug)}}">
{{--                                <a href="javascript:void(0);" class="collapsed" id="{{$category->slug}}">--}}
                                <i class="fa fa-angle-right"></i>
                                {{$category->name}}({{$category->products->count()}})
                            </a>
                            <ul class="dropdown-menu" style="display:block;">
                                @foreach($category->subcategories as $subcategory)
                                    <li><a href="{{route('frontend.subcategory',$subcategory->slug)}}"><i class="fa fa-angle-right"></i> {{$subcategory->name}}({{$subcategory->products->count()}})</a></li>
                                @endforeach
                            </ul>
                            @endforeach
                        </li>
                    </ul>


                </div>


                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">


                    <!-- BEGIN PRODUCT LIST -->
                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        @foreach($data['products'] as $product)

                            @php
                                $image = $product->productImage()->first();

                            @endphp

                        <div class="col-md-4 col-sm-6 col-xs-12" >
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    @if($image)
{{--                             <img src="{{asset('images/backend/product/255_271_'.$image->image_name)}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                    displaying product image --}}
                                        <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive" alt="">

                                    @else
                                        <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" >
                                    @endif

                                    <div>
                                        <a href="assets/pages/img/products/model6.jpg" class="btn btn-default fancybox-buttoFn">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="{{route('frontend.product', $product->slug)}}">{{$product->title}}</a></h3>



                                @if($product->discount)
                                    <div class="pi-price">Rs. {{$product->price - ($product->discount/100) * $product->price}}</div>
                                    <div class="sticker sticker-sale"></div>
{{--                                    <div class="discount-text">{{$product->price}}</div>--}}
                                @else
                                    <div class="pi-price">Rs. {{$product->price}}</div>
{{--                                    <h3><a href="shop-item.html">{{$product->price}}</a></h3>--}}
                                @endif


                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        @endforeach




                        <!-- PRODUCT ITEM END -->
                    </div>


                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
            Layout.initSliderRange();
        });
    </script>

    <script>
        $("#slider-range").slider({
            range: true,
            min: 400,
            max: 3500,
            step: 50,
            slide: function( event, ui ) {

                $( "#min-price").html(ui.values[ 0 ]);

                console.log(ui.values[0])

                suffix = '';
                if (ui.values[ 1 ] == $( "#max-price").data('max') ){
                    suffix = ' +';
                }
                $( "#max-price").html(ui.values[ 1 ] + suffix);
            }
        })

    </script>


@endsection
