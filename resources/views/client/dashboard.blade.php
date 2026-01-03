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

                        <ul class="nav nav-pills d-flex flex-row justify-content-center flex-nowrap me-5" id="productTabs" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="text-dark nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab1" type="button" role="tab">
                                    New
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="text-dark nav-link" id="tab2-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab2" type="button" role="tab">
                                    Recommended
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="text-dark nav-link" id="tab3-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab3" type="button" role="tab">
                                    Trending
                                </button>
                            </li>

                        </ul>

                        <!-- Filter & Sort -->
                        <div class="d-flex gap-2">
                            <!-- Sort By -->
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle rounded-3" style="background-color: #485444;color: white;" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Urutkan
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item sort-option" data-sort="asc" href="#">Harga: Termurah → Termahal</a></li>
                                    <li><a class="dropdown-item sort-option" data-sort="desc" href="#">Harga: Termahal → Termurah</a></li>
                                </ul>

                            </div>



                        </div>

                        <div class="tab-content product-items-tab">

                            {{-- TAB 1: NEW --}}
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                <div class="row justify-content-center"
                                    id="product-container-new"
                                    data-next-page="{{ $newProducts->nextPageUrl() }}">
                                    @include('client.product_list', ['products' => $newProducts])
                                </div>
                            </div>

                            {{-- TAB 2: RECOMMENDED --}}
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <div class="row justify-content-center"
                                    id="product-container-rec"
                                    data-next-page="{{ $recommendedProducts->nextPageUrl() }}">
                                    @include('client.product_list', ['products' => $recommendedProducts])
                                </div>
                            </div>

                            {{-- TAB 3: TRENDING --}}
                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                <div class="row justify-content-center"
                                    id="product-container-trend"
                                    data-next-page="{{ $trendingProducts->nextPageUrl() }}">
                                    @include('client.product_list', ['products' => $trendingProducts])
                                </div>
                            </div>

                        </div>
                        <div id="product-container-sort" class="row justify-content-center d-none"></div>

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

            let currentTab = "new";
            let currentSort = null;

            // Ambil nextPage dari tab default
            let nextPageUrl = document.getElementById("product-container-new").dataset.nextPage || null;

            let loading = false;

            const containerMap = {
                "new": document.getElementById("product-container-new"),
                "rec": document.getElementById("product-container-rec"),
                "trend": document.getElementById("product-container-trend"),
            };

            // ------ TAB CHANGE -------
            document.querySelectorAll("[data-bs-toggle='tab']").forEach(btn => {
                btn.addEventListener("shown.bs.tab", function() {

                   // -------- RESET SORT MODE ----------
                    currentSort = null;            // tidak dalam mode sorting lagi
                    currentTab = this.dataset.bsTarget
                        .replace("#tab", "")
                        .replace("1", "new")
                        .replace("2", "rec")
                        .replace("3", "trend");

                    // Reset next page untuk tab baru
                    nextPageUrl = containerMap[currentTab].dataset.nextPage || null;

                    // Sembunyikan container sorting
                    const sortContainer = document.getElementById("product-container-sort");
                    sortContainer.classList.add("d-none");
                    sortContainer.innerHTML = "";  // hapus data lama
                });
            });

            // ------- SORTING -------
            document.querySelectorAll(".sort-option").forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault();

                    currentSort = this.dataset.sort;

                    fetchSortedProducts();
                });
            });

            function fetchSortedProducts() {
                const baseUrl = window.location.pathname;

                // --- 1. Nonaktifkan semua tab ---
                document.querySelectorAll(".nav-link").forEach(tab => {
                    tab.classList.remove("active");
                });

                // --- 2. Sembunyikan semua tab-pane ---
                document.querySelectorAll(".tab-pane").forEach(pane => {
                    pane.classList.remove("show", "active");
                });

                // --- 3. Tampilkan container sorting ---
                const sortContainer = document.getElementById("product-container-sort");
                sortContainer.classList.remove("d-none");
                sortContainer.innerHTML = `<p class='text-center'>Loading...</p>`;

                // URL request
                const url = `${baseUrl}?sort=${currentSort}`;

                fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })
                    .then(res => res.json())
                    .then(data => {

                        sortContainer.innerHTML = "";

                        const temp = document.createElement("div");
                        temp.innerHTML = data.html;

                        let targetContainer;

                        if (currentTab === null) {
                            targetContainer = document.getElementById("product-container-sort");
                        } else {
                            targetContainer = containerMap[currentTab];
                        }

                        temp.querySelectorAll(".col-lg-4, .col-sm-6")
                            .forEach(p => targetContainer.appendChild(p));


                        nextPageUrl = data.next_page;
                        sortContainer.dataset.nextPage = nextPageUrl;

                        // Matikan tab mode → sekarang infinite scroll hanya ambil sorting
                        currentTab = null;
                    })
                    .catch(err => console.error(err));
            }


            // ------- INFINITE SCROLL -------
            window.addEventListener("scroll", function() {
                if (loading) return;
                if (!nextPageUrl) return;

                const footer = document.querySelector(".footer-area");
                if (footer.getBoundingClientRect().top < window.innerHeight + 150) {
                    loadMore();
                }
            });
            

            function getCurrentPageNumber(url) {
                const match = url.match(/page=(\d+)/);
                return match ? match[1] : 1;
            }

            function loadMore() {
                if (!nextPageUrl) return;

                loading = true;

                let url = nextPageUrl;

                if (currentTab !== null) {
                    url += "&" + currentTab + "_page=" + getCurrentPageNumber(nextPageUrl);
                    url += "&tab=" + currentTab;
                }

                if (currentSort !== null) {
                    url += (url.includes("?") ? "&" : "?") + "sort=" + currentSort;
                }

                fetch(url, {
                    headers: { "X-Requested-With": "XMLHttpRequest" }
                })
                    .then(res => res.json())
                    .then(data => {
                        const temp = document.createElement("div");
                        temp.innerHTML = data.html;

                        // TARGET CONTAINER
                        let targetContainer = currentTab === null 
                            ? document.getElementById("product-container-sort") 
                            : containerMap[currentTab];

                        temp.querySelectorAll(".col-lg-4, .col-sm-6")
                            .forEach(p => targetContainer.appendChild(p));

                        nextPageUrl = data.next_page || null;
                        targetContainer.dataset.nextPage = nextPageUrl;
                    })
                    .catch(err => console.error(err))
                    .finally(() => loading = false);
            }


        });
    </script>



    <script>
        const container = document.querySelector("#tab1 .row");
    </script>

    <!-- countdown discount -->
    <script>
document.addEventListener('DOMContentLoaded', function () {

    function updateCountdowns() {
        document.querySelectorAll('[data-countdown]').forEach(el => {

            const end = new Date(el.dataset.countdown);
            const now = new Date();
            let diff = end - now;

            // 🔴 JIKA WAKTU HABIS
            if (diff <= 0) {
                el.innerHTML = `
                    <div class="single-count"><span class="count">0</span><p>Days</p></div>
                    <div class="single-count"><span class="count">0</span><p>Hour</p></div>
                    <div class="single-count"><span class="count">0</span><p>Mint</p></div>
                    <div class="single-count"><span class="count">0</span><p>Sec</p></div>
                `;
                return; // ⛔ STOP hitung
            }

            // 🟢 NORMAL HITUNG
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