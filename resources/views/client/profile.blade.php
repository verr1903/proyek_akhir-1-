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

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-white border-0 pb-0">
                        <h4 class="fw-bold text-center text-dark mb-3">Kelola Profil</h4>
                    </div>

                    <div class="card-body">
                        <!-- Avatar Upload -->
                        <div class="text-center mb-4">
                            <img id="avatar-preview"
                                src="/assets/images/profile/default.png"
                                alt="Avatar"
                                class="rounded-circle border shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;">
                            <div class="mt-2">
                                <label for="avatar-upload" class="btn btn-outline-success btn-sm rounded-pill">
                                    <i class="fa fa-camera me-1"></i> Ganti Foto
                                </label>
                                <input type="file" id="avatar-upload" class="d-none" accept="image/*">
                            </div>
                        </div>

                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control" value="verry_adrian">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" value="verry@example.com">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password Lama</label>
                                <input type="password" class="form-control" placeholder="Masukkan Passowrd Lama">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan password baru">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan konfirmasi password baru">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <button type="button" class="btn btn-outline-secondary rounded-3 px-4">
                                    <i class="fa fa-arrow-left me-1"></i> Kembali
                                </button>
                                <button type="submit" class="btn btn-success rounded-3 px-4">
                                    <i class="fa fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- end Desktop View -->

        <!-- mobile view -->
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

            </div> 
        </div>
        <!-- end mobile view -->


        <x-footer-client></x-footer-client>
    </div>

    <script>
        // Pratinjau avatar setelah diupload
        document.getElementById('avatar-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('avatar-preview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layout-client>