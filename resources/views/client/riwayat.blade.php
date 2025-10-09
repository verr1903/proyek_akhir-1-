<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">

        <x-header-client></x-header-client>

        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/assets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>

        <!-- Desktop View -->
        <div class="shop-single-page section-padding-4 mb-5 desktop-view">
            <div class="container mb-5">

                <!-- Filter & Pencarian -->
                <div class="filter-section mb-4">
                    <!-- Baris Pencarian & Tanggal -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                        <!-- Kolom Pencarian -->
                        <div class="input-group flex-grow-1" style="max-width: 400px;">
                            <input type="text" class="form-control rounded-3 border-start-0" placeholder="Cari Pesananmu Disini">
                        </div>

                        <!-- Kolom Tanggal -->
                        <div class="flex-shrink-0" style="width: 220px;">
                            <input type="date" class="form-control rounded-3">
                        </div>
                    </div>

                    <!-- Baris Status -->
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="fw-semibold text-secondary">Status:</span>
                        <div class="d-flex flex-wrap gap-1">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn rounded-3 px-3 pb-2 btn-sm btn-outline-custom active">Semua</button>
                                <button class="btn rounded-3 px-3 pb-2 btn-sm btn-outline-custom">Diproses</button>
                                <button class="btn rounded-3 px-3 pb-2 btn-sm btn-outline-custom">Dikirim</button>
                                <button class="btn rounded-3 px-3 pb-2 btn-sm btn-outline-custom">Selesai</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Kartu Pesanan -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                    <div class="card-body p-3">

                        <!-- Header Pesanan -->
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                            <div class="text-muted small">
                                <span class="me-3">Tanggal: <strong>18 April 2025</strong></span>
                                <span>No. Pesanan: <strong>MX-COD-250418-001</strong></span>
                            </div>
                            <span class="badge bg-success px-4 py-3 rounded-pill fs-6">PESANAN SELESAI</span>
                        </div>

                        <!-- Isi Pesanan -->
                        <div class="d-flex align-items-start justify-content-between flex-wrap">
                            <!-- Gambar dan Info Produk -->
                            <div class="d-flex align-items-start flex-grow-1">
                                <img src="/assets/images/product/image.png"
                                    alt="Produk"
                                    class="rounded border me-3"
                                    style="width: 100px; height: 120px; object-fit: cover;">

                                <div>
                                    <h6 class="fw-bold mb-1">TSHIRT OVERSIZE SERIES 'WHON'</h6>
                                    <p class="text-muted mb-1 small">Size: L</p>
                                    <p class="text-dark mb-1 small">Rp. 81.000,00</p>
                                    <p class="text-muted mb-0 small">Jumlah Produk: 2</p>
                                    <p class="text-muted mb-0 small">+1 Produk Lainnya</p>
                                </div>
                            </div>

                            <!-- Total & Tombol -->
                            <div class="text-end mt-3 me-2 mt-md-0">
                                <p class="fw-semibold mb-1 text-secondary small" style="font-size: 15px;">Total Belanja</p>
                                <h5 class="fw-bold text-dark mb-3 text-danger" style="font-size: 20px;">Rp. 210.000,00</h5>

                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-dark btn-sm rounded-3">
                                        <i class="fa fa-file-text me-1"></i> Lihat Detail Transaksi
                                    </button>
                                    <button class="btn btn-warning btn-sm rounded-3 fw-semibold">
                                        <i class="fa fa-star me-1"></i> Berikan Ulasan
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Kartu Pesanan -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                    <div class="card-body p-3">

                        <!-- Header Pesanan -->
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                            <div class="text-muted small">
                                <span class="me-3">Tanggal: <strong>18 April 2025</strong></span>
                                <span>No. Pesanan: <strong>MX-COD-250418-001</strong></span>
                            </div>
                            <span class="badge bg-warning text-dark px-4 py-3 rounded-pill fs-6">PESANAN DIPROSES</span>

                        </div>

                        <!-- Isi Pesanan -->
                        <div class="d-flex align-items-start justify-content-between flex-wrap">
                            <!-- Gambar dan Info Produk -->
                            <div class="d-flex align-items-start flex-grow-1">
                                <img src="/assets/images/product/image.png"
                                    alt="Produk"
                                    class="rounded border me-3"
                                    style="width: 100px; height: 120px; object-fit: cover;">

                                <div>
                                    <h6 class="fw-bold mb-1">TSHIRT OVERSIZE SERIES 'WHON'</h6>
                                    <p class="text-muted mb-1 small">Size: L</p>
                                    <p class="text-dark mb-1 small">Rp. 81.000,00</p>
                                    <p class="text-muted mb-0 small">Jumlah Produk: 2</p>
                                    <p class="text-muted mb-0 small">+1 Produk Lainnya</p>
                                </div>
                            </div>

                            <!-- Total & Tombol -->
                            <div class="text-end mt-3 me-2 mt-md-0">
                                <p class="fw-semibold mb-1 text-secondary small" style="font-size: 15px;">Total Belanja</p>
                                <h5 class="fw-bold text-dark mb-3 text-danger" style="font-size: 20px;">Rp. 210.000,00</h5>

                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-dark btn-sm rounded-3">
                                        <i class="fa fa-file-text me-1"></i> Lihat Detail Transaksi
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- End Desktop View -->

        <!-- Mobile View -->
        <div class="mobile-view p-2">

            <!-- Filter & Pencarian -->
            <div class="filter-section mb-3">
                <!-- Pencarian -->
                <div class="mb-3 mt-2">
                    <div class="input-group rounded-3 shadow-sm">
                        <label class="form-label fw-semibold small text-secondary mb-1">
                            Cari Riwayat Pesanan:
                        </label>
                        <input type="text" class="form-control border-start-0" placeholder="Cari di sini">
                    </div>
                </div>

                <!-- Filter Tanggal -->
                <div class="mb-3">
                    <label class="form-label fw-semibold small text-secondary mb-1">
                        Filter berdasarkan tanggal:
                    </label>
                    <input type="date" class="form-control rounded-3 shadow-sm">
                </div>


                <!-- Filter Status -->
                <div class="d-md-none mt-3">
                    <label for="statusSelect" class="form-label fw-semibold text-secondary">Status:</label>
                    <select id="statusSelect" class="form-select rounded-3 shadow-sm border-custom">
                        <option value="semua" selected>Semua</option>
                        <option value="diproses">Diproses</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

            </div>

            <!-- Pesanan 1 -->
            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body p-3">
                    <!-- Header -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">18 April 2025</span>
                            <span class="badge bg-success rounded-pill px-3 py-2 small">PESANAN SELESAI</span>
                        </div>
                        <p class="text-muted small mb-0">No. Pesanan: <strong>MX-COD-250418-001</strong></p>
                    </div>

                    <!-- Isi -->
                    <div class="d-flex gap-3 mb-3">
                        <img src="/assets/images/product/image.png" alt="Produk"
                            class="rounded border" style="width: 80px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1 small">TSHIRT OVERSIZE SERIES 'WHON'</h6>
                            <p class="text-muted small mb-1">Size: L</p>
                            <p class="text-dark small mb-1">Rp. 81.000,00</p>
                            <p class="text-muted small mb-0">Jumlah: 2 • +1 Produk Lainnya</p>
                        </div>
                    </div>

                    <!-- Total & Tombol -->
                    <div class="border-top pt-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold text-secondary small">Total Belanja</span>
                            <span class="fw-bold text-danger small">Rp. 210.000,00</span>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-dark btn-sm rounded-3">
                                <i class="fa fa-file-text me-1"></i> Lihat Detail Transaksi
                            </button>
                            <button class="btn btn-warning btn-sm rounded-3 fw-semibold">
                                <i class="fa fa-star me-1"></i> Berikan Ulasan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesanan 2 -->
            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body p-3">
                    <!-- Header -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">18 April 2025</span>
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 small">PESANAN DIPROSES</span>
                        </div>
                        <p class="text-muted small mb-0">No. Pesanan: <strong>MX-COD-250418-001</strong></p>
                    </div>

                    <!-- Isi -->
                    <div class="d-flex gap-3 mb-3">
                        <img src="/assets/images/product/image.png" alt="Produk"
                            class="rounded border" style="width: 80px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1 small">TSHIRT OVERSIZE SERIES 'WHON'</h6>
                            <p class="text-muted small mb-1">Size: L</p>
                            <p class="text-dark small mb-1">Rp. 81.000,00</p>
                            <p class="text-muted small mb-0">Jumlah: 2 • +1 Produk Lainnya</p>
                        </div>
                    </div>

                    <!-- Total & Tombol -->
                    <div class="border-top pt-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold text-secondary small">Total Belanja</span>
                            <span class="fw-bold text-danger small">Rp. 210.000,00</span>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-dark btn-sm rounded-3">
                                <i class="fa fa-file-text me-1"></i> Lihat Detail Transaksi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Mobile View -->


        <x-footer-client></x-footer-client>

    </div>
</x-layout-client>