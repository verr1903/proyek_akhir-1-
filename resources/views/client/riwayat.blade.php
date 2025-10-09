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
                                <p class="fw-semibold mb-1 text-secondary small"  style="font-size: 15px;">Total Belanja</p>
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
                                <p class="fw-semibold mb-1 text-secondary small"  style="font-size: 15px;">Total Belanja</p>
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
            <!-- Notifikasi Info -->
            <div class="alert alert-warning text-center fw-semibold py-2 mb-3 rounded-3"
                style="background-color: #f39e1f; color: #fff;">
                <i class="fa fa-info-circle me-2"></i>
                Untuk Saat Ini Pengantaran Hanya Melayani Daerah Sekitaran Pekanbaru
            </div>

            <!-- Header & Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <h5 class="fw-bold mb-2">Pilih Alamat</h5>
                <a href="#" class="btn btn-success btn-sm rounded-3 d-flex align-items-center px-3 py-2">
                    <i class="fa fa-plus-circle me-2"></i> Tambah
                </a>
            </div>

            <!-- Daftar Alamat -->
            <div class="address-list-mobile">

                <!-- Card 1 -->
                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body p-3">
                        <div class="d-flex flex-column">
                            <div class="mb-2">
                                <strong class="d-block">Budi</strong>
                                <small class="text-muted d-block mb-1">(+62) 895-35435-54354</small>
                                <span class="small text-secondary d-block">
                                    Jalan Tegal Sari Ujung, Villamas Permai Blok C No 20, Kelurahan Sri Meranti, Kecamatan Rumbai.
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <button class="btn btn-soft-success active rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-check me-1"></i>
                                </button>
                                <button class="btn btn-soft-warning rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-pen me-1"></i>
                                </button>
                                <button class="btn btn-soft-danger rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-trash me-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body p-3">
                        <div class="d-flex flex-column">
                            <div class="mb-2">
                                <strong class="d-block">Andi</strong>
                                <small class="text-muted d-block mb-1">(+62) 895-35435-43354</small>
                                <span class="small text-secondary d-block">
                                    Jalan Indra Puri Perm Puri Sejahtera Blok A No 23, Kelurahan Rejo Sari, Kecamatan Tenayan Raya.
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <button class="btn btn-soft-success rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-check me-1"></i>
                                </button>
                                <button class="btn btn-soft-warning rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-pen me-1"></i>
                                </button>
                                <button class="btn btn-soft-danger rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-trash me-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body p-3">
                        <div class="d-flex flex-column">
                            <div class="mb-2">
                                <strong class="d-block">Gilang</strong>
                                <small class="text-muted d-block mb-1">(+62) 895-35435-54354</small>
                                <span class="small text-secondary d-block">
                                    Jalan Umban Sari Perm Meranti Blok B No 31, Kelurahan Sri Meranti, Kecamatan Rumbai.
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <button class="btn btn-soft-success rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-check me-1"></i>
                                </button>
                                <button class="btn btn-soft-warning rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-pen me-1"></i>
                                </button>
                                <button class="btn btn-soft-danger rounded-3 flex-fill mx-1 pb-3 fw-semibold">
                                    <i class="fa fa-trash me-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End address list -->

        </div>


        <x-footer-client></x-footer-client>

    </div>
</x-layout-client>