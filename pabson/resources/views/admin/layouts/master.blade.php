<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">

    <!--end::Base Path -->
    <meta charset="utf-8"/>
    <title>Admin | Dashboard</title>

    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('admin') }}/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
    @stack('style')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="demo1/index.html">
            <img alt="Logo" src="./assets/media/logos/logo-light.png"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        @include('admin.layouts.sidebar')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @include('admin.layouts.header')
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    @yield('content')
                </div>

                <!-- end:: Content -->
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/js/scripts.bundle.js" type="text/javascript"></script>
<script src="{{ asset('') }}ckeditor/ckeditor.js" type="text/javascript"></script>

{{--Amcharts--}}
<script src="{{ asset('admin') }}/assets/js/amchart/core.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/js/amchart/charts.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/js/amchart/animated.js" type="text/javascript"></script>


<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>


<!--end::Page Vendors -->

@stack('script')
<script>
    let flashMessages = @json(session('flash_notification', []));
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    flashMessages.forEach(function (message) {
        if (message.level == 'success') {
            toastr.success(message.message, message.title)
        } else if(message.level == 'error') {
            toastr.error(message.message, message.title)
        } else if(message.level == 'warning') {
            toastr.warning(message.message, message.title)
        } else if(message.level == 'danger') {
            toastr.danger(message.message, message.title)
        }
    });
</script>
</body>

<!-- end::Body -->
</html>
