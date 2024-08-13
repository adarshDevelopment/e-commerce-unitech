<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>


    <link rel="shortcut icon" href="favicon.ico">
    <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->
    <style>
        .discount-text {
            text-decoration: line-through;
        }

        .container{
            width: 90%;
        }
    </style>

    <!-- Global styles START -->

    <link href={{asset('assets/frontend/plugins/font-awesome/css/font-awesome.min.css')}} rel="stylesheet">
    <link href={{asset('assets/frontend/plugins/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{asset('assets/frontend/pages/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="{{asset('assets/frontend/pages/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/pages/css/slider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/pages/css/style-shop.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/corporate/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/corporate/css/style-responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/corporate/css/themes/red.css')}}" rel="stylesheet" id="style-color">
    <link href="{{asset('assets/frontend/corporate/css/custom.css')}}" rel="stylesheet">
    <!-- Theme styles END -->

    @yield('css')
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
            <li class="color-red current color-default" data-style="red"></li>
            <li class="color-blue" data-style="blue"></li>
            <li class="color-green" data-style="green"></li>
            <li class="color-orange" data-style="orange"></li>
            <li class="color-gray" data-style="gray"></li>
            <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
    </div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->

<!-- BEGIN TOP BAR -->

<!-- Header END -->
@include('frontend.includes.header')


@yield('main-content')


<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container" >
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>About us</h2>
                {!! $settings->about_us !!}
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM INFO BLOCK -->
            <div class="col-md-4 col-sm-6 mx-auto pre-footer-col">
{{--                <h2>Information</h2>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Delivery Information</a></li>--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Customer Service</a></li>--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Order Tracking</a></li>--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Shipping &amp; Returns</a></li>--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Careers</a></li>--}}
{{--                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Payment Methods</a></li>--}}
{{--                </ul>--}}
            </div>
            <!-- END INFO BLOCK -->
            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>Our Contacts</h2>
                <address class="margin-bottom-20">
                    {{$settings->street_address}}<br>
                    {{$settings->city}}, {{$settings->country}}<br>
                    Phone: {{$settings->phone}}<br>
{{--                    Fax: 300 323 1456<br>--}}
                    Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
                    Skype: <a href="skype:metronic">{{$settings->email}}</a>
                </address>
            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
{{--        <div class="row">--}}
{{--            <!-- BEGIN SOCIAL ICONS -->--}}
{{--            <div class="col-md-12 col-sm-6 mx-auto">--}}
{{--                    <ul class="social-icons text-center" style="border: 1px solid blue">--}}
{{--                        <li><a class="rss" data-original-title="rss" href="javascript:;"></a></li>--}}
{{--                        <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>--}}
{{--                        <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>--}}
{{--                        <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>--}}
{{--                        <li><a class="linkedin" data-original-title="linkedin" href="javascript:;"></a></li>--}}
{{--                        <li><a class="youtube" data-original-title="youtube" href="javascript:;"></a></li>--}}
{{--                        <li><a class="vimeo" data-original-title="vimeo" href="javascript:;"></a></li>--}}
{{--                        <li><a class="skype" data-original-title="skype" href="javascript:;"></a></li>--}}
{{--                    </ul>--}}
{{--            </div>--}}
{{--            <!-- END SOCIAL ICONS -->--}}
{{--            <!-- BEGIN NEWLETTER -->--}}
{{--            <div class="col-md-6 col-sm-6">--}}
{{--                <div class="pre-footer-subscribe-box pull-right">--}}
{{--                    <h2>Newsletter</h2>--}}
{{--                    <form action="#">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" placeholder="youremail@mail.com" class="form-control">--}}
{{--                            <span class="input-group-btn">--}}
{{--                    <button class="btn btn-primary" type="submit">Subscribe</button>--}}
{{--                  </span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END NEWLETTER -->--}}
{{--        </div>--}}
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                {{ now()->year }} © Unitech Trade Center. ALL Rights Reserved.
            </div>
            <!-- END COPYRIGHT -->

            <!-- BEGIN POWERED -->
{{--            <div class="col-md-6 col-sm-6 text-right" style="border: 1px solid red">--}}
{{--                <p class="powered">Powered by: <a href="http://www.keenthemes.com/">KeenThemes.com</a></p>--}}
{{--            </div>--}}
            <!-- END POWERED -->
        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- BEGIN fast view of a product -->
<div id="product-pop-up" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-3">
                <div class="product-main-image">
                    <img src="{{asset('assets/frontend/pages/img/products/model7.jpg')}}" alt="Cool green dress with red bell" class="img-responsive">
                </div>
                <div class="product-other-images">
                    <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="{{asset('assets/frontend/pages/img/products/model3.jpg')}}"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="{{asset('assets/frontend/pages/img/products/model4.jpg')}}"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="{{asset('assets/frontend/pages/img/products/model5.jpg')}}"></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-9">
                <h2>Cool green dress with red bell</h2>
                <div class="price-availability-block clearfix">
                    <div class="price">
                        <strong><span>$</span>47.00</strong>
                        <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                        Availability: <strong>In Stock</strong>
                    </div>
                </div>
                <div class="description">
{{--                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>--}}
                </div>
                <div class="product-page-options">
                    <div class="pull-left">
                        <label class="control-label">Size:</label>
                        <select class="form-control input-sm">
                            <option>L</option>
                            <option>M</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <div class="pull-left">
                        <label class="control-label">Color:</label>
                        <select class="form-control input-sm">
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Black</option>
                        </select>
                    </div>
                </div>
                <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <a href="shop-item.html" class="btn btn-default">More details</a>
                </div>
            </div>

            <div class="sticker sticker-sale"></div>
        </div>
    </div>
</div>
<!-- END fast view of a product -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src={{asset('assets/frontend/plugins/respond.min.js')}}></script>
<![endif]-->
<script src="{{asset('assets/frontend/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/corporate/scripts/back-to-top.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="{{asset('assets/frontend/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
<script src="{{asset('assets/frontend/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->
<script src='{{asset('assets/frontend/plugins/zoom/jquery.zoom.min.js')}}' type="text/javascript"></script><!-- product zoom -->
<script src="{{asset('assets/frontend/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->

<script src={{asset('assets/frontend/corporate/scripts/layout.js')}} type="text/javascript"></script>
<script src="{{asset('assets/frontend/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/frontend/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/plugins/rateit/src/jquery.rateit.js')}}" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

@yield('js')

<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();
    });
</script>


<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
