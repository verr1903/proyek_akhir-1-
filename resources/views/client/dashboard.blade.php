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
                                <p>Pesan pakaian pria secara online dengan mudah melalui situs kami</p>
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
                                <p>Kunjungi toko kami langsung untuk memilih dan membeli pakaian pria secara offline</p>
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
                            <div class="row justify-content-center" id="product-list">
                                @include('client.product_list', ['products' => $products])


                                @if ($products->hasMorePages())
                                <div id="load-more-wrapper" class="text-center mt-3">
                                    <button id="load-more"
                                        class="btn btn-sm rounded-3" style="background-color: #485444;color: white;"
                                        data-next-page="{{ $products->nextPageUrl() ?? '' }}"
                                        @if(!$products->hasMorePages()) disabled @endif>
                                        {{ $products->hasMorePages() ? 'Lihat Lebih Banyak' : 'Semua produk sudah dimuat' }}
                                    </button>
                                </div>

                                @endif

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!--New Product End-->

        <x-footer-client></x-footer-client>

    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("product-list");
            const loadMoreBtn = document.getElementById("load-more");
            const wrapper = document.getElementById("load-more-wrapper");

            if (!loadMoreBtn) return;

            loadMoreBtn.addEventListener("click", function() {
                const url = loadMoreBtn.dataset.nextPage;
                if (!url) {
                    loadMoreBtn.innerText = "Semua produk sudah dimuat";
                    loadMoreBtn.disabled = true;
                    showNoMoreProductsMessage();
                    return;
                }

                loadMoreBtn.innerText = "Memuat...";

                fetch(url, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        const tempDiv = document.createElement("div");
                        tempDiv.innerHTML = html;

                        const newProducts = tempDiv.querySelectorAll(".col-lg-4, .col-sm-6");
                        newProducts.forEach(p => container.appendChild(p));

                        container.parentNode.appendChild(wrapper);

                        const paginationUrl = new URL(url);
                        const currentPage = parseInt(paginationUrl.searchParams.get("page"));
                        const nextUrl = url.replace(`page=${currentPage}`, `page=${currentPage + 1}`);

                        fetch(nextUrl, {
                                headers: {
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            })
                            .then(res => {
                                if (res.status === 404 || res.redirected) {
                                    loadMoreBtn.innerText = "Semua produk sudah dimuat";
                                    loadMoreBtn.disabled = true;
                                    showNoMoreProductsMessage();
                                } else {
                                    loadMoreBtn.dataset.nextPage = nextUrl;
                                    loadMoreBtn.innerText = "Lihat Lebih Banyak";
                                }
                            });
                    })
                    .catch(() => {
                        loadMoreBtn.innerText = "Gagal memuat data";
                    });
            });

            function showNoMoreProductsMessage() {
                let info = document.getElementById("no-more-products");
                if (!info) {
                    info = document.createElement("p");
                    info.id = "no-more-products";
                    info.className = "text-muted mt-2";
                    info.innerHTML = "✅ Semua produk sudah dimuat.";
                    wrapper.appendChild(info);
                }
            }
        });
    </script>

    <!-- @if (session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
    </script>
    @endif

    @if (session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('error') }}',
        showConfirmButton: true
    });
    </script>
    @endif -->

    <!-- countdown discount -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCountdowns() {
                document.querySelectorAll('[data-countdown]').forEach(el => {
                    const end = new Date(el.dataset.countdown);
                    const now = new Date();
                    const diff = end - now;

                    if (diff <= 0) {
                        el.innerHTML = `<div class="single-count"><span class="count text-danger">0</span><p>Days</p></div>
                                <div class="single-count"><span class="count text-danger">0</span><p>Hour</p></div>
                                <div class="single-count"><span class="count text-danger">0</span><p>Mint</p></div>
                                <div class="single-count"><span class="count text-danger">0</span><p>Sec</p></div>`;
                        return;
                    }

                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                    const seconds = Math.floor((diff / 1000) % 60);

                    el.innerHTML = `
                <div class="single-count"><span class="count">${days}</span><p>Days</p></div>
                <div class="single-count"><span class="count">${hours}</span><p>Hour</p></div>
                <div class="single-count"><span class="count">${minutes}</span><p>Mint</p></div>
                <div class="single-count"><span class="count">${seconds}</span><p>Sec</p></div>
            `;
                });
            }

            updateCountdowns();
            setInterval(updateCountdowns, 1000);
        });
    </script>



    @endpush



</x-layout-client>