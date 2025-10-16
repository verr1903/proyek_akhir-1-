<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>{{$title}} | Jaqyuu</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/AdminAssets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="/AdminAssets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="/AdminAssets/plugins/morrisjs/morris.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="/AdminAssets/css/main.css">
    <link rel="stylesheet" href="/AdminAssets/css/color_skins.css">
</head>

<body class="theme-orange">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <p>Please wait...</p>
            <div class="m-t-30"><img src="/AdminAssets/images/logo.svg" width="48" height="48" alt="Nexa"></div>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div><!-- Search  -->


    <!-- Top Bar -->
    <x-navbar-admin></x-navbar-admin>

    <!-- Sidebar -->
    <x-sidebar-admin></x-sidebar-admin>

    <!-- Main Content -->
    {{ $slot }}

    <!-- Jquery Core Js -->
    <script src="/AdminAssets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="/AdminAssets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="/AdminAssets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="/AdminAssets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
    <script src="/AdminAssets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="/AdminAssets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->

    <script src="/AdminAssets/bundles/mainscripts.bundle.js"></script>
    <script src="/AdminAssets/js/pages/index.js"></script>
    <script src="/AdminAssets/js/pages/charts/jquery-knob.min.js"></script>
</body>

</html>