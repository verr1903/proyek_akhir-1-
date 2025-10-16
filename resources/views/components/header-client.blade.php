        <!--Header Section Start-->
        <div class="header-section d-none d-lg-block">
            <div class="main-header">
                <div class="container position-relative">
                    <div class="row ms-4 align-items-center">
                        <div class="col-lg-2">
                            <div class="header-logo">
                                <a href="#">
                                    <img src="/clientAssets/images/logo/logoo.jpg"
                                        alt="Logo"
                                        class="img-fluid rounded shadow"
                                        style="width: 130px; object-fit: contain;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 position-static ">
                            <div class="site-main-nav">
                                <nav class="site-nav">
                                    <ul class="d-flex gap-4 list-unstyled m-0">
                                        <li><a href="{{ route('dashboard')}}" class="fs-6 ms-5 link-hover">Beranda</a></li>
                                        <li>
                                            <a href="#" class="fs-6 link-hover">Produk<span class="new ms-5">New</span></a>
                                            <ul class="mega-sub-menu d-flex justify-content-between"
                                                style="width:700px;">
                                                <li class="mega-dropdown flex-fill" style="max-width: 33%;">
                                                    <a class="mega-title" href="#">Kategori</a>
                                                    <ul class="mega-item">
                                                        <li><a
                                                                href="{{ route('produk')}}">Hoodie</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('produk')}}">T-Shirt</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('produk')}}">Sweater</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <!-- Koleksi Baru -->
                                                <li class="mega-dropdown flex-fill" style="max-width: 33%;">
                                                    <a class="mega-title" href="#">Koleksi Baru</a>
                                                    <ul class="mega-item">
                                                        <li><a href="{{ route('produk')}}">Rilisan Terbaru</a>
                                                        </li>
                                                        <li><a href="{{ route('produk')}}">Promo & Diskon</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <!-- Akun & Pembelian -->


                                                <!-- Banner Gambar -->
                                                <li class="mega-dropdown flex-fill" style="max-width: 33%;">
                                                    <a class="menu-banner" href="">
                                                        <img src="/clientAssets/images/product/image1.png"
                                                            alt="Koleksi Terbaru Jaqyuu" style="border-radius: 10px;">
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('riwayat')}}" class="fs-6 link-hover">Riwayat</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="header-meta-info">
                                <div class="header-search">
                                    <form action="#" class="btn-round"
                                        style="background-color: #485444; width: 100%; max-width: 400px; margin-left: 0;">
                                        <input type="text" class="ms-3" placeholder="Cari Produk Disini ">
                                        <button><i class="icon-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-account">
                                    <div class="header-account-list dropdown mini-cart">
                                        <a href="{{ route('keranjang') }}" role="button">
                                            <i class="icon-shopping-bag"></i>
                                            <span class="item-count ">2</span>
                                        </a>


                                    </div>
                                    <div class="header-account-list dropdown top-link">
                                        <a href="{{ route('profile') }}" role="button"><i class="icon-users"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Section End-->


        <!--Header Mobile Start-->
        <div class="header-mobile d-lg-none fixed-top bg-white shadow-sm">
            <div class="container">
                <div class="row align-items-center gx-0">
                    <div class="col-6">
                        <div class="header-logo">
                            <a href="#"><img style="width: 90px;margin-top: -10px;" src="/clientAssets/images/logo/logoo.jpg" alt="" class="img-fluid rounded shadow"></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-meta-info">
                            <div class="header-account">
                                <div class="header-account-list dropdown top-link">
                                    <a href="{{ route('profile') }}" role="button"><i class="icon-users"></i></a>
                                </div>
                                <div class="header-account-list mini-cart">
                                    <a href="{{ route('keranjang') }}">
                                        <i class="icon-shopping-bag"></i>
                                        <span class="item-count ">2</span>
                                    </a>
                                </div>
                                <div class="header-account-list mobile-menu-trigger">
                                    <button id="menu-trigger">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Mobile End-->

        <!-- Header Mobile Menu Start-->
        <div class="header-mobile-menu  d-lg-none">

            <a href="javascript:void(0)" class="mobile-menu-close">
                <span></span>
                <span></span>
            </a>

            <div class="header-meta-info">
                <div class="header-search">
                    <form action="#" class="btn-round"
                        style="background-color: #485444; width: 100%; max-width: 400px; margin-left: 0;">
                        <input type="text" class="ms-3" placeholder="Cari Produk Disini ">
                        <button><i class="icon-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="site-main-nav">
                <nav class="site-nav">
                    <ul class="navbar-mobile-wrapper">
                        <li><a href="{{ route('dashboard')}}">Beranda</a></li>
                        <li>
                            <a href="#">Produk <span class="new ms-4">New</span></a>

                            <ul class="mega-sub-menu">
                                <li class="mega-dropdown">
                                    <a class="mega-title" href="#">Kategori</a>
                                    <ul class="mega-item">
                                        <li><a href="{{ route('produk')}}">Hoodie</a></li>
                                        <li><a href="{{ route('produk')}}">T-Shirt</a></li>
                                        <li><a href="{{ route('produk')}}">Sweater</a></li>
                                    </ul>
                                </li>
                                <li class="mega-dropdown">
                                    <a class="mega-title" href="#">Koleksi Baru</a>
                                    <ul class="mega-item">
                                        <li><a href="{{ route('produk')}}">Rilisan Terbaru</a></li>
                                        <li><a href="{{ route('produk')}}">Promo & Diskon</a></li>
                                    </ul>
                                </li>
                                <li class="mega-dropdown">
                                    <a class="menu-banner" href="#">
                                        <img src="/clientAssets/images/product/image1.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('riwayat')}}">Riwayat</a></li>
                    </ul>
                </nav>
            </div>


        </div>
        <!--Header Mobile Menu End -->

        