<div class="pre-header">
    <div class="container" style="width: 90%">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>{{$settings->phone}}</span></li>

                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="{{route('customer.home')}}">My Account</a></li>
{{--                    <li><a href="shop-wishlist.html">My Wishlist</a></li>--}}
                    <li><a href="{{route('cart.checkout')}}">Checkout</a></li>
                    <li><a href="{{route('frontend.view_compare_items')}}">Compare items</a></li>
                    @if(Auth::guard('customer')->check())

                        <li><a class="nav-link" href="{{ route('customer.logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form-customer').submit();">
                            {{__('Logout')}}
                        </a></li>
                        <form id="logout-form-customer" action="{{route('customer.logout')}}" method="POST">
                            @csrf
                        </form>

{{--                        <a href="{{route('customer.logout')}}">Logout</a>--}}
                    @else
                        <li><a href="{{route('customer.login')}}">Log In</a></li>
                    @endif





                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div class="header">
    <div class="container">
        {{--        <a class="site-logo" href="{{route('frontend.index')}}"><img src="{{asset('images/NepaCareLogo.png')}}" height="55px" alt="Nepa Care"></a>--}}

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
            <div class="top-cart-info">
                <a href="{{route('cart.index')}}" class="top-cart-info-value">Cart</a>
                <a href="{{route('cart.index')}}" class="top-cart-info-count">{{count(\Gloudemans\Shoppingcart\Facades\Cart::content())}} Item(s)</a>
            </div>
            <i class="fa fa-shopping-cart"></i>


        </div>

        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
            <ul>
                <li><a href="{{route('frontend.index')}}">Home</a></li>
                @foreach($navCategories as $category)
                    <li class="dropdown">
                        <a class="dropdown-toggle"  data-target="#" href="{{route('frontend.category',$category->slug)}}">
                            {{$category->name}}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($category->subcategories as $subcategory)
                                <li><a href="{{route('frontend.subcategory',$subcategory->slug)}}">{{$subcategory->name}}</a></li>
                                {{--                        <li class="active"><a href="shop-index.html">Home Default</a></li>--}}
                            @endforeach

                        </ul>
                    </li>
                @endforeach


















{{--                <li class="dropdown">--}}
{{--                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">--}}
{{--                        Woman--}}

{{--                    </a>--}}

{{--                    <!-- BEGIN DROPDOWN MENU -->--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="dropdown-submenu">--}}
{{--                            <a href="shop-product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>--}}
{{--                            <ul class="dropdown-menu" role="menu">--}}
{{--                                <li><a href="shop-product-list.html">Second Level Link</a></li>--}}
{{--                                <li><a href="shop-product-list.html">Second Level Link</a></li>--}}
{{--                                <li class="dropdown-submenu">--}}
{{--                                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">--}}
{{--                                        Second Level Link--}}
{{--                                        <i class="fa fa-angle-right"></i>--}}
{{--                                    </a>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li><a href="shop-product-list.html">Third Level Link</a></li>--}}
{{--                                        <li><a href="shop-product-list.html">Third Level Link</a></li>--}}
{{--                                        <li><a href="shop-product-list.html">Third Level Link</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="shop-product-list.html">Running Shoes</a></li>--}}
{{--                        <li><a href="shop-product-list.html">Jackets and Coats</a></li>--}}
{{--                    </ul>--}}
{{--                    <!-- END DROPDOWN MENU -->--}}
{{--                </li>--}}
{{--                <li class="dropdown dropdown-megamenu">--}}
{{--                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">--}}
{{--                        Man--}}

{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li>--}}
{{--                            <div class="header-navigation-content">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4 header-navigation-col">--}}
{{--                                        <h4>Footwear</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-product-list.html">Astro Trainers</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Basketball Shoes</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Boots</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Canvas Shoes</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Football Boots</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Golf Shoes</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Hi Tops</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Indoor and Court Trainers</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 header-navigation-col">--}}
{{--                                        <h4>Clothing</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-product-list.html">Base Layer</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Character</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Chinos</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Combats</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Cricket Clothing</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Fleeces</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Gilets</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Golf Tops</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 header-navigation-col">--}}
{{--                                        <h4>Accessories</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-product-list.html">Belts</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Caps</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Gloves, Hats and Scarves</a></li>--}}
{{--                                        </ul>--}}

{{--                                        <h4>Clearance</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-product-list.html">Jackets</a></li>--}}
{{--                                            <li><a href="shop-product-list.html">Bottoms</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12 nav-brands">--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-product-list.html"><img title="esprit" alt="esprit" src="{{asset('assets/frontend/pages/img/brands/esprit.jpg')}}"></a></li>--}}
{{--                                            <li><a href="shop-product-list.html"><img title="gap" alt="gap" src="{{asset('assets/frontend/pages/img/brands/gap.jpg')}}"></a></li>--}}
{{--                                            <li><a href="shop-product-list.html"><img title="next" alt="next" src="{{asset('assets/frontend/pages/img/brands/next.jpg')}}"></a></li>--}}
{{--                                            <li><a href="shop-product-list.html"><img title="puma" alt="puma" src="{{asset('assets/frontend/pages/img/brands/puma.jpg')}}"></a></li>--}}
{{--                                            <li><a href="shop-product-list.html"><img title="zara" alt="zara" src="{{asset('assets/frontend/pages/img/brands/zara.jpg')}}"></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="dropdown dropdown100 nav-catalogue">--}}
{{--                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">--}}
{{--                        New--}}

{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li>--}}
{{--                            <div class="header-navigation-content">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                        <div class="product-item">--}}
{{--                                            <div class="pi-img-wrapper">--}}
{{--                                                <a href="shop-item.html"><img src={{asset('assets/frontend/pages/img/products/model4.jpg')}} class="img-reponsive" alt="Berry Lace Dress"></a>--}}
{{--                                            </div>--}}
{{--                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                            <div class="pi-price">$29.00</div>--}}
{{--                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                        <div class="product-item">--}}
{{--                                            <div class="pi-img-wrapper">--}}
{{--                                                <a href="shop-item.html"><img src={{asset('assets/frontend/pages/img/products/model3.jpg')}} class="img-responsive" alt="Berry Lace Dress"></a>--}}
{{--                                            </div>--}}
{{--                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                            <div class="pi-price">$29.00</div>--}}
{{--                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                        <div class="product-item">--}}
{{--                                            <div class="pi-img-wrapper">--}}
{{--                                                <a href="shop-item.html"><img src={{asset('assets/frontend/pages/img/products/model7.jpg')}} class="img-responsive" alt="Berry Lace Dress"></a>--}}
{{--                                            </div>--}}
{{--                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                            <div class="pi-price">$29.00</div>--}}
{{--                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                        <div class="product-item">--}}
{{--                                            <div class="pi-img-wrapper">--}}
{{--                                                <a href="shop-item.html"><img src={{asset('assets/frontend/pages/img/products/model4.jpg')}} class="img-responsive" alt="Berry Lace Dress"></a>--}}
{{--                                            </div>--}}
{{--                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                                            <div class="pi-price">$29.00</div>--}}
{{--                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                --}}
                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">

                        <form action="{{route('frontend.search')}}" method="get">
                            <div class="input-group1">
                                <input type="search" type="text" name="search" class="form-control">
{{--                                <span class="input-group-btn">--}}
                                <button class="btn btn-primary" type="submit">Search</button>

                            </div>
                        </form>
                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
