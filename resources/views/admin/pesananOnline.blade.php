<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"></h5>
                    </div>

                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 text-center align-middle">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Total Pesanan</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="orderTable">
                                    <!-- Pesanan Diproses -->
                                    <tr data-status="diproses">
                                        <td>1</td>
                                        <td>MX-COD-250418-001</td>
                                        <td>3 Pcs</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-blue" data-bs-toggle="modal"
                                                data-bs-target="#stokDetailModal" title="Lihat Detail Stok">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                        <td class="status-cell">
                                            <span class="badge status-badge bg-info text-white">Diproses</span>
                                        </td>
                                        <td class="action-cell">
                                            <button class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1 fw-semibold shadow-sm btn-antar">
                                                <i class="zmdi zmdi-truck me-1"></i> Antar
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Pesanan Diantar -->
                                    <tr data-status="diantar">
                                        <td>2</td>
                                        <td>MX-COD-250418-002</td>
                                        <td>2 Pcs</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-blue" data-bs-toggle="modal"
                                                data-bs-target="#stokDetailModal" title="Lihat Detail Stok">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                        <td class="status-cell">
                                            <span class="badge status-badge bg-primary text-white">Diantar</span>
                                        </td>
                                        <td class="action-cell">
                                            <button class="btn btn-outline-success btn-sm rounded-pill px-3 py-1 fw-semibold shadow-sm btn-diterima">
                                                <i class="zmdi zmdi-check-circle me-1"></i> Diterima
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Pesanan Selesai -->
                                    <tr data-status="selesai">
                                        <td>3</td>
                                        <td>MX-COD-250418-003</td>
                                        <td>4 Pcs</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-blue" data-bs-toggle="modal"
                                                data-bs-target="#stokDetailModal" title="Lihat Detail Stok">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                        <td class="status-cell">
                                            <span class="badge status-badge bg-success text-white">Selesai</span>
                                        </td>
                                        <td class="action-cell">
                                            <span class="text-success fw-semibold">Pesanan Selesai</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <!-- Modal Detail Stok -->
                            <div class="modal fade" id="stokDetailModal" tabindex="-1" aria-labelledby="stokDetailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content rounded-4 shadow-lg border-0">
                                        <!-- Header -->
                                        <div class="modal-header bg-primary text-white rounded-top-4">
                                            <h5 class="modal-title fw-semibold" id="stokDetailModalLabel">
                                                Detail Pesanan
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body p-4">
                                            <!-- Informasi Pembeli -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary mb-3">
                                                    Informasi Pembeli
                                                </h6>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <p class="mb-1"><strong>Nama:</strong> John Doe</p>
                                                        <p class="mb-1"><strong>Email:</strong> johndoe@gmail.com</p>
                                                        <p class="mb-1"><strong>No. Telepon:</strong> +62 812 3456 7890</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1"><strong>Alamat Pengiriman:</strong></p>
                                                        <p class="small text-muted mb-0">Jl. Merdeka No. 123, Bandung, Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Produk Dipesan -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary mb-3">
                                                    Produk Dipesan
                                                </h6>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr class="text-center">
                                                                <th>Gambar</th>
                                                                <th>Nama Produk</th>
                                                                <th>Size</th>
                                                                <th>Jumlah</th>
                                                                <th>Harga</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <img src="/Adminassets/images/ecommerce/1.png" alt="Produk"
                                                                        class="img-thumbnail rounded-3" style="width: 60px;">
                                                                </td>
                                                                <td>List Monochrome</td>
                                                                <td class="text-center">M</td>
                                                                <td class="text-center">2</td>
                                                                <td>Rp80.000</td>
                                                                <td>Rp160.000</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <img src="/Adminassets/images/ecommerce/2.png" alt="Produk"
                                                                        class="img-thumbnail rounded-3" style="width: 60px;">
                                                                </td>
                                                                <td>Hoodie Hitam</td>
                                                                <td class="text-center">L</td>
                                                                <td class="text-center">1</td>
                                                                <td>Rp120.000</td>
                                                                <td>Rp120.000</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Total dan Status -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold text-primary mb-3">
                                                       </i>Status Pesanan
                                                    </h6>
                                                    <span class="badge status-badge bg-primary text-white">Diantar</span>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    <h6 class="fw-bold text-primary mb-2">Total Pembayaran</h6>
                                                    <h4 class="fw-bold text-success">Rp280.000</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
                                                <i class="zmdi zmdi-close me-1"></i> Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    @push('scripts')

    @endpush
</x-layout-admin>