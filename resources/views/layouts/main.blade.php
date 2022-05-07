<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Inventory Dashboard Page</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('flexy/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{url('flexy/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('flexy/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('flexy/dist/css/style.min.css')}}" rel="stylesheet">
    <script src="https://use.fontawesome.com/f2fc9ac3b2.js"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css-->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')
    </div>
    <script src="{{url('flexy/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('flexy/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    @yield('script')
    <script src="{{url('flexy/dist/js/app-style-switcher.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('flexy/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{url('flexy/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{url('flexy/dist/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{url('flexy/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{url('flexy/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{url('flexy/dist/js/pages/dashboards/dashboard1.js')}}"></script>
</body>
</html>