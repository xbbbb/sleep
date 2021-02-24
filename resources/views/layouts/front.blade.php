<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Global Forex</title>

    <!-- Scripts -->
    <script src="{{ asset('js/Chart.js') }}" defer></script>
    <script src="{{ asset('js/Chart.Financial.js') }}" defer></script>
    <script src="{{ asset('js/moment.js') }}" ></script>
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}" ></script>









    <!-- Fonts -->
    <!-- Google font (font-family: 'Poppins', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700" rel="stylesheet">
    <!-- Google font (font-family: 'Work Sans', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fakeloader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/meanmenu.css') }}" rel="stylesheet">

    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">



    <link href="{{ asset('css/slick.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animated-headline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet">


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <style>
        /*添加淡入淡出的css*/
        .carousel-fade .carousel-inner .item{ opacity:0; -webkit-transition-property:opacity;-moz-transition-property:opacity ; -ms-transition-property:opacity;-o-transition-property:opacity;transition-property:opacity ;}
        .carousel-fade .carousel-inner .active{ opacity: 1;}
        .carousel-fade .carousel-inner .active.left,.carousel-fade .carousel-inner .active.right{left: 0;opacity: 0;}
        .carousel-fade .carousel-inner .next.left,
        .carousel-fade .carousel-inner .prev.right {opacity: 1;}
    </style>

</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>

<script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}" ></script>
<script src="{{ asset('js/popper.min.js') }}" ></script>
<script src="{{ asset('js/active.js') }}" defer></script>
<script src="{{ asset('js/scripts.js') }}" ></script>
<script src="{{ asset('js/app.js') }}" defer></script>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <div class="fakeloader"></div>
    <div class="wrapper" id="wrapper">

        <!-- Header -->
        <header id="header" class="header sticky--header">



            <div class="header__bottom" style="background-image:url({{url('img/topbar.png')}}); background-position: center;background-repeat: no-repeat; background-size: cover;">
                <div class="container d-none d-lg-block">
                    <div class="header__bottom__inner">
                        <div class="header__logo">
                            <a href="{{url('/')}}">
                                <img src="{{url('img/logo.png')}}"   alt="header logo" style="max-width: 200px">
                            </a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="main-navigation" class="header__menu main-navigation">
                            <ul>

                                <li style="padding-right:15px ">
                                    <a href="{{url('/')}}">主页</a>
                                </li>

                                <li style="padding-right:15px ">
                                    <a href="{{url('/rates')}}">汇率</a>
                                </li>

                                <li >
                                    <a href="{{url('/service')}}">服务</a>
                                </li>

                                <li >
                                    <a href="https://everpay.com.au/globalforex">用户登录</a>
                                </li>

                                <li>
                                    <a href="{{url('/contact')}}">联系方式</a>
                                </li>
                                <li>
                                    <a href="{{url('/news/1')}}">金融新闻</a>
                                </li>
                            </ul>
                        </nav>
                        <!--// Main Navigation -->

                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="container d-block d-lg-none">
                    <div class="mobile-menu clearfix d-md-block d-lg-none">
                        <a class="mobile-logo" href="{{url('/')}}">
                            <img src="{{url('img/logo.png')}}" height="60.8" width="158.51" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- //Mobile Menu -->

            </div>
            <!--// Header Bottom Area -->

        </header>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{url("img/1.jpg")}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 " src="{{url("img/2.jpg")}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{url("img/3.jpg")}}" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{url("img/4.jpg")}}" alt="Third slide">
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



    </div>



@yield('content')



    <!-- Footer Area -->
        <footer id="footer" class="footer-area fixed--footer">

            <!-- Footer Widgets Area -->
            <div class="footer-area__widgets section-padding--lg bg--dark--light">
                <div class="container">
                    <div class="widget-area footer--widgets">

                        <!-- Single Widget -->
                        <div class="widget widget-about">
                            <div class="footer-area__logo" >
                                <a href="index.html">
                                    <h5 class="widget-title">全球汇兑</h5>
                                </a>
                            </div>
                            <p>2008年成立于墨尔本的金融公司<br>
                                专业从事货币兑换和国际转账业务</p>
                            <div class="social-icons social-icons--rounded">
                                <ul>
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <div class="widget widget-quick-links">
                            <h5 class="widget-title">快速链接</h5>
                            <ul>
                                <li>
                                    <a href="{{url("/service")}}">服务</a>
                                </li>
                                <li>
                                    <a href="{{url("/rates")}}">汇率</a>
                                </li>
                                <li>
                                    <a href="{{url("/contact")}}">联系方式</a>
                                </li>
                            </ul>
                        </div>
                        <!--// Single Widget -->


                        <!-- Single Widget -->
                        <div class="widget widget-contact-info">
                            <h5 class="widget-title">联系方式</h5>
                            <ul>
                                <li>
                                    <p>A: 501 High St, Preston,VIC, Australia, 3072</p>
                                </li>
                                <li>
                                    <p>
                                        <a href="callto://0394789809/">T: (03) 94789809</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        E: preston@global-forex.com.au
                                    </p>
                                </li>

                            </ul>
                        </div>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <div class="widget widget-contact-info">
                            <h5 class="widget-title">全球汇兑Preston微信</h5>

                            <img src="{{url('img/ewm.jpg')}}" height="170.8"  alt="footer logo">

                        </div>
                        <!--// Single Widget -->

                    </div>
                </div>
            </div>
            <!--// Footer Widgets Area -->

            <!-- Footer Copyright Area -->
            <div class="footer-area__copyright bg--dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright text-center">
                                Copyright &copy; 2020.Global Forex. All rights reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Footer Copyright Area -->

        </footer>
        <!-- //Footer Area -->


<script src="{{ asset('js/plugins.js') }}" ></script>


</body>
</html>
