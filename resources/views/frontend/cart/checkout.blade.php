@extends('frontend.layouts.frontend_master')
@section('main-content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Store</a></li>
                <li class="active">Checkout</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Checkout</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">

                            <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
                                    <form action="{{route('cart.checkout.make_order')}}" method="post">
                                        @csrf
                                        <div class="col-md-12 clearfix" style="min-height: 50vh">

                                        <div class="table-wrapper-responsive">

                                            <table>
                                                <tr>
                                                    <th class="checkout-image">Image</th>
                                                    <th class="checkout-description">Description</th>
                                                    <th class="checkout-price">Unit Price</th>
                                                    <th class="checkout-quantity">Total Discount</th>
                                                    <th class="checkout-model">Discounted Price</th>
                                                    <th class="checkout-model">Quantity</th>
                                                    <th class="checkout-total">Total</th>
                                                </tr>

                                                    @foreach($data['carts'] as $cart)
                                                    @php
                                                        $product = \App\Models\Product::find($cart->id);
                                                        $attributes = \App\Models\ProductAttribute::where('product_id',$product->id)->get();
                                                        $image = $product->productImage()->first();
                                                    @endphp

                                                    <tr>
                                                        <td class="checkout-image">
{{--                                                            <a href="{{route('frontend.product', $product->slug)}}">{{$product->title}}</a>--}}
                                                            <a href="{{route('frontend.product',$product->slug)}}">
                                                                @if($image)
                                                                    <img src="{{asset('images/backend/product/600_550_'.$image->image_name)}}" class="img-responsive" alt="">

                                                                @else
                                                                    <img src="{{asset('/images/600_550_no_image.png')}}" class="img-responsive" >
                                                                @endif
                                                        </td>
                                                        <td class="checkout-description">
                                                            <h3><a href="{{route('frontend.product',$product->slug)}}">{{$product->title}}</a></h3>
                                                            @foreach($attributes as $att)
                                                                <p><strong>{{$att->attribute->name}}</strong> {{$att->attribute_value}}</p>
                                                            @endforeach
                                                        </td>
                                                        <td class="checkout-price"><strong><span>Rs. </span>{{$product->price}}</strong></td>
                                                        <td class="goods-page-discount">
                                                            @if($product->discount)
                                                                <div class="pi-price">Rs. {{($product->discount/100) * $product->price}}</div>
                                                                {{--                                            <div class="discount-text">{{$latest_product->price}}</div>--}}
                                                                <div class="sticker sticker-sale"></div>
                                                            @else
                                                                <div class="pi-price">No discount</div>
                                                            @endif
                                                        </td>
                                                        <td class="goods-page-price">
                                                            <strong><span>Rs. </span>{{$cart->price}}</strong>

                                                        </td>
                                                        <td class="checkout-price"><strong><span> </span>{{$cart->qty }}  </strong></td>
{{--                                                        {{$cart->price -((($product->discount/100) * $cart->price))*$cart->qty }}--}}

                                                        <td class="checkout-total"><strong><span>Rs. </span>{{$cart->price * $cart->qty}}</strong></td>
                                                    </tr>

                                                @endforeach

                                            </table>
                                        </div>
                                        <div class="checkout-total-block">
                                            <ul>
                                                <li>
                                                    <em>Sub total</em>
                                                    <strong class="price"><span>Rs. </span>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</strong>
                                                </li>
{{--                                                <li>--}}
{{--                                                    <em>Shipping cost</em>--}}
{{--                                                    <strong class="price"><span>$</span>3.00</strong>--}}
{{--                                                </li>--}}
                                                <li>
                                                    <em>Tax (13%)</em>
                                                    <strong class="price"><span>Rs. </span>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</strong>
                                                </li>
{{--                                                <li>--}}
{{--                                                    <em>VAT (17.5%)</em>--}}
{{--                                                    <strong class="price"><span>$</span>3.00</strong>--}}
{{--                                                </li>--}}
                                                <li class="shopping-total-price">
                                                    <em>Total</em>
                                                    <strong class="price"><span>Rs. </span>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</strong>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix">
                                            <br>
                                            <div class="radio-list">
                                                <label>
                                                    <input type="radio" name="payment_type" value="CashOnDelivery" checked> Cash On Delivery
                                                </label>
                                            </div>
                                            <div class="radio-list">
                                                <label>Delivery for: <b>{{$user->name}}</b></label>
                                            </div>

                                            <div class="radio-list">
                                                <label>
                                                    Delivery Address
                                                </label>
                                                <input type="text" class="form-control" style="width: 50%" value="{{$user->address}}" name="address"  checked>
                                            </div>
                                            {!! Form::hidden('subtotal',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())!!}
                                            {!! Form::hidden('tax',\Gloudemans\Shoppingcart\Facades\Cart::tax())!!}
                                            {!! Form::hidden('total',\Gloudemans\Shoppingcart\Facades\Cart::total())!!}



                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END CHECKOUT -->

                    </div>
                    <!-- END CHECKOUT PAGE -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@endsection
