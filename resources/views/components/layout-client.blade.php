<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}} - Jaqyuu</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/logo/logo.jpg">

    <!-- All CSS is here -->
    <link rel="stylesheet" href="/assets/css/plugins-min/plugins.min.css">
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
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

        .btn:hover {
            color: #ffffff !important;
            background-color: #48544483 !important;
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
    </style>

</head>

<body>

    {{ $slot }}

    <!-- JS
    ============================================ -->

    <!-- Modernizer JS -->
    <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <!-- <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="/assets/js/plugins/jquery.elevateZoom.min.js"></script>
    <script src="/assets/js/plugins/select2.min.js"></script>
    <script src="/assets/js/plugins/ajax-contact.js"></script> -->


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="/assets/js/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

</body>

</html>