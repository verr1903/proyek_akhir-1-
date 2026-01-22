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


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="grid" role="tabpanel">
                        <div class="row">
                            @forelse($products as $product)
                            @php
                            // hitung total stok dulu sebelum dipakai
                            $totalStok = ($product->stok_s ?? 0)
                            + ($product->stok_m ?? 0)
                            + ($product->stok_l ?? 0)
                            + ($product->stok_xl ?? 0);
                            @endphp

                            <div class="col-lg-4 col-sm-6 mb-2">
                                <div class="single-product">
                                    <div class="product-image position-relative">
                                        @if($totalStok > 0)
                                        <a href="{{ route('detail', $product->encrypted_id) }}">
                                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
                                        </a>
                                        @else
                                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" style="opacity: 0.70; cursor: not-allowed;">
                                        @endif

                                        {{-- Jika stok habis --}}
                                        @if($totalStok <= 0)
                                            <span class="sticker-new soldout-title">Soldout</span>
                                            @endif

                                            {{-- Jika ada diskon --}}
                                            @if($product->discount)
                                            <span class="sticker-new label-sale">-{{ $product->discount->persentase }}%</span>
                                            @endif

                                            <div class="action-links">
                                                <ul>
                                                    @if($totalStok > 0)
                                                    <li class="mt-3 me-3">

                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>

                                            {{-- Countdown (contoh jika ada event promo dengan tanggal akhir) --}}
                                            @if($product->discount && $product->discount->status === 'aktif')
                                            <div class="product-countdown mt-2">
                                                <div data-countdown="{{ $product->discount->end_at->format('Y-m-d H:i:s') }}">
                                                    <div class="single-count"><span class="count">0</span><p>Days</p></div>
                                                    <div class="single-count"><span class="count">0</span><p>Hour</p></div>
                                                    <div class="single-count"><span class="count">0</span><p>Mint</p></div>
                                                    <div class="single-count"><span class="count">0</span><p>Sec</p></div>
                                                </div>
                                            </div>
                                            @endif


                                    </div>

                                    <div class="product-content text-center">
                                        <div class="rating">
                                            <div class="rating-on" style="width: {{ $product->rating_percent }}%;"></div>
                                        </div>

                                        <h4 class="product-name">
                                            @if($totalStok > 0)
                                            <a href="{{ route('detail', $product->encrypted_id) }}">
                                                {{ $product->nama }}
                                            </a>
                                            @else
                                            <span style="opacity: 0.6; cursor: not-allowed;">{{ $product->nama }}</span>
                                            @endif
                                        </h4>

                                        <div class="price-box">
                                            @if($totalStok > 0)
                                            @if($product->discount)
                                            @php
                                            $discountPrice = $product->harga - ($product->harga * $product->discount->persentase / 100);
                                            @endphp
                                            <span class="current-price">Rp{{ number_format($discountPrice, 0, ',', '.') }}</span>
                                            <span class="old-price text-decoration-line-through">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                                            @else
                                            <span class="current-price">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                                            @endif
                                            @else
                                            @if($product->discount)
                                            @php
                                            $discountPrice = $product->harga - ($product->harga * $product->discount->persentase / 100);
                                            @endphp
                                            <span style="opacity: 0.6; cursor: not-allowed;" class="current-price">Rp{{ number_format($discountPrice, 0, ',', '.') }}</span>
                                            <span style="opacity: 0.6; cursor: not-allowed;" class="old-price text-decoration-line-through">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                                            @else
                                            <span style="opacity: 0.6; cursor: not-allowed;" class="current-price">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                                            @endif
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

                </div>


                <!--Pagination Start-->
                <div class="page-pagination mt-4">
                    <ul class="pagination justify-content-center">

                        {{-- Prev --}}
                        @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link prev">Prev</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link prev" href="{{ $products->previousPageUrl() }}">Prev</a>
                        </li>
                        @endif

                        {{-- Nomor halaman --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item">
                            <a class="page-link {{ $page == $products->currentPage() ? 'active' : '' }}" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                        @endforeach

                        {{-- Next --}}
                        @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link next" href="{{ $products->nextPageUrl() }}">Next</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link next">Next</span>
                        </li>
                        @endif

                    </ul>
                </div>

                <!--Pagination End-->


            </div>
        </div>
        <!-- end Desktop View -->



        
        <!-- mobile view -->
        <div class="mobile-view p-3">

            <!-- Header & Sort -->
            

            <!-- Info -->
            <p class="text-muted small mb-3 text-center">
                Menampilkan {{ $productm->firstItem() }} - {{ $productm->lastItem() }}
                dari {{ $productm->total() }} produk
            </p>

            <!-- Product List -->
            <div class="row g-3">

                @forelse($productm as $product)
                    @php
                        $totalStok = ($product->stok_s ?? 0)
                            + ($product->stok_m ?? 0)
                            + ($product->stok_l ?? 0)
                            + ($product->stok_xl ?? 0);

                        $hasDiscount = $product->discount && $product->discount->status === 'aktif';
                        $discountPrice = $hasDiscount
                            ? $product->harga - ($product->harga * $product->discount->persentase / 100)
                            : $product->harga;
                    @endphp

                    <div class="col-6">
                        @if($totalStok > 0)
                            <a href="{{ route('detail', $product->encrypted_id) }}" class="text-decoration-none text-dark">
                        @else
                            <div class="text-decoration-none text-dark" style="cursor:not-allowed;">
                        @endif

                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative">

                                {{-- Badge --}}
                                @if($totalStok <= 0)
                                    <span class="badge bg-dark position-absolute top-0 start-0 m-2">Sold Out</span>
                                @elseif($hasDiscount)
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                        -{{ $product->discount->persentase }}%
                                    </span>
                                @endif

                                {{-- Image --}}
                                <img
                                    src="{{ asset('storage/' . $product->gambar) }}"
                                    class="card-img-top product-img"
                                    alt="{{ $product->nama }}"
                                    style="{{ $totalStok <= 0 ? 'opacity:0.6;' : '' }}"
                                >

                                {{-- Content --}}
                                <div class="card-body text-center p-2">
                                    <h6 class="fw-semibold text-truncate mb-1">
                                        {{ $product->nama }}
                                    </h6>

                                    <div class="text-muted small mb-2">
                                        @if($hasDiscount)
                                            <span class="fw-bold text-danger">
                                                Rp{{ number_format($discountPrice, 0, ',', '.') }}
                                            </span>
                                            <span class="text-decoration-line-through ms-1">
                                                Rp{{ number_format($product->harga, 0, ',', '.') }}
                                            </span>
                                        @else
                                            <span class="fw-bold">
                                                Rp{{ number_format($product->harga, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @if($totalStok > 0)
                            </a>
                        @else
                            </div>
                        @endif
                    </div>

                @empty
                    <div class="text-center py-5">
                        <h6 class="text-muted">Belum ada produk tersedia.</h6>
                    </div>
                @endforelse

            </div>


            <!-- Pagination -->
            <div class="page-pagination mt-3">
                <ul class="pagination justify-content-center">

                    {{-- Prev --}}
                    @if ($productm->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link prev">Prev</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link prev" href="{{ $productm->previousPageUrl() }}">Prev</a>
                        </li>
                    @endif

                    {{-- Pages --}}
                    @foreach ($productm->getUrlRange(1, $productm->lastPage()) as $page => $url)
                        <li class="page-item">
                            <a class="page-link {{ $page == $productm->currentPage() ? 'active' : '' }}" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach

                    {{-- Next --}}
                    @if ($productm->hasMorePages())
                        <li class="page-item">
                            <a class="page-link next" href="{{ $productm->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link next">Next</span>
                        </li>
                    @endif

                </ul>
            </div>


        </div>
        <!-- end mobile view -->


        <x-footer-client></x-footer-client>
    </div>
@push('styles')
<style>
  /* ===== FIX MOBILE IMAGE OVERLAP ===== */
@media (max-width: 576px) {

    .mobile-view .card {
        height: auto;
        overflow: hidden;
    }

    .mobile-view .card-img-top,
    .mobile-view .product-img {
        width: 100%;
        height: 140px; /* kunci tinggi */
        object-fit: cover;
        display: block;
        position: relative; /* PENTING */
    }

    .mobile-view .card-body {
        padding: 6px !important;
    }

    .mobile-view h6 {
        font-size: 13px;
        line-height: 1.2;
        margin-bottom: 4px;
    }

    .mobile-view .text-muted {
        font-size: 12px;
    }

     .mobile-view h6 {
        font-size: 13px;
        line-height: 1.2;
        margin-bottom: 4px;

        /* INI KUNCINYA */
        white-space: normal !important;
        word-break: break-word;
        overflow-wrap: break-word;

        /* Batasi 2 baris */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
}

</style>
@endpush
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