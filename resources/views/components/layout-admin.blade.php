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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/AdminAssets/css/color_skins.css">

    <style>
        /* navbar */
        .notif-shake {
            font-size: 22px;
            margin-top: 10px;
            color: black;
            transition: color 0.3s ease;
        }

        .notif-shake:hover {
            color: #445244;
            animation: shake 0.5s ease;
        }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(10deg);
            }

            75% {
                transform: rotate(-10deg);
            }
        }

        .swap-glow i {
            font-size: 28px;
            color: black;
            transition: all 0.3s ease;
        }

        .swap-glow:hover i {
            color: #445244;
            animation: wiggle 0.4s ease;
        }

        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(10deg);
            }

            75% {
                transform: rotate(-10deg);
            }
        }

        .user-dropdown {
            text-decoration: none;
            transition: all 0.3s ease;
        }


        .user-dropdown img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        /* Hover efek */
        .user-dropdown:hover img {
            transform: scale(1.1);
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.5);
            border-color: #ffffffaa;
        }

        /* dashboar */
        .progress {
            background-color: #e9ecef;
            border-radius: 50px;
            height: 12px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .progress-bar {
            height: 100%;
            border-radius: 50px;
            transition: width 1s ease-in-out;
        }

        .card-value {
            font-size: 26px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .btn.dropdown-toggle.btn-default {
            display: none !important;
        }
        
    </style>

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
    <x-navbar-admin :title="$title" />

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="/AdminAssets/bundles/mainscripts.bundle.js"></script>
    <script src="/AdminAssets/js/pages/index.js"></script>
    <script src="/AdminAssets/js/pages/charts/jquery-knob.min.js"></script>
    @stack('scripts')
</body>

</html>