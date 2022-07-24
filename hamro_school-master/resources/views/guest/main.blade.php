<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link href="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('admin') }}/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin') }}/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin') }}/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin') }}/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="{{asset('front')}}/assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{asset('front')}}/assets/css/colors.css" rel="stylesheet">
    @stack('style')
</head>
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light head-shadow">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    <a class="nav-brand" href="{{ route('home') }}">
                        Guest Dashboard
                    </a>
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    <ul class="nav-menu nav-menu-social align-to-right">
                        <li class="login_click bg-red">
                            <a href="{{ route('home') }}">Logout</a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>

    <!-- Container Start -->

@yield('content')


<!-- Container End -->

    <!-- ============================ Footer Start ================================== -->
{{--@include('front.layouts.footer')--}}
<!-- ============================ Footer End ================================== -->
    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('front')}}/assets/js/jquery.min.js"></script>
<script src="{{asset('front')}}/assets/js/popper.min.js"></script>
<script src="{{asset('front')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('front')}}/assets/js/select2.min.js"></script>
<script src="{{asset('front')}}/assets/js/slick.js"></script>
<script src="{{asset('front')}}/assets/js/jquery.counterup.min.js"></script>
<script src="{{asset('front')}}/assets/js/counterup.min.js"></script>
<script src="{{asset('front')}}/assets/js/custom.js"></script>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
@stack('script')
</body>
</html>
