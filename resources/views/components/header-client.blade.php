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
                                                                href="{{ route('produk', 'Hoodie') }}">Hoodie</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('produk', 'Tshirt')}}">T-Shirt</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('produk', 'Sweater')}}">Sweater</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <!-- Koleksi Baru -->
                                                <li class="mega-dropdown flex-fill" style="max-width: 33%;">
                                                    <a class="mega-title" href="#">Koleksi Baru</a>
                                                    <ul class="mega-item">
                                                        <li><a href="{{ route('produk', ['sort' => 'terbaru']) }}">Rilisan Terbaru</a></li>
                                                        <li><a href="{{ route('produk', ['discount' => 'true']) }}">Promo & Diskon</a></li>

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
                                    <form action="{{ route('search.suggest')}}" method="GET" class="btn-round position-relative" id="searchForm"
                                        style="background-color:#485444; width:100%; max-width:400px;">
                                        <input type="text" id="searchInput" name="search" class="ms-3" placeholder="Cari Produk Disini" autocomplete="off">
                                        <input type="hidden" id="detailBase" value="{{ url('detail') }}">
                                        <button><i class="icon-search"></i></button>

                                        <!-- Suggestion box -->
                                        <div id="suggestBox"
                                            class="bg-white shadow rounded position-absolute w-100 mt-2 d-none"
                                            style="z-index: 1000;">
                                        </div>
                                    </form>

                                </div>
                                <div class="header-account">
                                    <div class="header-account-list dropdown mini-cart">
                                        <a href="{{ route('keranjang') }}" role="button">
                                            <i class="icon-shopping-bag"></i>
                                            @if(!empty($cartCount) && $cartCount > 0)
                                            <span class="item-count">{{ $cartCount }}</span>
                                            @endif
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

        @push('scripts')
        <script>
            document.getElementById('searchInput').addEventListener('keyup', function() {
                let keyword = this.value.trim();

                if (keyword.length < 1) {
                    document.getElementById('suggestBox').classList.add('d-none');
                    return;
                }

                fetch(`/search-suggest?q=${keyword}`)
                    .then(res => res.json())
                    .then(data => {
                        let box = document.getElementById('suggestBox');

                        if (data.length === 0) {
                            box.innerHTML = '<div class="p-2 text-muted">Tidak ada hasil</div>';
                            box.classList.remove('d-none');
                            return;
                        }

                        let html = '';
                        data.forEach(item => {
                            let baseDetail = document.getElementById('detailBase').value;

                            html += `
                            <a href="${baseDetail}/${item.encrypted_id}" 
                            class="d-flex align-items-center p-2 border-bottom text-decoration-none text-dark">
                                <img src="/storage/${item.gambar}" width="40" height="40" class="rounded me-2">
                                <div>
                                    <div>${item.nama}</div>
                                    <small class="text-muted">Rp ${item.harga}</small>
                                </div>
                            </a>
                        `;
                        });

                        box.innerHTML = html;
                        box.classList.remove('d-none');
                    });
            });

            // hide suggest when clicking outside
            document.addEventListener('click', function(e) {
                if (!document.getElementById('searchForm').contains(e.target)) {
                    document.getElementById('suggestBox').classList.add('d-none');
                }
            });
        </script>
        @endpush