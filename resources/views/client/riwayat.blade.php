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

                <!-- Loop Semua Pesanan -->
                @forelse ($orders as $order)
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                    <div class="card-body p-3">

                        <!-- Header Pesanan -->
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                            <div class="text-muted small">
                                <span class="me-3">Tanggal:
                                    <strong>{{ $order->created_at->format('d M Y') }}</strong>
                                </span>
                                <span>No. Pesanan: <strong>{{ $order->no_pesanan }}</strong></span>
                            </div>

                            @php
                            $statusClass = match($order->status) {
                            'diproses' => 'bg-warning text-dark',
                            'diantar' => 'bg-primary',
                            'menunggu pembayaran' => 'bg-secondary',
                            'selesai' => 'bg-success',
                            default => 'bg-light text-dark'
                            };
                            @endphp

                            <span class="badge {{ $statusClass }} px-4 py-3 rounded-pill fs-6 text-uppercase">
                                PESANAN {{ strtoupper($order->status) }}
                            </span>
                        </div>

                        <!-- Isi Pesanan -->
                        <div class="d-flex align-items-start justify-content-between flex-wrap">
                            <div class="d-flex align-items-start flex-grow-1">
                                @php
                                $firstItem = $order->items->first();
                                $totalItem = $order->items->count();
                                @endphp

                                <img src="{{ asset('storage/' . $firstItem->product->gambar) }}"
                                    alt="Produk"
                                    class="rounded border me-3"
                                    style="width: 100px; height: 120px; object-fit: cover;">

                                <div>
                                    <h6 class="fw-bold mb-1">{{ strtoupper($firstItem->product->nama) }}</h6>
                                    <p class="text-muted mb-1 small">Size: {{ $firstItem->size }}</p>

                                    @php
                                    $harga = $firstItem->harga_saat_ini;
                                    $product = $firstItem->product;

                                    if ($product->discount) {
                                    $hargaDiskon = $product->harga - ($product->harga * $product->discount->persentase / 100);
                                    } else {
                                    $hargaDiskon = $product->harga;
                                    }
                                    @endphp

                                    <p class="text-dark mb-1 small">
                                        @if ($product->discount)
                                        <span class="text-danger fw-bold">
                                            Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                                        </span><br>
                                        <span class="text-muted text-decoration-line-through small">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                        </span>
                                        @else
                                        Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                                        @endif
                                    </p>

                                    <p class="text-muted mb-0 small">Jumlah Produk: {{ $firstItem->quantity }}</p>
                                    @if ($totalItem > 1)
                                    <p class="text-muted mb-0 small">+{{ $totalItem - 1 }} Produk Lainnya</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Total & Tombol -->
                            <div class="text-end mt-3 me-2 mt-md-0">
                                <p class="fw-semibold mb-1 text-secondary small" style="font-size: 15px;">
                                    Total Belanja
                                </p>
                                <h5 class="fw-bold text-dark mb-3 text-danger" style="font-size: 20px;">
                                    Rp. {{ number_format($order->total_harga, 0, ',', '.') }}
                                </h5>

                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-dark btn-sm rounded-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailTransaksiModal-{{ $order->id }}">
                                        <i class="fa fa-file-text me-1"></i> Lihat Detail Transaksi Lainnya
                                    </button>

                                    @if ($order->status === 'selesai')
                                    @php
                                    $sudahUlas = $firstItem->product->ulasan->isNotEmpty();
                                    @endphp

                                    @if ($sudahUlas)
                                    <button class="btn btn-secondary btn-sm rounded-3 fw-semibold disabled btnSudahUlasan"
                                        data-id="{{ $firstItem->product->id }}">
                                        <i class="fa fa-check me-1"></i> Sudah Diulas
                                    </button>
                                    @else
                                    <button class="btn btn-warning btn-sm rounded-3 fw-semibold btnUlasan"
                                        data-bs-toggle="modal"
                                        data-id="{{ $firstItem->product->id }}"
                                        data-bs-target="#ulasanModal">
                                        <i class="fa fa-star me-1"></i> Berikan Ulasan
                                    </button>
                                    @endif
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Modal Detail Pesanan -->
                <div class="modal fade" id="detailTransaksiModal-{{ $order->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h5 class="fw-bold text-dark mb-0">Detail Transaksi</h5>
                                <button type="button" class="btn btn-link text-danger fs-4 p-0 m-0" data-bs-dismiss="modal">
                                    <i class="fa fa-times-circle"></i>
                                </button>
                            </div>

                            <!-- Detail Produk -->
                            @foreach ($order->items as $item)

                            @php
                            $product = $item->product; // ambil produk sesuai item
                            @endphp


                            <div class="d-flex align-items-start mb-2">
                                <img src="{{ asset('storage/' . $product->gambar) }}"
                                    class="rounded me-2 border"
                                    style="width:60px;height:70px;object-fit:cover;">
                                <div>
                                    <p class="fw-semibold mb-1 small">{{ $product->nama }}</p>
                                    <p class="text-muted mb-1 small">Size: {{ $item->size }}</p>
                                    <p class="text-dark small">
                                        @if ($item->diskon_presentase != 0.00)
                                        <span class="text-danger fw-bold">
                                            {{ $item->quantity }} x Rp. {{ number_format($item->harga_setelah_diskon, 0, ',', '.') }}
                                        </span><br>
                                        <span class="text-muted text-decoration-line-through small">
                                            {{ $item->quantity }} x Rp. {{ number_format($item->harga_awal, 0, ',', '.') }}
                                        </span>
                                        @else
                                        {{ $item->quantity }} x Rp. {{ number_format($item->harga_awal, 0, ',', '.') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <hr class="my-2">
                            @endforeach

                            @php
                            $ongkir = $order->address ? app('\App\Http\Controllers\Client\KeranjangClientController')
                            ->calculateShippingCost($order->address->kecamatan) : 0;
                            $totalProduk = $order->total_harga - $ongkir;
                            @endphp

                            <div class="d-flex justify-content-between mt-2">
                                <span class="fw-semibold small text-secondary">Metode Pembayaran:</span>
                                <span class="fw-bold">{{ strtoupper($order->metode_pembayaran) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <span class="fw-semibold small text-secondary">Total Produk:</span>
                                <span class="fw-bold">Rp. {{ number_format($totalProduk, 0, ',', '.') }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <span class="fw-semibold small text-secondary">Ongkos Kirim:</span>
                                <span class="fw-bold">Rp. {{ number_format($ongkir, 0, ',', '.') }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <span class="fw-semibold small text-secondary">Total Belanja:</span>
                                <span class="fw-bold text-danger">Rp. {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                            </div>

                            @if ($order->bukti_pengiriman)
                            <hr class="my-3">

                            <div class="border rounded-3 p-3">
                                <h6 class="fw-bold text-dark mb-2">
                                    <i class="fa fa-truck me-2 text-primary"></i> Bukti Pengiriman
                                </h6>
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $order->bukti_pengiriman) }}"
                                    alt="Bukti Pengiriman"
                                    class="img-fluid rounded shadow-sm"
                                    style="max-height: 200px; object-fit: contain; cursor: pointer;"
                                    onclick="lihatBukti('{{ asset('storage/' . $order->bukti_pengiriman) }}')">
                                    </div>
                            </div>
                            @endif
                            @if (!$order->bukti_pengiriman)
                            <div class="alert alert-secondary small mt-3">
                                <i class="fa fa-info-circle me-1"></i>
                                Bukti pengiriman belum tersedia.
                            </div>
                            @endif


                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center text-muted my-5">
                    <i class="fa fa-box-open fa-3x mb-3"></i>
                    <p>Belum ada pesanan.</p>
                </div>
                @endforelse

            </div>



        </div>
        <!-- End Desktop View -->

        <!-- Mobile View -->
        <div class="mobile-view p-2">

            @forelse ($orders as $order)

            @php
                $firstItem = $order->items->first();
                $totalItem = $order->items->count();

                $statusClass = match($order->status) {
                    'diproses' => 'bg-warning text-dark',
                    'diantar' => 'bg-primary',
                    'menunggu pembayaran' => 'bg-secondary',
                    'selesai' => 'bg-success',
                    default => 'bg-light text-dark'
                };

                $sudahUlas = $order->items->contains(fn($item) =>
                    $item->product->ulasan->where('id_users', auth()->id())->isNotEmpty()
                );
            @endphp

            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body p-3">

                    <!-- Header -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">
                                {{ $order->created_at->format('d M Y') }}
                            </span>
                            <span class="badge {{ $statusClass }} rounded-pill px-3 py-2 small">
                                PESANAN {{ strtoupper($order->status) }}
                            </span>
                        </div>
                        <p class="text-muted small mb-0">
                            No. Pesanan: <strong>{{ $order->no_pesanan }}</strong>
                        </p>
                    </div>

                    <!-- Isi -->
                    <div class="d-flex gap-3 mb-3">
                        <img src="{{ asset('storage/' . $firstItem->product->gambar) }}"
                            class="rounded border"
                            style="width: 80px; height: 100px; object-fit: cover;">

                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1 small">
                                {{ strtoupper($firstItem->product->nama) }}
                            </h6>
                            <p class="text-muted small mb-1">
                                Size: {{ $firstItem->size }}
                            </p>
                            <p class="text-muted small mb-0">
                                Jumlah: {{ $firstItem->quantity }}
                                @if ($totalItem > 1)
                                    • +{{ $totalItem - 1 }} Produk Lainnya
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Total & Tombol -->
                    <div class="border-top pt-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold text-secondary small">Total Belanja</span>
                            <span class="fw-bold text-danger small">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-dark btn-sm rounded-3"
                                data-bs-toggle="modal"
                                data-bs-target="#detailTransaksiModalM-{{ $order->id }}">
                                <i class="fa fa-file-text me-1"></i> Lihat Detail Transaksi Lainnya
                            </button>

                            @if ($order->status === 'selesai')
                                @if ($sudahUlas)
                                    <button class="btn btn-secondary btn-sm rounded-3 fw-semibold btnSudahUlasan">
                                        <i class="fa fa-check me-1"></i> Sudah Diulas
                                    </button>
                                @else
                                    <button class="btn btn-warning btn-sm rounded-3 fw-semibold btnUlasan"
                                        data-id="{{ $firstItem->product->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#ulasanModal">
                                        <i class="fa fa-star me-1"></i> Berikan Ulasan
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal Detail Pesanan -->
                <div class="modal fade" id="detailTransaksiModalM-{{ $order->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h5 class="fw-bold text-dark mb-0">Detail Transaksi</h5>
                                <button type="button" class="btn btn-link text-danger fs-4 p-0 m-0" data-bs-dismiss="modal">
                                    <i class="fa fa-times-circle"></i>
                                </button>
                            </div>

                            <!-- Detail Produk -->
                            @foreach ($order->items as $item)

                            @php
                            $product = $item->product; // ambil produk sesuai item
                            @endphp


                            <div class="d-flex align-items-start mb-2">
                                <img src="{{ asset('storage/' . $product->gambar) }}"
                                    class="rounded me-2 border"
                                    style="width:60px;height:70px;object-fit:cover;">
                                <div>
                                    <p class="fw-semibold mb-1 small">{{ $product->nama }}</p>
                                    <p class="text-muted mb-1 small">Size: {{ $item->size }}</p>
                                    <p class="text-dark small">
                                        @if ($item->diskon_presentase != 0.00)
                                        <span class="text-danger fw-bold">
                                            {{ $item->quantity }} x Rp. {{ number_format($item->harga_setelah_diskon, 0, ',', '.') }}
                                        </span><br>
                                        <span class="text-muted text-decoration-line-through small">
                                            {{ $item->quantity }} x Rp. {{ number_format($item->harga_awal, 0, ',', '.') }}
                                        </span>
                                        @else
                                        {{ $item->quantity }} x Rp. {{ number_format($item->harga_awal, 0, ',', '.') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <hr class="my-2">
                            @endforeach

                            @php
                            $ongkir = $order->address ? app('\App\Http\Controllers\Client\KeranjangClientController')
                            ->calculateShippingCost($order->address->kecamatan) : 0;
                            $totalProduk = $order->total_harga - $ongkir;
                            @endphp

                            <div class="d-flex justify-content-between mt-2">
                                <span class="fw-semibold small text-secondary">Metode Pembayaran:</span>
                                <span class="fw-bold">{{ strtoupper($order->metode_pembayaran) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <span class="fw-semibold small text-secondary">Total Produk:</span>
                                <span class="fw-bold">Rp. {{ number_format($totalProduk, 0, ',', '.') }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <span class="fw-semibold small text-secondary">Ongkos Kirim:</span>
                                <span class="fw-bold">Rp. {{ number_format($ongkir, 0, ',', '.') }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <span class="fw-semibold small text-secondary">Total Belanja:</span>
                                <span class="fw-bold text-danger">Rp. {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                            </div>

                            @if ($order->bukti_pengiriman)
                            <hr class="my-3">

                            <div class="border rounded-3 p-3">
                                <h6 class="fw-bold text-dark mb-2">
                                    <i class="fa fa-truck me-2 text-primary"></i> Bukti Pengiriman
                                </h6>
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $order->bukti_pengiriman) }}"
                                    alt="Bukti Pengiriman"
                                    class="img-fluid rounded shadow-sm"
                                    style="max-height: 200px; object-fit: contain; cursor: pointer;"
                                    onclick="lihatBukti('{{ asset('storage/' . $order->bukti_pengiriman) }}')">
                                    </div>
                            </div>
                            @endif
                            @if (!$order->bukti_pengiriman)
                            <div class="alert alert-secondary small mt-3">
                                <i class="fa fa-info-circle me-1"></i>
                                Bukti pengiriman belum tersedia.
                            </div>
                            @endif


                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted my-5">
                    <i class="fa fa-box-open fa-3x mb-3"></i>
                    <p>Belum ada pesanan.</p>
                </div>
            @endforelse

        </div>
        <!-- End Mobile View -->
         
        <!-- Modal ulasan -->
        <div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="fa fa-star text-warning me-2"></i> Berikan Ulasanmu
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="idProductReview">
                        <!-- Rating -->
                        <div class="text-center mb-4">
                            <h6 class="text-secondary mb-2">Beri Rating Produk Ini:</h6>
                            <div class="star-rating" id="ratingStars">
                                <!-- 10 span = 5 bintang (bisa setengah) -->
                                <span class="star" data-value="1"></span>
                                <span class="star" data-value="2"></span>
                                <span class="star" data-value="3"></span>
                                <span class="star" data-value="4"></span>
                                <span class="star" data-value="5"></span>
                            </div>
                            <div class="text-muted mt-2" id="ratingValue">0 / 5</div>
                        </div>

                        <!-- Textarea Ulasan -->
                        <div class="mb-3">
                            <label for="ulasanText" class="form-label fw-semibold">Tulis Ulasan Kamu:</label>
                            <textarea id="ulasanText"
                                class="form-control rounded-3 shadow-sm"
                                rows="4"
                                style="padding-bottom: 200px; resize: none; overflow: hidden;"
                                placeholder="Ceritakan pengalamanmu menggunakan produk ini..."></textarea>

                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-warning text-dark fw-semibold rounded-3" id="submitUlasanBtn">
                            <i class="fa fa-paper-plane me-1"></i> Kirim Ulasan
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <x-footer-client></x-footer-client>

    </div>

    @push('scripts')


    <!-- js rating untuk mobile -->
    <script>
        // Auto resize textarea
        function mobileAutoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        // Rating logic
        const mobileStars = document.querySelectorAll('#mobileRatingStars .mobile-star');
        const mobileRatingValue = document.getElementById('mobileRatingValue');
        let mobileCurrentRating = 0;

        mobileStars.forEach(star => {
            star.addEventListener('mousemove', () => {
                resetMobileHover();
                const val = parseFloat(star.dataset.value);
                highlightMobileStars(val);
            });

            star.addEventListener('mouseleave', resetMobileHover);

            star.addEventListener('click', () => {
                mobileCurrentRating = parseFloat(star.dataset.value);
                highlightMobileStars(mobileCurrentRating);
                mobileRatingValue.textContent = `${mobileCurrentRating} / 5`;
            });
        });

        function highlightMobileStars(value) {
            mobileStars.forEach(s => {
                const val = parseFloat(s.dataset.value);
                s.classList.toggle('active', val <= value);
            });
        }

        function resetMobileHover() {
            highlightMobileStars(mobileCurrentRating);
        }
    </script>

    <!-- rating untuk dekstop -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stars = document.querySelectorAll('.star');
            const ratingValue = document.getElementById('ratingValue');
            let rating = 0;

            // tangkap id product dari tombol
            document.querySelectorAll('.btnUlasan').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.getElementById('idProductReview').value = btn.dataset.id;
                });
            });

            stars.forEach(star => {
                star.addEventListener('mouseover', () => {
                    resetStars();
                    highlightStars(star.dataset.value);
                });

                star.addEventListener('mouseout', () => {
                    resetStars();
                    highlightStars(rating);
                });

                star.addEventListener('click', () => {
                    rating = parseFloat(star.dataset.value);
                    ratingValue.textContent = rating + ' / 5';
                    resetStars();
                    highlightStars(rating);
                });
            });

            function highlightStars(value) {
                stars.forEach(s => {
                    const val = parseFloat(s.dataset.value);
                    s.classList.toggle('active', val <= value);
                });
            }

            function resetStars() {
                stars.forEach(s => s.classList.remove('active'));
            }

            document.getElementById('submitUlasanBtn').addEventListener('click', () => {
                const komentar = document.getElementById('ulasanText').value.trim();
                const idProduct = document.getElementById('idProductReview').value;

                if (!rating || !komentar) {
                    Swal.fire('Oops!', 'Isi rating dan ulasan terlebih dahulu.', 'warning');
                    return;
                }



                fetch("{{ route('ulasan.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id_product: idProduct,
                            bintang: rating,
                            komentar: komentar
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Berhasil!', data.message, 'success');
                            const modal = bootstrap.Modal.getInstance(document.getElementById('ulasanModal'));
                            modal.hide();
                            resetStars();
                            ratingValue.textContent = '0 / 5';
                            document.getElementById('ulasanText').value = '';
                        } else {
                            Swal.fire('Gagal!', data.message || 'Terjadi kesalahan.', 'error');
                        }
                    })
                    .catch(() => Swal.fire('Error!', 'Gagal mengirim ulasan.', 'error'));
            });
        });
    </script>

    <!-- Konfirmasi tombol ulasan jika sudah pernah ngulas -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Jika user klik tombol "Sudah Diulas"
            document.querySelectorAll('.btnSudahUlasan').forEach(btn => {
                btn.addEventListener('click', () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Sudah Memberikan Ulasan',
                        text: 'Kamu sudah memberikan ulasan untuk produk ini.',
                        confirmButtonText: 'Oke'
                    });
                });
            });
        });
    </script>

    <!-- zoom bukti pengiriman -->
     <script>
function lihatBukti(url) {
    Swal.fire({

            imageUrl: url,
        
            imageWidth: '100%',
            didOpen: () => {
                const img = document.querySelector('.swal2-image');
                if (img) {
                    img.style.marginTop = '30px';
                    img.style.padding = '20px';
                }
            }
        });
}
</script>

    @endpush
</x-layout-client>