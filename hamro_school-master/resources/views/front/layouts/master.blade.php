<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>
        @yield('title')
    </title>

    <!-- Custom CSS -->
    <link href="{{asset('front')}}/assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{asset('front')}}/assets/css/colors.css" rel="stylesheet">
    @stack('style')
</head>

<body class="red-skin">

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader"><div class="preloader"><span></span><span></span></div></div>


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
        @include('front.layouts.header')
    <!-- End Navigation -->
    <div class="clearfix"></div>
        @yield('content')
    <!-- ============================ Footer Start ================================== -->
    @include('front.layouts.footer')
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
