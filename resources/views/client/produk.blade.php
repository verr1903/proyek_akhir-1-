<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">

        <x-header-client></x-header-client>

        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/clientAssets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>

        <!-- Desktop View -->
        <div class="shop-single-page section-padding-4 mb-5 desktop-view">
            <div class="container mb-5">

                <!--Shop Top Bar Start-->
                <div class="shop-top-bar d-sm-flex align-items-center justify-content-between">

                    <div class="top-bar-sorter">

                    </div>
                    <div class="top-bar-page-amount">
                        <p>
                            Showing {{ $products->firstItem() }} - {{ $products->lastItem() }}
                            of {{ $products->total() }} results
                        </p>

                    </div>
                </div>
                <!--Shop Top Bar End-->


                <div class="row" id="product-list">
                    @include('client.product_list', ['products' => $products])
                </div>

                @if ($products->hasMorePages())
                <div class="text-center mt-3" id="load-more-wrapper">
                    <button id="load-more"
                        class="btn btn-primary"
                        data-next-page="{{ $products->nextPageUrl() }}">
                        Lihat Lebih Banyak
                    </button>
                </div>
                @endif


            </div>
        </div>
        <!-- end Desktop View -->

        <!-- mobile view -->
        <div class="mobile-view p-3">

            <!-- Header & Sort -->
            <div class="d-flex justify-content-between align-items-center mb-3 mt-3">

                <select class="form-select form-select-sm w-100">
                    <option selected>Sort by</option>
                    <option>Featured</option>
                    <option>Best Selling</option>
                    <option>A-Z</option>
                </select>
            </div>

            <!-- Info -->
            <p class="text-muted small mb-3 text-center">Menampilkan 1 - 6 dari 10 produk</p>

            <!-- Product List -->
            <div class="row g-3">

                <!-- Single Product -->
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Duplicate for more products -->
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Tambahkan produk lainnya dengan pola yang sama -->

            </div>

            <!-- Pagination -->
            <div class="page-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link prev" href="#">Prev</a></li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link next" href="#">Next</a></li>
                </ul>
            </div>

        </div>
        <!-- end mobile view -->


        <x-footer-client></x-footer-client>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function updateCountdowns() {
                document.querySelectorAll('[data-countdown]').forEach(el => {
                    const end = new Date(el.dataset.countdown);
                    const now = new Date();
                    const diff = end - now;

                    if (diff <= 0) {
                        el.innerHTML = `
                    <div class="single-count"><span class="count text-danger">0</span><p>Days</p></div>
                    <div class="single-count"><span class="count text-danger">0</span><p>Hour</p></div>
                    <div class="single-count"><span class="count text-danger">0</span><p>Mint</p></div>
                    <div class="single-count"><span class="count text-danger">0</span><p>Sec</p></div>
                `;
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