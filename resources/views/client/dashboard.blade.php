<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">
        <x-header-client></x-header-client>

        <!--Slider Start-->
        <div class="slider-area">
            <div class="swiper-container slider-active">
                <div class="swiper-wrapper">
                    @foreach ($iklan as $item)
                    <div class="single-slider swiper-slide animation-style-01" style="background-image: url({{ asset('storage/' . $item->gambar) }}); background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="slider-content ms-3">
                                <h2 class="main-title">{!! $item->judul !!}</h2>
                                <p>{!! $item->sub_judul !!}</p>
                                <ul class="slider-btn">
                                    <li>
                                        <a href="" class="btn btn-round"
                                            style="background-color: #485444; color: white;">
                                            Start Shopping
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Add Arrows -->
                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!--Slider End-->

        <!--Shipping Start-->
        <div class="shipping-area section-padding-3">
            <div class="container">
                <div class="row">
                    <!-- Pengiriman -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="/clientAssets/images/shipping-icon/Free-Delivery.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Pengiriman Cepat</h5>
                                <p>Gratis pengiriman ke seluruh wilayah Pekanbaru untuk setiap pesanan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pemesanan Online -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="/clientAssets/images/shipping-icon/Online-Order.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Pesan Online</h5>
                                <p>Pesan bunga secara online dengan mudah melalui situs kami</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pemesanan Offline -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="/clientAssets/images/shipping-icon/Freshness.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Pesan Offline</h5>
                                <p>Kunjungi toko kami langsung untuk memilih dan membeli bunga secara offline</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Shipping End-->



        <!--New Product Start-->
        <div class="features-product-area section-padding-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-9 col-sm-11">
                        <div class="section-title text-center">

                        </div>
                    </div>
                </div>
                <div class="product-wrapper">

                    <!-- Tab Menu -->
                    <div class="product-tab-menu d-flex flex-wrap justify-content-center align-items-center gap-3">
                        <ul class="nav nav-pills d-flex flex-row justify-content-center flex-nowrap" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link nav-link1 active" data-bs-toggle="tab" href="#tab1" role="tab">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab">Recommended</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab3" role="tab" style="margin-right: 100px;">Trending</a>
                            </li>
                        </ul>


                        <!-- Filter & Sort -->
                        <div class="d-flex gap-2">
                            <!-- Sort By -->
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle rounded-3" style="background-color: #485444;color: white;" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort By
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item" href="#">Newest</a></li>
                                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                                    <li><a class="dropdown-item" href="#">Best Rated</a></li>
                                </ul>
                            </div>

                            <!-- Filter -->
                            <button class="btn btn-sm rounded-3" style="background-color: #485444;color: white;" data-bs-toggle="modal" data-bs-target="#filterModal">
                                Filter
                            </button>
                        </div>
                    </div>


                    <!-- Modal Filter -->
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filterModalLabel">Filter Products</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contoh isi filter -->
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select">
                                            <option>All</option>
                                            <option>Electronics</option>
                                            <option>Fashion</option>
                                            <option>Home</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price Range</label>
                                        <input type="range" class="form-range" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="tab-content product-items-tab">

                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <div class="row justify-content-center">
                                @forelse($products as $product)
                                <div class="col-lg-4 col-sm-6 mb-2">
                                    <div class="single-product">
                                        <div class="product-image position-relative">
                                            <a href="{{ route('detail', ['id' => $product->id]) }}">
                                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
                                            </a>
                                            @php
                                            $totalStok = ($product->stok_s ?? 0) + ($product->stok_m ?? 0) + ($product->stok_l ?? 0) + ($product->stok_xl ?? 0);
                                            @endphp
                                            {{-- Jika stok habis --}}

                                            @if($totalStok <= 0)
                                                <span class="sticker-new soldout-title">Soldout</span>
                                                @endif

                                                {{-- Jika ada diskon --}}
                                                @if($product->discount && $product->discount->persentase > 0)
                                                <span class="sticker-new label-sale">
                                                    -{{ $product->discount->persentase }}%
                                                </span>
                                                @endif


                                                <div class="action-links">
                                                    <ul>
                                                        @if($totalStok > 0)
                                                        <li class="mt-3 me-3">
                                                            <a href="" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart">
                                                                <i class="icon-shopping-bag"></i>
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>

                                                {{-- Countdown (contoh jika ada event promo dengan tanggal akhir) --}}
                                                @if($product->discount && $product->discount->end_date)
                                                <div class="product-countdown">
                                                    <div data-countdown="{{ $product->discount->end_date }}"></div>
                                                </div>
                                                @endif
                                        </div>

                                        <div class="product-content text-center">
                                            <div class="rating">
                                                <div class="rating-on" style="width: {{ $product->rating_percent ?? 80 }}%;"></div>
                                            </div>

                                            <h4 class="product-name">
                                                <a href="{{ route('detail', ['id' => $product->id]) }}">
                                                    {{ $product->nama }}
                                                </a>
                                            </h4>

                                            <div class="price-box">
                                                @if($product->discount && $product->discount->persentase > 0)
                                                @php
                                                $discountPrice = $product->harga - ($product->harga * $product->discount->persentase / 100);
                                                @endphp
                                                <span class="current-price">
                                                    Rp{{ number_format($discountPrice, 0, ',', '.') }}
                                                </span>
                                                <span class="old-price text-decoration-line-through">
                                                    Rp{{ number_format($product->harga, 0, ',', '.') }}
                                                </span>
                                                @else
                                                <span class="current-price">
                                                    Rp{{ number_format($product->harga, 0, ',', '.') }}
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-5">
                                    <h5 class="text-muted">Belum ada produk tersedia.</h5>
                                </div>
                                @endforelse
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <div class="swiper-container product-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-27%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$55.00</span>
                                                    <span class="old-price">$75.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-35%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>

                                                <div class="product-countdown">
                                                    <div data-countdown="2025/12/31"></div>
                                                </div>

                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Scarlet Sage</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$39.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Foxglove Flower</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$79.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Arrows -->
                                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <div class="swiper-container product-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-27%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$55.00</span>
                                                    <span class="old-price">$75.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Foxglove Flower</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$79.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="">
                                                    <img src="/client/clientAssets/images/product/image1.png" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-35%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li class="mt-2 me-2"><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>

                                                    </ul>
                                                </div>

                                                <div class="product-countdown">
                                                    <div data-countdown="2020/12/31"></div>
                                                </div>

                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="">Scarlet Sage</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$39.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Arrows -->
                                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--New Product End-->





        <x-footer-client></x-footer-client>







    </div>

</x-layout-client>