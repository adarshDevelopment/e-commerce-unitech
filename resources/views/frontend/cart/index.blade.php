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
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12" >
                    <h1>Shopping cart</h1>
                    <div class="goods-page">
                        <div class="goods-data clearfix" style="min-height: 50vh">
                            @if(session('success_message'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success_message')}}
                                </div>
                            @elseif(session('error_message'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error_message')}}
                                </div>
                            @endif
                            @if(count($data['carts'])>0)
                            <div class="table-wrapper-responsive">
                                <table summary="Shopping cart">
                                    <tr>
                                        <th class="goods-page-image">Image</th>
                                        <th class="goods-page-description">Description</th>
                                        {{--                                    <th class="goods-page-ref-no">Ref No</th>--}}
                                        <th class="goods-page-price">Unit price</th>
                                        <th class="goods-page-discount">Total Discount</th>
                                        <th class="goods-page-price">Discounted price</th>
                                        <th class="goods-page-quantity">Quantity</th>
                                        <th class="goods-page-total" colspan="2">Total</th>
                                    </tr>

                                        @foreach($data['carts'] as $cart)
                                        @php
                                            $product = \App\Models\Product::find($cart->id);
                                            $image = $product->productImage()->first();
                                        @endphp

                                        <tr>
                                            <td class="goods-page-image">
                                                @if($image)
                                                    <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive" alt="">

                                                @else
                                                    <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" >
                                                @endif
                                                {{--                                        <a href="javascript:;"><img src="{{asset('images/backend/product/112_150_'.$image->image_name)}}" alt="Berry Lace Dress"></a>--}}
                                            </td>
                                            <td class="goods-page-description">
                                                <h3><a href="{{route('frontend.product',$product->slug)}}">{{$product->title}}</a></h3>

                                                @foreach($cart->options as $key => $option)
                                                    <ul>
                                                        <li>{{\App\Models\Attribute::find($key)->name}} : {{$option}}</li>
                                                    </ul>

                                                @endforeach
                                                {{--                                        <p><strong>Item 1</strong> - Color: Green; Size: S</p>--}}
                                                {{--                                        {{$product->short_description}}--}}
                                            </td>

                                            <td class="goods-page-price">
                                                <strong><span>Rs. </span>{{$product->price}}</strong>

                                            </td>


                                            <td class="goods-page-discount">
                                                @if($product->discount)
                                                    <div class="pi-price">Rs. {{($product->discount/100) * $product->price}}</div>
                                                    {{--                                            <div class="discount-text">{{$latest_product->price}}</div>--}}
                                                @else
                                                    <div class="pi-price">No discount</div>
                                                @endif
                                            </td>

                                            <td class="goods-page-price">
                                                <strong><span>Rs. </span>{{$cart->price}}</strong>

                                            </td>



                                            <td class="goods-page-quantity">
                                                <form action="{{route('cart.update')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$cart->rowId}}" name="rowId">
                                                    <div class="product-quantity">
                                                        <input type="number" id="quantity" value="{{$cart->qty}}" name="qty" min="1" max="{{$product->quantity}}" style="width: 75px" onkeydown="return false" class="quantity-slider"><br><br>
{{--                                                        <input id="product-quantity" type="text" name="qty" value="{{$cart->qty}}" aria-valuemax="{{$product->stock}}" readonly class="form-control input-sm">--}}

                                                    </div>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </td>
                                            <td class="goods-page-price">

                                                <strong><span>Rs. </span>{{$cart->qty * $cart->price }}</strong>
                                            </td>

                                            <td class="goods-page-total">

                                            </td>
                                            <td class="del-goods-col">
                                                {{--                                        <a class="del-goods" href="javascript:;"></a>--}}
                                                <a class="del-goods" href="{{route('cart.delete',$cart->rowId)}}"></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>

                            <div class="shopping-total">
                                <ul>
                                    <li>
                                        <em>Sub total</em>
                                        <strong class="price"><span>Rs. </span>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</strong>
                                    </li>

                                    <li>
                                        <em>Tax (13%)</em>
                                        <strong class="price"><span>Rs. </span>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</strong>
                                    </li>


                                    {{--                                <li>--}}
                                    {{--                                    <em>Shipping cost</em>--}}
                                    {{--                                    <strong class="price"><span>Rs. </span>500</strong>--}}
                                    {{--                                </li>--}}


                                    <li class="shopping-total-price">
                                        <em>Total</em>
                                        <strong class="price"><span>Rs. </span>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</strong>
                                    </li>

                                </ul>
                            </div>
                            @else
                                <tr>
                                    <td colspan="7"><span class="text-center text-danger"><b>No items in the cart</b></span></td>
                                </tr>
                            @endif
                        </div>
                        <a class="btn btn-default" href="{{route('frontend.index')}}" >Continue shopping <i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-primary" href="{{route('cart.checkout')}}" type="submit">Checkout <i class="fa fa-check"></i></a>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>

@endsection
