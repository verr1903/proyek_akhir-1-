<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">

        <x-header-client></x-header-client>

        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/assets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>

        <!-- Halaman Pilih Alamat -->
        <div class="shop-single-page section-padding-4 mb-5 desktop-view">
            <div class="container mb-5">

                <!-- Notifikasi Info -->
                <div class="alert alert-warning text-center fw-semibold py-2 mb-4" style="background-color: #f39e1fff; color: #fff;">
                    <i class="fa fa-info-circle me-2"></i>Untuk Saat Ini Pengantaran Hanya Melayani Daerah Sekitaran Pekanbaru
                </div>

                <!-- Header dan Tombol Tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <h4 class="fw-bold mb-2 mb-md-0">Pilih Alamat</h4>
                    <a href="#" class="btn btn-success rounded-3 d-flex align-items-center">
                        <i class="fa fa-plus-circle me-2"></i> Tambah Alamat Baru
                    </a>
                </div>

                <!-- Daftar Alamat -->
                <div class="card mb-3 border rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <strong>Budi</strong>
                            <span class="text-muted"> (+62) 895-35435-54354</span><br>
                            <span class="small text-secondary">Jalan Tegal Sari Ujung, Villamas Permai Blok C No 20, Kelurahan Sri Meranti, Kecamatan Rumbai.</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-soft-success active rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-soft-warning rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button class="btn btn-soft-danger rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>

                    </div>
                </div>

                <div class="card mb-3 border rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <strong>Andi</strong>
                            <span class="text-muted"> (+62) 895-35435-43354</span><br>
                            <span class="small text-secondary">Jalan Indra Puri Perm Puri Sejahtera Blok A No 23, Kelurahan Rejo Sari, Kecamatan Tenayan Raya.</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-soft-success rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-soft-warning rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button class="btn btn-soft-danger rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 border rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <strong>Gilang</strong>
                            <span class="text-muted"> (+62) 895-35435-54354</span><br>
                            <span class="small text-secondary">Jalan Umban Sari Perm Meranti Blok B No 31, Kelurahan Sri Meranti, Kecamatan Rumbai.</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-soft-success rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-soft-warning rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button class="btn btn-soft-danger rounded-4 pb-5 shadow-sm px-3">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <x-footer-client></x-footer-client>

    </div>
</x-layout-client>