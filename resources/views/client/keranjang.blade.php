<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">




        <x-header-client></x-header-client>

        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/assets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>


        <!--Shop Single Start-->
        <div class="shop-single-page section-padding-4 mb-5 desktop-view">
            <div class="container">

                <div class="card rounded-3  shadow-sm mb-4">
                    <div class="table-responsive rounded-3">
                        <table class="table table-bordered align-middle text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Checkout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-4"><img src="/assets/images/product/image1.png" alt="Produk" class="img-thumbnail" style="width:70px; height:80px; object-fit:cover;"></td>
                                    <td class="py-4 text-start">
                                        <strong>Tshirt Oversize Series “WHOA”</strong><br>
                                        <small class="text-muted">Kode: TS-01</small>
                                    </td>
                                    <td class="py-4">Rp 80.000,00</td>
                                    <td class="py-4 text-center" style="font-size: 20px; font-weight: 400;">
                                        <select class="form-select no-arrow form-select-sm w-auto d-inline-block text-center" style="font-size: 18px;">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L" selected>L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </td>
                                    <td class="py-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm btn-minus">-</button>
                                            <input type="text" class="form-control form-control-sm text-center mx-1 qty-input" style="width:50px;" value="2" readonly>
                                            <button class="btn btn-outline-secondary btn-sm btn-plus">+</button>
                                        </div>
                                    </td>



                                    <td class="py-4">Rp 20.000,00</td>
                                    <td class="py-4 text-center">
                                        <button class="btn btn-soft-success rounded-4 me-2 pb-5 px-3 shadow-sm toggle-check">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-soft-danger rounded-4 shadow-sm pb-5 px-3">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-4"><img src="/assets/images/product/image1.png" alt="Produk" class="img-thumbnail" style="width:70px; height:80px; object-fit:cover;"></td>
                                    <td class="py-4 text-start">
                                        <strong>Tshirt Oversize Series “WHOA”</strong><br>
                                        <small class="text-muted">Kode: TS-01</small>
                                    </td>
                                    <td class="py-4">Rp 80.000,00</td>
                                    <td class="py-4 text-center" style="font-size: 20px; font-weight: 400;">
                                        <select class="form-select no-arrow form-select-sm w-auto d-inline-block text-center" style="font-size: 18px;">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L" selected>L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </td>
                                    <td class="py-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm btn-minus">-</button>
                                            <input type="text" class="form-control form-control-sm text-center mx-1 qty-input" style="width:50px;" value="2" readonly>
                                            <button class="btn btn-outline-secondary btn-sm btn-plus">+</button>
                                        </div>
                                    </td>



                                    <td class="py-4">Rp 20.000,00</td>
                                    <td class="py-4 text-center">
                                        <button class="btn btn-soft-success rounded-4 me-2 pb-5 px-3 shadow-sm toggle-check">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-soft-danger rounded-4 shadow-sm pb-5 px-3">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mb-4 rounded-3">
                    <a href="{{ route('lokasi')}}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-map-marker-alt fa-lg text-danger me-2 mt-1"></i>
                                <div>
                                    <strong>Budi</strong> <span class="text-muted">( +62 8590850174 )</span><br>
                                    Jalan Tegal Sari Ujung, Villamas Permai Blok C No 24, Kelurahan Sri Meranti, Kecamatan Rumbai.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="row g-3 ">
                    <!-- Rincian Pembayaran -->
                    <div class="col-md-6">
                        <div class="card h-100 rounded-3">
                            <div class="card-body">
                                <h5 class="card-title">Rincian Pembayaran</h5>
                                <p class="d-flex justify-content-between mb-1">
                                    <span>Subtotal Produk</span> <span>Rp 20.000,00</span>
                                </p>
                                <p class="d-flex justify-content-between mb-1">
                                    <span>Subtotal Pengiriman</span> <span>Rp 5.000,00</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between fw-bold mb-0">
                                    <span>Total Pembayaran</span> <span>Rp 25.000,00</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian kanan (metode + tombol aksi) -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <!-- Metode Pembayaran -->
                            <div class="col-md-8">
                                <div class="card rounded-3" style="min-height: 110px;">
                                    <div class="card-body">
                                        <h5 class="card-title pb-1" style="font-weight: 200;">Pilih Metode Pembayaran</h5>
                                        <p class="ps-2">&gt; Virtual Account (BCA)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="col-md-4">
                                <div class="d-flex flex-column gap-2 h-100 justify-content-between">
                                    <div>
                                        <button class="btn rounded-3  btn-soft-danger w-100 mb-2 pb-5">Bersihkan</button>
                                        <button class="btn rounded-3 btn-soft-success w-100 pb-5">Pilih Semua</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Buat Pesanan -->
                            <div class="col-12 mt-4">
                                <button class="btn rounded-3 btn-soft-success btn-lg w-100 pb-5">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <!--Shop Single End-->


        <div class="mobile-view p-2">
            <div class="card mb-3 rounded-4 shadow-sm">
                <a href="{{ route('lokasi')}}" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <i class="fa fa-map-marker-alt fa-lg text-danger me-2 mt-1"></i>
                            <div>
                                <strong>Budi</strong> <span class="text-muted">( +62 8590850174 )</span><br>
                                Jalan Tegal Sari Ujung, Villamas Permai Blok C No 24, Kelurahan Sri Meranti .......
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 rounded-4 shadow-sm">
                <div class="d-flex align-items-start p-2">
                    <!-- Checkbox -->
                    <input type="checkbox" class="form-check-input fci me-2 mt-2 p-2">

                    <!-- Gambar Produk -->
                    <img src="/assets/images/product/image1.png" class="rounded-3 me-3"
                        style="width: 80px; height: 120px; object-fit: cover;">

                    <!-- Detail Produk -->
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Tshirt Oversize Series “WHOA”</h6>
                        <p class="text-muted small mb-2">Kode: TS-01</p>

                        <!-- Ukuran + Jumlah sejajar -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select form-select-sm"
                                    style="font-size: 15px; padding: 2px 30px 2px 10px; height: 40px; width: auto;">
                                    <option>S</option>
                                    <option>M</option>
                                    <option selected>L</option>
                                    <option>XL</option>
                                </select>

                                <div class="d-flex align-items-center ms-auto">
                                    <button class="btn btn-outline-secondary btn-sm btn-minus px-2">-</button>
                                    <input type="text" class="form-control form-control-sm text-center mx-1 qty-input"
                                        style="width: 40px;" value="2" readonly>
                                    <button class="btn btn-outline-secondary btn-sm btn-plus px-2">+</button>
                                </div>
                            </div>

                            <!-- Harga -->
                            <span class="fw-bold text-danger mt-3" style="font-size: 17px;">Rp80.000</span>
                        </div>
                    </div>



                    <!-- Tombol Hapus -->
                    <button class="btn btn-soft-danger btn-sm ms-2 px-3 d-flex align-items-center justify-content-center rounded-4">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

            </div>

            <div class="card mb-3 rounded-4 shadow-sm">
                <div class="d-flex align-items-start p-2">
                    <!-- Checkbox -->
                    <input type="checkbox" class="form-check-input fci me-2 mt-2 p-2">

                    <!-- Gambar Produk -->
                    <img src="/assets/images/product/image1.png" class="rounded-3 me-3"
                        style="width: 80px; height: 120px; object-fit: cover;">

                    <!-- Detail Produk -->
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Tshirt Oversize Series “WHOA”</h6>
                        <p class="text-muted small mb-2">Kode: TS-01</p>

                        <!-- Ukuran + Jumlah sejajar -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select form-select-sm"
                                    style="font-size: 15px; padding: 2px 30px 2px 10px; height: 40px; width: auto;">
                                    <option>S</option>
                                    <option>M</option>
                                    <option selected>L</option>
                                    <option>XL</option>
                                </select>

                                <div class="d-flex align-items-center ms-auto">
                                    <button class="btn btn-outline-secondary btn-sm btn-minus px-2">-</button>
                                    <input type="text" class="form-control form-control-sm text-center mx-1 qty-input"
                                        style="width: 40px;" value="2" readonly>
                                    <button class="btn btn-outline-secondary btn-sm btn-plus px-2">+</button>
                                </div>
                            </div>

                            <!-- Harga -->
                            <span class="fw-bold text-danger mt-3" style="font-size: 17px;">Rp80.000</span>
                        </div>
                    </div>

                    <!-- Tombol Hapus -->
                    <button class="btn btn-soft-danger btn-sm ms-2 px-3 d-flex align-items-center justify-content-center rounded-4">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

            </div>

            <div class="card mb-3 rounded-4 shadow-sm border-0">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-semibold text-dark">Pilih Metode Pembayaran</h6>
                        <i class="fa fa-chevron-down text-secondary"></i>
                    </div>
                    <small class="text-muted d-block mt-1 ms-2">Virtual Account (BCA)</small>
                </div>
            </div>

            <div class="card shadow-sm border-0 rounded-4 mb-3">
                <div class="card-body p-3">
                    <h6 class="fw-semibold mb-3 text-dark">Rincian Pembayaran</h6>

                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Subtotal Produk</span>
                        <span class="fw-medium text-dark">Rp 20.000,00</span>
                    </div>

                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Subtotal Pengiriman</span>
                        <span class="fw-medium text-dark">Rp 5.000,00</span>
                    </div>

                    <hr class="my-3">

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-dark">Total Pembayaran</span>
                        <span class="fw-bold text-danger fs-6">Rp 25.000,00</span>
                    </div>
                </div>
            </div>



            <!-- Footer Checkout (Sticky di bawah layar) -->
            <!-- Footer Checkout -->
            <div class="checkout-footer fixed-bottom bg-white border-top shadow-sm">
                <!-- Baris Pilih Semua -->
                <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="selectAll" class="form-check-input me-2 fci p-2" style="width:18px; height:18px;">
                        <label for="selectAll" class="mb-0 small text-muted mt-1">Pilih Semua</label>
                    </div>
                    <button class="btn btn-outline-danger btn-sm rounded-3 mt-1">
                        Hapus
                    </button>
                </div>

                <!-- Baris Total + Tombol -->
                <div class="d-flex align-items-center justify-content-between px-3 py-3">
                    <div>
                        <div class="fw-semibold small mb-1">Total <span class="fw-bold text-danger fs-6 mb-0">Rp49.703</span></div>
                    </div>
                    <button class="btn btn-soft-success rounded-3 px-4 pb-4 fw-semibold">
                        Buat Pesanan
                    </button>
                </div>
            </div>


        </div>





        <x-footer-client></x-footer-client>


    </div>

    <script>
        // ambil semua tombol tambah & kurang pada jumlah produk
        document.querySelectorAll('.btn-plus').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value) || 0;
                input.value = value + 1;
            });
        });

        document.querySelectorAll('.btn-minus').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value) || 0;
                if (value > 1) input.value = value - 1; // minimal 1
            });
        });
    </script>
    <script>
        // Toggle aktif/nonaktif pada tombol checkout
        document.querySelectorAll(".toggle-check").forEach(btn => {
            btn.addEventListener("click", () => {
                btn.classList.toggle("active"); // aktifkan/ nonaktifkan
            });
        });
    </script>


</x-layout-client>