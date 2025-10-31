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
            @if($product->discount && $product->discount->persentase > 0)
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
                    @if($product->discount && $product->discount->persentase > 0)
                        @php
                            $discountPrice = $product->harga - ($product->harga * $product->discount->persentase / 100);
                        @endphp
                        <span class="current-price">Rp{{ number_format($discountPrice, 0, ',', '.') }}</span>
                        <span class="old-price text-decoration-line-through">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                    @else
                        <span class="current-price">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                    @endif
                 @else
                  @if($product->discount && $product->discount->persentase > 0)
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
