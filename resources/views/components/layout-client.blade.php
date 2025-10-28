<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}} | Jaqyuu</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/clientAssets/images/logo/logo.jpg">

    <!-- All CSS is here -->
    <link rel="stylesheet" href="/clientAssets/css/plugins-min/plugins.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="/clientAssets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        .google-btn:hover {
            background-color: #445244;
            box-shadow: 0 4px 10px rgba(68, 82, 68, 0.3);
            transform: translateY(-2px);
        }

        .google-btn:hover img {
            transform: scale(1.4);
        }

        body {
            background-color: #f0ecec;
        }

        .header-search input {
            color: #ffffffff;
            /* warna teks putih */
            background-color: transparent;
            /* biar transparan, kalau mau */
            border: none;
            /* opsional kalau mau tanpa border */
        }

        .header-search input::placeholder {
            color: rgba(255, 255, 255, 1);
            /* placeholder juga putih tapi agak transparan */
        }

        .header-search button {
            background: transparent;
            /* biar transparan */
            border: 2px solid #fff;
            /* border putih */
            border-radius: 50%;
            /* bulat */
            width: 40px;
            /* ukuran lingkaran */
            height: 40px;
            display: flex;
            /* biar icon di tengah */
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .header-search button i {
            color: #fff;
            /* icon putih */
            font-size: 18px;
            /* ukuran icon */
        }

        .header-search form {
            border: 2px solid transparent;
            /* default tidak terlihat */
            transition: border-color 0.3s ease;
        }

        .header-search form:focus-within {
            border-color: #000000ff;
            /* saat input aktif/focus, border jadi putih */
        }

        .header-search input[type="text"] {
            color: #fff !important;
            /* teks user */
            background-color: transparent;
            /* biar tidak nutup background form */
            border: none;
            /* opsional */
            outline: none;
            /* hilangkan outline biru default */
        }

        .header-search input[type="text"]::placeholder {
            color: rgba(255, 255, 255, 0.7);
            /* placeholder putih samar */
        }

        .link-hover:hover {
            color: #485444 !important;
        }



        .nav-pills .nav-link.active {
            background-color: #485444 !important;
            /* hijau gelap kamu */
            color: #fff !important;
        }

        .single-slider {
            background-size: cover;
            /* biar gambar selalu full cover */
            background-position: center;
            /* posisikan tengah */
            background-repeat: no-repeat;
            min-height: 600px;
            /* tinggi default untuk desktop */
            display: flex;
            align-items: center;
        }

        /* Tablet */
        @media (max-width: 992px) {
            .single-slider {
                min-height: 450px;
            }

            .slider-content h2.main-title {
                font-size: 2rem;
            }

            .slider-content h5.sub-title {
                font-size: 1.2rem;
            }
        }

        /* Mobile */
        @media (max-width: 576px) {
            .single-slider {
                min-height: 350px;
                text-align: center;
                padding: 0 15px;
            }

            .slider-content h2.main-title {
                font-size: 1.5rem;
            }

            .slider-content h5.sub-title {
                font-size: 1rem;
            }

            .slider-content p {
                font-size: 0.9rem;
            }

            .slider-btn .btn {
                padding: 6px 16px;
                font-size: 0.9rem;
            }

            .product-wrapper .nav-link {
                margin-right: -15px;
            }

            .product-wrapper .nav-link1 {
                margin-left: 90px;
            }
        }

        .header-mobile .header-logo img {
            max-height: 50px;
        }

        .header-mobile .header-account-list a,
        .header-mobile .header-account-list button {
            font-size: 20px;
            color: #485444;
        }

        .header-mobile .header-account-list {
            display: flex;
            align-items: center;
        }

        .size-options {
            display: flex;
            gap: 8px;
            align-items: center;
            font-family: sans-serif;
        }

        .size-options label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 35px;
            border: 2px solid #999;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
            background-color: #f5f5f5;
            color: #333;
        }

        .size-options input[type="radio"] {
            display: none;
        }

        .size-options input[type="radio"]:checked+label {
            background-color: #3f4b3f;
            /* warna hijau gelap seperti di contoh */
            color: white;
            border-color: #3f4b3f;
        }

        /* Warna dasar lembut */
        .btn-soft-success {
            background-color: #bde5c8;
            color: #155724;
            border: none;
            transition: all 0.25s ease;
            padding: 8px 12px;
        }

        /* Saat hover */
        .btn-soft-success:hover {
            background-color: #28a745;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }

        /* Saat tombol aktif (terpilih) */
        .btn-soft-success.active {
            background-color: #28a745 !important;
            color: #fff !important;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }

        .btn-soft-success.active {
            background-color: #28a745;
            /* hijau utama */
            color: #fff;
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
            transform: none;
        }

        /* Tombol warning (edit / alamat utama) */
        .btn-soft-warning {
            background-color: #fff3cd;
            /* kuning lembut */
            color: #856404;
            /* teks gelap khas warning */
            border: none;
            transition: all 0.25s ease;
            padding: 8px 12px;
        }

        .btn-soft-warning:hover {
            background-color: #ffc107;
            /* kuning Bootstrap standard */
            color: #fff;
            /* teks putih */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
        }


        /* Tombol hapus */
        .btn-soft-danger {
            background-color: #f5c6cb;
            color: #721c24;
            border: none;
            transition: all 0.25s ease;
            padding: 8px 12px;
        }

        .btn-soft-danger:hover {
            background-color: #dc3545;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        @media (max-width: 768px) {
            .desktop-view {
                display: none;
            }

            .mobile-view {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .desktop-view {
                display: block;
            }

            .mobile-view {
                display: none;
            }
        }

        .fci {
            width: 20px;
            height: 20px;
            border: 2px solid #aaa;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .fci:checked {
            background-color: #445244;
            border-color: #445244;
            box-shadow: 0 0 4px rgba(68, 82, 68, 0.4);
        }

        @media (max-width: 991px) {
            body {
                padding-bottom: 70px;
                padding-top: 50px;
                /* sesuaikan tinggi header-mobile kamu */
            }

            .checkout-footer {
                z-index: 1030;
                /* agar di atas elemen lain */
            }

            .cd {
                transition: all 0.2s ease-in-out;
            }

            .cd:hover {
                background-color: #f8f9fa;
                /* warna abu muda saat hover */
                transform: scale(1.01);
            }

            .cd-body {
                padding: 12px 16px;
            }
        }

        .btn-outline-custom {
            color: #445244;
            border: 1.5px solid #445244;
            background-color: transparent;
            transition: all 0.2s ease-in-out;
        }

        .btn-outline-custom:hover,
        .btn-outline-custom:focus {
            background-color: #445244;
            color: #fff;
        }

        .btn-outline-custom.active,
        .btn-outline-custom:active {
            background-color: #445244 !important;
            color: #fff !important;
            border-color: #445244 !important;
        }

        .star-rating {
            display: inline-flex;
            flex-direction: row;
            font-size: 2.2rem;
            cursor: pointer;
            user-select: none;
        }

        .star {
            color: #ccc;
            position: relative;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .star::before {
            content: '\f005';
            /* fa-star */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #ccc;
        }

        .star.active::before,
        .star.hover::before {
            color: #f7c600;
        }

        /* Hover efek */
        .star:hover {
            transform: scale(1.2);
        }

        @media (max-width: 576px) {
            .star-rating {
                font-size: 1.8rem;
            }
        }

        /* Modal mobile style */
        .mobile-ulasan-content {
            background-color: #fff;
        }

        .mobile-ulasan-stars {
            gap: 4px;
            flex-wrap: wrap;
        }

        .mobile-star {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
        }

        .mobile-star::before {
            content: '\f005';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .mobile-star.active,
        .mobile-star.hover {
            color: #ffcc00;
        }

        /* Tambahan agar nyaman di mobile */
        @media (max-width: 576px) {
            .mobile-ulasan-content {
                border-radius: 0 !important;
            }

            .modal-body {
                padding: 1rem 1.2rem;
            }

            .mobile-star {
                font-size: 1.8rem;
            }

            #mobileUlasanText {
                font-size: 15px;
            }
        }

        .header-mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            /* tersembunyi */
            width: 80%;
            height: 100vh;
            background: white;
            transition: right 0.3s ease;
            z-index: 1050;
        }

        .header-mobile-menu.active {
            right: 0;
            /* muncul dari kanan */
        }

        /* backdrop hitam transparan */
        .menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        .menu-overlay.show {
            display: block;
        }

        .product-image img {
            width: 100%;
            height: 410px;
            /* kamu bisa ubah: 200px, 300px, dst */
            object-fit: fill;
            /* menjaga proporsi, memotong sisi jika perlu */
            border-radius: 10px;
            /* opsional, buat sudut agak melengkung */
        }

        /* toast untuk halaman detail */
        .toast-message {
            visibility: hidden;
            min-width: 280px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 8px;
            padding: 12px;
            position: fixed;
            z-index: 9999;
            left: 50%;
            bottom: 40px;
            transform: translateX(-50%);
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.4s, bottom 0.4s;
        }

        .toast-message.show {
            visibility: visible;
            opacity: 1;
            bottom: 60px;
        }
    </style>

</head>

<body>

    {{ $slot }}

    <!-- JS
    ============================================ -->

    <!-- Modernizer JS -->
    <script src="/clientAssets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="/clientAssets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <!-- <script src="/clientAssets/js/vendor/popper.min.js"></script>
    <script src="/clientAssets/js/vendor/bootstrap.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="/clientAssets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/clientAssets/js/plugins/jquery.countdown.min.js"></script>
    <script src="/clientAssets/js/plugins/jquery.elevateZoom.min.js"></script>
    <script src="/clientAssets/js/plugins/select2.min.js"></script>
    <script src="/clientAssets/js/plugins/ajax-contact.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="/clientAssets/js/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="/clientAssets/js/main.js"></script>
    @stack('scripts')
</body>

</html>