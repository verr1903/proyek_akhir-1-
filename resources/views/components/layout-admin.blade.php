<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}} | Jaqyuu</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">

    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="/clientAssets/images/logo/logo.jpg">
    <link rel="stylesheet" href="/AdminAssets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="/AdminAssets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="/AdminAssets/plugins/morrisjs/morris.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="/AdminAssets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/AdminAssets/css/color_skins.css">

    <style>
        /* ================= LOGO VISIBILITY ================= */

        /* DESKTOP: sembunyikan logo */
        @media (min-width: 992px) {
            .navbar-header img {
                display: block !important;
            }
        }

        /* MOBILE: tampilkan logo */
        @media (max-width: 991px) {
            .navbar-header img {
                display: none !important;
            }
        }


        /* ================= TOGGLE SIDEBAR ================= */

        /* DESKTOP */
        @media (min-width: 992px) {
            .ls-toggle-btn {
                display: inline-flex;
            }
        }

        /* MOBILE */
        @media (max-width: 991px) {
            .ls-toggle-btn {
                display: none  !important;
                padding: 6px 8px;
            }
            .judul{
                padding-left: 50px;
            }
            
        }

        /* ================= NAVBAR MOBILE ================= */
        @media (max-width: 991px) {

            /* Navbar container */
            .navbar .col-12 {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: nowrap;
            }

            /* Header kiri (logo + toggle) */
            .navbar-header {
                padding: 10px 0 !important;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            /* Logo */
            .navbar-header img {
                max-width: 95px !important;
                height: 40px !important;
                margin: 0 !important;
                box-shadow: 1px 2px 6px #445244;
            }

            /* Tombol menu mobile */
            #mobileSidebarToggle {
                padding: 6px 10px;
            }


            /* Judul halaman */
            .navbar-left {
                margin: 0 !important;
                flex: 1;
                display: flex;
                justify-content: center;
            }

            .navbar-left span {
                font-size: 16px !important;
                font-weight: 700;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 180px;
                text-align: center;
            }

            /* User info */
            .user-dropdown .info-container {
                display: none;
            }

            .user-dropdown img {
                width: 36px;
                height: 36px;
                margin-right: 0;
            }

            /* Dropdown position */
            .dropdown-menu {
                right: 0 !important;
                left: auto !important;
            }
        }

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


        /* produk */
        .img-clickable {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .img-clickable:hover {
            transform: scale(1.1);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #f4f4f4;
            color: #555;
            margin: 0 3px;
            transition: all 0.25s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Hover effect: berubah warna + sedikit naik */
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
            text-decoration: none;
        }

        /* Efek klik (aktif) */
        .btn-action:active {
            transform: scale(0.9);
        }

        /* Warna spesifik berdasarkan fungsi */
        .btn-action.waves-yellow:hover {
            background-color: #e2de01ff;
            color: #fff;
        }

        /* Warna spesifik berdasarkan fungsi */
        .btn-action.waves-blue:hover {
            background-color: #2196f3;
            color: #fff;
        }

        .btn-action.waves-red:hover {
            background-color: #e53935;
            color: #fff;
        }

        /* Tombol Tambah Produk */
        .btn-success.btn-rounded {
            transition: all 0.3s ease;
            border-radius: 50px;
            font-weight: 600;
            border-radius: 10px !important;
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);
        }

        /* Efek hover: membesar dan warna lebih terang */
        .btn-success.btn-rounded:hover {
            transform: scale(1.07);
            background-color: #2ecc71;
            /* hijau lebih cerah */
            box-shadow: 0 6px 15px rgba(46, 204, 113, 0.5);
        }

        /* Efek klik (active): sedikit mengecil */
        .btn-success.btn-rounded:active {
            transform: scale(0.95);
            box-shadow: 0 3px 8px rgba(39, 174, 96, 0.4);
        }

        .modal-header .btn[data-bs-dismiss="modal"] {
            background: transparent !important;
            box-shadow: none !important;
        }

        .modal-header .btn[data-bs-dismiss="modal"]:hover {
            background: transparent !important;
        }

        .modal-header .btn[data-bs-dismiss="modal"] i {
            transition: all 0.3s ease;
            color: white;
        }

        .modal-header .btn[data-bs-dismiss="modal"]:hover i {
            color: #ffb6b6;
            transform: rotate(90deg);
        }

        .close-footer {
            transition: all 0.3s ease;
            border-color: #6c757d;
            /* warna default bootstrap */
            color: #6c757d;
        }

        .close-footer:hover {
            background-color: #dc3545;
            /* merah bootstrap */
            border-color: #dc3545;
            color: #fff;
            /* teks putih agar kontras */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .kategori-select {
            appearance: none;
            width: 100%;
            border-radius: 5px;

        }

        /* pesanan online */
        .ml-menu a.active-menu {
            background-color: #f0f0f0;
            font-weight: 600;
            border-left: 3px solid rgba(15, 92, 47, 0.5);
            color: #333 !important;
        }

        .ml-menu a.active-menu i {
            color: rgba(15, 92, 47, 0.5);
        }

        .status-badge {
            display: inline-block;
            min-width: 120px;
            /* ubah sesuai kebutuhan */
            text-align: center;
            padding: 10px 0;
            /* atur tinggi agar proporsional */
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
        }

        .custom-select-style {
            height: 40px;
            /* samakan tinggi dengan input bootstrap */
            padding-left: 10px;
            padding-bottom: 3px;
            font-size: 1rem;
            appearance: none;
            /* hilangkan gaya bawaan browser */
            border-color: #d8d2fdff;
            border-radius: 3px;
            box-shadow: 0 0 0 1rem rgba(22, 22, 22, 0.25);
            margin-left: -5px;
            width: 755px;
            background-image: none;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .custom-select-style:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            outline: 0;
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


    <!-- Font Awesome 6.6.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-KC6o7bL5Q12h5tWzP4D0g+6HL0DqF6AblFdvXJ7z9F3MUt1SCJQF6DBrZ6KPRsInH9ZBvJ07PrlxqUAWk+QZ3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap 5 Bundle (sudah termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script src="/AdminAssets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="/AdminAssets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
    <script src="/AdminAssets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="/AdminAssets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/AdminAssets/bundles/mainscripts.bundle.js"></script>
    <script src="/AdminAssets/js/pages/index.js"></script>
    <script src="/AdminAssets/js/pages/charts/jquery-knob.min.js"></script>
    @stack('scripts')
    


</body>

</html>