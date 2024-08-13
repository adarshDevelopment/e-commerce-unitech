@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('main-content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('frontend.index')}}">Home</a></li>
                <li><a href="index.html">{{$data['details']->getCategory->name}}</a></li>
                <li><a href="">{{$data['details']->getSubcategory->name}}</a></li>
                <li class="active">{{$data['details']->title}}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
                        <li class="list-group-item clearfix dropdown active">
                            <a href="shop-product-list.html" class="collapsed">
                                <i class="fa fa-angle-right"></i>
                                Mens

                            </a>
                            <ul class="dropdown-menu" style="display:block;">
                                <li class="list-group-item dropdown clearfix active">
                                    <a href="shop-product-list.html" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>
                                    <ul class="dropdown-menu" style="display:block;">
                                        <li class="list-group-item dropdown clearfix">
                                            <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item dropdown clearfix active">
                                            <a href="shop-product-list.html" class="collapsed"><i class="fa fa-angle-right"></i> Sport  </a>
                                            <ul class="dropdown-menu" style="display:block;">
                                                <li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
                            </ul>
                        </li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home &amp; Garden</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
                    </ul>

                    <div class="sidebar-products clearfix">
                        <h2>Bestsellers</h2>
                        <div class="item">
                            <a href="shop-item.html"><img src="assets/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$31.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.html"><img src="assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$23.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.html"><img src="assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$86.00</div>
                        </div>
                    </div>
                </div>
                <!-- END SIDEBAR -->

            @php
                $images = $data['details']->productImage()->get();

            @endphp

            <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <div class="product-page">
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($images as $image)
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{asset('images/backend/product/255_271_'.$image->image_name)}}" alt="First slide">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="carousel-inner">

                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="..." alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="..." alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="..." alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>




                                {{--                                <div class="product-main-image">--}}
                                {{--                                    <img src="" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="assets/pages/img/products/model7.jpg">--}}
                                {{--                                </div>--}}
                                {{--                                <div class="product-other-images">--}}
                                {{--                                    <a href="assets/pages/img/products/model3.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="assets/pages/img/products/model3.jpg"></a>--}}
                                {{--                                    <a href="assets/pages/img/products/model4.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="assets/pages/img/products/model4.jpg"></a>--}}
                                {{--                                    <a href="assets/pages/img/products/model5.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="assets/pages/img/products/model5.jpg"></a>--}}
                                {{--                                </div>--}}








                            </div>
                            {{--                            @include('backend.includes.flash_message')--}}
                            <form action="{{route('frontend.cart.add')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$data['details']->id}}" name="product_id">
                                <div class="col-md-6 col-sm-6">
                                    <h1>{{$data['details']->title}}</h1>
                                    @if(session('success_message'))
                                        <div class="alert alert-success" role="alert">
                                            {{session('success_message')}}
                                        </div>

                                    @elseif(session('failure_message'))
                                        <div class="alert alert-danger" role="alert">
                                            Error Adding Product to cart!
                                        </div>
                                    @endif
                                    <div class="price-availability-block clearfix">
                                        <div class="price">
                                            {{--                                        <div id="updatedPrice" name="newPrice" > updated price: </div>--}}

                                            @php
                                                if($data['details']->discount){
                                                    $initialPrice = $data['details']->price - ($data['details']->discount/100) * $data['details']->price;
                                                }else{
                                                    $initialPrice = $data['details']->price;
                                                }

                                            @endphp

                                            <div> </div>   <div>  <strong id="finalPrice"><span>Rs. </span> {{$initialPrice}}</strong></div>




                                            {{--                                    @if($data['details']->discount)--}}

                                            {{--                                            <strong><span>Rs. </span>{{$data['details']->price - ($data['details']->discount/100) * $data['details']->price}}</strong>--}}
                                            {{--                                            <em>&nbsp Rs. <span>{{$data['details']->price}}</span></em>--}}
                                            {{--                                        @else--}}
                                            {{--                                            <strong><span>Rs. </span>{{$data['details']->price}}</strong>--}}
                                            {{--                                        @endif--}}


                                        </div>
                                        <div class="availability">
                                            @if($data['details']->stock>0)
                                                Availability: <strong>In Stock</strong>
                                            @else
                                                Availability: <strong>Out of Stock</strong>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="description">
                                        <p>{{$data['details']->short_description}}</p>
                                    </div>
                                    <br>

                                    <div class="description">
                                        Category: <a href="index.html">{{$data['details']->getCategory->name}}</a>
                                    </div>
                                    <br>
                                    <div class="description">
                                        Subcategory: <a href="index.html">{{$data['details']->getSubcategory->name}}</a>
                                    </div>
                                    <br>
                                    <input type="hidden" name="totalPrice" id="hiddenPrice" value="">
{{--                                                                        {!! Form::hidden('price', 23 ) !!}--}}
                                    <div class="description">
                                        Search: &nbsp
                                        @foreach($data['details']->tags as $tag)
                                            <a href="" style="color: black; padding: 5px; border: 1px solid black">#{{$tag->name}}</a>
                                            {{--                                        Subcategory: <a href="index.html">{{$data['details']->getSubcategory->name}}</a>--}}
                                        @endforeach
                                    </div>
                                    <br>




                                    @foreach($data['att'] as $at)

                                        @php
                                            $attribute = \App\Models\Attribute::find($at->attribute_id);
                                        @endphp
                                        <label for="">{{$attribute->name}}</label>
                                        @php
                                            $attValues = \App\Models\ProductAttribute::where('product_id',$data['details']->id)->where('attribute_id',$at->attribute_id)->get();
                                        @endphp
                                        <div class="form-group">
{{--                                            <select name="attribute[{{$attribute->id}}]" id="{{$at->attribute_id}}" class="form-control select-demo">--}}
                                            <select name="attribute[{{$attribute->id}}]" id="{{$attribute->id}}" class="form-control select-demo">

                                                @foreach($attValues as $av)
                                                    <option value="{{$av->attribute_value}}">{{$av->attribute_value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach




                                    {{--                                                <label for="quanittiy">{{$productAttribute->attribute->name}}</label>--}}
                                    {{--                                                {{$productAttribute->attribute}}--}}

                                    {{--                                            <select id="{{$productAttribute->attribute_id}}" name="attribute[{{$productAttribute->attribute->id}}]" class="form-control select-demo">--}}
                                    {{--                                            <select id="" name="attribute[{{$productAttribute->attribute->id}}]" class="form-control select-demo">--}}








{{--                                    @foreach($data['details']->tags as $tag)--}}
{{--                                        <a href="" style="color: black; padding: 5px; border: 1px solid black">#{{$tag->name}}</a>--}}
{{--                                        --}}{{--                                        Subcategory: <a href="index.html">{{$data['details']->getSubcategory->name}}</a>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                ------}}
{{--                                @foreach($data['details']->productAttributes as $productAttribute)--}}
{{--                                    --}}{{--                                        <h3>{{$productAttribute->attribute_value}}</h3>--}}

{{--                                    --}}{{--                                        @php--}}
{{--                                    --}}{{--                                            $attValue = explode(',', $productAttribute->attribute_value);--}}
{{--                                    --}}{{--                                        @endphp--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="quanittiy">{{$productAttribute->attribute->name}}</label>--}}
{{--                                        {{$productAttribute->attribute}}--}}

{{--                                        @php--}}
{{--                                            $d = \App\Models\ProductAttribute::where()->name--}}
{{--                                        @endphp--}}

{{--                                        --}}{{--                       {{$productAttribute->attribute->id}}  = attribute_Id from attribute table                    $productAttribute->attribute->name = attribute_name from attribute table              --}}
{{--                                        <select id="{{$productAttribute->attribute_id}}" name="attribute[{{$productAttribute->attribute->id}}]" class="form-control select-demo">--}}

{{--                                            --}}{{--                                                <option value="{{$productAttribute->attribute_value}}">{{$productAttribute->attribute_value}}</option>--}}
{{--                                            @foreach($attValue as $value)--}}
{{--                                                <option value="{{$value}}">{{$value}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                                -----}}





















                                </div>
                                <div class="product-page-cart">

                                    <div class="product-quantity">
                                        <input id="product-quantity" name="quantity" type="text" value="1" readonly class="form-control input-sm" maxlength="{{$data['details']->stock}}">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Add to cart</button>
                                </div>
                                <div class="review">
                                    <input type="range" value="4" step="0.25" id="backing4">
                                    <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                    </div>
                                    <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
                                </div>
                                <ul class="social-icons">
                                    <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                                    <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                                    <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                                    <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                                    <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                                </ul>
                                {{--                            </div>--}}
                            </form>





                            <div class="product-page-content">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li><a href="#Description" data-toggle="tab">Description</a></li>
                                    <li><a href="#specification" data-toggle="tab">Specification</a></li>
                                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade" id="Description">
                                        {!! $data['details']->description !!}
                                    </div>
                                    <div class="tab-pane fade" id="specification">

                                        {!! $data['details']->specification !!}
                                        {{--                                        <table class="datasheet">--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <th colspan="2">Additional features</th>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td class="datasheet-features-type">Value 1</td>--}}
                                        {{--                                                <td>21 cm</td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td class="datasheet-features-type">Value 2</td>--}}
                                        {{--                                                <td>700 gr.</td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td class="datasheet-features-type">Value 3</td>--}}
                                        {{--                                                <td>10 person</td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td class="datasheet-features-type">Value 4</td>--}}
                                        {{--                                                <td>14 cm</td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td class="datasheet-features-type">Value 5</td>--}}
                                        {{--                                                <td>plastic</td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                        </table>--}}
                                    </div>
                                    <div class="tab-pane fade in active" id="Reviews">
                                        <!--<p>There are no reviews for this product.</p>-->
                                        <div class="review-item clearfix">
                                            <div class="review-item-submitted">
                                                <strong>Bob</strong>
                                                <em>30/12/2013 - 07:37</em>
                                                <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="review-item-content">
                                                <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                                            </div>
                                        </div>
                                        <div class="review-item clearfix">
                                            <div class="review-item-submitted">
                                                <strong>Mary</strong>
                                                <em>13/12/2013 - 17:49</em>
                                                <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="review-item-content">
                                                <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                                            </div>
                                        </div>

                                        <!-- BEGIN FORM-->
                                        <form action="#" class="reviews-form" role="form">
                                            <h2>Write a review</h2>
                                            <div class="form-group">
                                                <label for="name">Name <span class="require">*</span></label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="review">Review <span class="require">*</span></label>
                                                <textarea class="form-control" rows="8" id="review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Rating</label>
                                                <input type="range" value="4" step="0.25" id="backing5">
                                                <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                                </div>
                                            </div>
                                            <div class="padding-top-20">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="sticker sticker-sale"></div>--}}
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN SIMILAR PRODUCTS -->
            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <h2>Similar Products</h2>
                    <div class="owl-carousel owl-carousel4">
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress test</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress4</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress5</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress6</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIMILAR PRODUCTS -->
        </div>
    </div>


@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });







        @foreach($data['att'] as $at)

        $('#{{$at->attribute_id}}').change(function(){
            // var spec = $(this).val()
            // alert(spec);
            var pList = $("input[name=nameGoesHere]").val();


            {{--alert('{{$at->attribute_id}}');--}}
        {{--alert("{{$attribute->name}}");--}}
            {{--var oldAtt = document.getElementById("#{{$productAttribute->attribute_id}}").defaultValue;--}}
            {{--alert (oldAtt);--}}

            {{--alert($('#{{$productAttribute->attribute_id}}')element.defaultValue());--}}
            // $("#updatedPrice").text("hello");
            // alert('working');
            // alert(this.value);


            var spec = $(this).val();
            $.ajax({
                method: "POST",
                url: "{{route('frontend.product.get_price')}}",
                data:{'spec':spec, 'product_id':{{$data['details']->id}}, 'attID':{{$at->attribute_id}}},
                success:function (resp){
                    dd(resp);
                    // $('#subcategory_id').html(resp);
                    // alert(resp);
                    var finalPrice = {{$initialPrice}} + resp.price;
                    var finalPriceAmount = "Rs. " + finalPrice;
                    // alert (finalPriceAmount)

                    $("#finalPrice").text(finalPriceAmount);
                    // $("#hiddenPrice").val(finalPrice);
                }
            });



        });
        @endforeach

        function getPRice(){

            return $data
        }

    </script>

@endsection
