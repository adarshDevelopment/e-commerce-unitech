@extends('frontend.layouts.frontend_master')
@section('title', $title)
@section('css')
    <style>
        .quantity-slider{
            /*font:300 23px 'Open Sans', sans-serif ;*/
            /*text-align: center;*/
            /*height: 38px;*/
            /*width: 50px;*/
            /*text-align: center;*/

            border: none;
            background: #edeff1 !important;
            font: 300 23px 'Open Sans', sans-serif;
            color: #647484;
            height: 38px;
            width: 50px;
            text-align: center;
            padding: 5px;
        }
    </style>
@endsection

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

                    </ul>

                </div>
                <!-- END SIDEBAR -->

            @php
                $images = $data['details']->productImage()->get();
                $image = $data['details']->productImage()->first();
            @endphp
            <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <div class="product-page" style="min-height: 50vh">
                        <div class="row" style="min-height: 50vh">

                            <div class="col-md-6 col-sm-6">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">

                                                    <div class="carousel-item active">
                                                        @if($image)
                                                        <img class="d-block w-100 h-50" style="height: 400px; width:500px" src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" alt="First slide">
                                                        @else
                                                            <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" class="img-responsive" alt="">
                                                        @endif
    {{--                                                    <img class="d-block w-100" src="{{asset('images/backend/product/255_271_'.$image->image_name)}}" alt="First slide">--}}
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

                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>


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

                                    @elseif(session('error_message'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('error_message')}}
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

                                            @if($data['details']->discount)
                                                <strong id="finalPrice"><span>Rs. </span> {{$data['details']->price - (($data['details']->discount/100) * $data['details']->price)}}</strong>
                                                <div class="discount-text">Rs. {{$data['details']->price}}</div>
                                            @else
                                                <strong id="finalPrice"><span>Rs. </span> {{$data['details']->price}}</strong>

                                            @endif

                                        </div>
                                        <div class="availability">
                                            @if($data['details']->quantity>0)
                                                Availability: <strong>{{$data['details']->quantity}} untis remaining</strong>
                                            @else
                                                Availability: <span style="color: red">Out of Stock</span>
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
                                    <input type="hidden" name="totalPrice" id="hiddenPrice" value="{{$data['details']->price}}">
{{--                                                                        {!! Form::hidden('price', 23 ) !!}--}}
                                    <div class="description">
                                        Search: &nbsp
                                        @foreach($data['details']->tags as $tag)
                                            <a href="" style="color: black; padding: 5px; border: 1px solid black">#{{$tag->name}}</a>
                                            {{--                                        Subcategory: <a href="index.html">{{$data['details']->getSubcategory->name}}</a>--}}
                                        @endforeach
                                    </div>
                                    <br>


                                    <div class="description">
                                        @php
                                        $duplicateProduct = false;
                                            foreach(Session::all() as $key => $value) {
                                                if ($value == $data['details']->slug) {
                                                    $duplicateProduct = true;
                                                }
                                            }
                                        @endphp

                                        @if($duplicateProduct == 1)
                                            <a href="{{route('frontend.remove_item_from_compare',$data['details']->slug)}}" class="btn btn-success">Remove from compare</a>
                                        @else
                                            <a href="{{route('frontend.add_to_compare',$data['details']->slug)}}" class="btn btn-success">Compare item</a>
                                        @endif
                                    </div>
                                    <br>

                                    @foreach($data['details']->productAttributes as $attribute)
                                        <input type="hidden" name="attributes[]" id="hiddenPrice" value="{{$attribute->attribute_value}}">
                                <ul>
                                    <li>{{$attribute->attribute_value}}</li>
                                </ul>
                                    @endforeach
                                </div>
                                <div class="product-page-cart">

{{--                                    <label for="quantity">Quantity (between 1 and 5):</label>--}}
{{--                                    <input type="number" id="quantity" name="quantity" min="1" max="{{$data['details']->quantity}}" class=""><br><br>--}}


                                    <div class="product-quantity">
                                        <input type="number" id="quantity" value="1" name="quantity" min="$minValue" max="{{$data['details']->quantity}}" onkeydown="return false" style="width: 75px" class="quantity-slider"><br><br>
{{--                                        <input  min="1" max="3"id="quantity" name="quantity" type="number" value="1" readonly class="form-control input-sm" >--}}
                                    </div>
                                    @if($data['details']->quantity == 0)
                                        <button class="btn btn-primary" disabled type="submit">Add to cart</button>
                                    @else
                                        <button class="btn btn-primary" type="submit">Add to cart</button>
                                    @endif
                                </div>

                            </form>





                            <div class="product-page-content" style="min-height: 50vh">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li><a href="#Description" data-toggle="tab">Description</a></li>
                                    <li><a href="#specification" data-toggle="tab">Specification</a></li>
                                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews ({{count($data['details']->comments)}})</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade" id="Description">
                                        {!! $data['details']->description !!}
                                    </div>
                                    <div class="tab-pane fade" id="specification">
                                        <table class="datasheet">
                                            <tr>
                                                <th colspan="2">Complete specification</th>
                                            </tr>
                                            @foreach($data['details']->specifications as $spec)
                                                <tr>
                                                    <td class="datasheet-features-type">{{$spec->attributes->name}}</td>
                                                    <td>{{$spec->specification_value}}</td>
                                                </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                    <div class="tab-pane fade in active" id="Reviews">

                                        <!--<p>There are no reviews for this product.</p>-->
                                        @foreach($data['details']->comments as $comment)
                                            <div class="review-item clearfix">
                                                <div class="review-item-submitted">
                                                    <strong>{{$comment->customers->name}}</strong>
{{--                                                    <em>30/12/2013 - 07:37</em>--}}
                                                    <em>{{$comment->created_at->toDateString()}}</em>
                                                    <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                                </div>
                                                <div class="review-item-content">
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                        @endforeach



                                        <!-- BEGIN FORM-->
                                        @if(Auth::guard('customer')->check())
                                            <form action="{{route('customer.post_comment')}}" method="post" class="reviews-form" role="form">
                                                @csrf
                                                <h2>Write a review</h2>
                                                <div class="form-group">
                                                    <label for="review">Review</label>
                                                    <textarea class="form-control" required  name="comment" rows="8" id="review"></textarea>
                                                </div>
                                                {!! Form::hidden('product_id', $data['details']->id) !!}
                                                <button type="submit" class="btn btn-primary">Post comment</button>

                                            </form>
                                        @endif
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
        </div>
    </div>


@endsection

@section('js')

{{--    <script>--}}
{{--    $('#quantity').change(function(){--}}
{{--        var spec = $(this).val()--}}
{{--        if(spec>{{$data['details']}}){--}}
{{--            alert ('turn back');--}}
{{--        }--}}

{{--    });--}}

{{--    </script>--}}



{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}







{{--        @foreach($data['att'] as $at)--}}

{{--        $('#{{$at->attribute_id}}').change(function(){--}}
{{--            // var spec = $(this).val()--}}
{{--            // alert(spec);--}}
{{--            var pList = $("input[name=nameGoesHere]").val();--}}


{{--            alert('{{$at->attribute_id}}');--}}
{{--            alert("{{$attribute->name}}");--}}
{{--            var oldAtt = document.getElementById("#{{$productAttribute->attribute_id}}").defaultValue;--}}
{{--            alert (oldAtt);--}}

{{--            alert($('#{{$productAttribute->attribute_id}}')element.defaultValue());--}}
{{--            // $("#updatedPrice").text("hello");--}}
{{--            // alert('working');--}}
{{--            // alert(this.value);--}}


{{--            var spec = $(this).val();--}}
{{--            $.ajax({--}}
{{--                method: "POST",--}}
{{--                url: "{{route('frontend.product.get_price')}}",--}}
{{--                data:{'spec':spec, 'product_id':{{$data['details']->id}}, 'attID':{{$at->attribute_id}}},--}}
{{--                success:function (resp){--}}
{{--                    dd(resp);--}}
{{--                    // $('#subcategory_id').html(resp);--}}
{{--                    // alert(resp);--}}
{{--                    var finalPrice = {{$initialPrice}} + resp.price;--}}
{{--                    var finalPriceAmount = "Rs. " + finalPrice;--}}
{{--                    // alert (finalPriceAmount)--}}

{{--                    $("#finalPrice").text(finalPriceAmount);--}}
{{--                    // $("#hiddenPrice").val(finalPrice);--}}
{{--                }--}}
{{--            });--}}



{{--        });--}}
{{--        @endforeach--}}

{{--        function getPRice(){--}}

{{--            return $data--}}
{{--        }--}}

{{--    </script>--}}





@endsection
