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

            <div class="card border-0 shadow-sm rounded-4 mb-5">
                <div class="card-body p-3">

                    <!-- Judul -->
                    <h5 class="fw-bold text-center text-dark mb-3">Kelola Profil</h5>

                    <!-- Foto Profil -->
                    <div class="text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <img id="avatar-preview-mobile"
                                src="/assets/images/profile/default.png"
                                alt="Avatar"
                                class="rounded-circle border shadow-sm"
                                style="width: 100px; height: 100px; object-fit: cover;">
                            <label for="avatar-upload-mobile"
                                class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle p-2"
                                style="cursor: pointer; transform: translate(25%, 25%);">
                                <i class="fa fa-camera"></i>
                            </label>
                            <input type="file" id="avatar-upload-mobile" class="d-none" accept="image/*">
                        </div>
                        <p class="small text-muted mt-2 mb-0">Ketuk ikon kamera untuk ganti foto</p>
                    </div>

                    <!-- Form Profil -->
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary mb-1">Username</label>
                            <input type="text" class="form-control rounded-3" value="verry_adrian">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary mb-1">Email</label>
                            <input type="email" class="form-control rounded-3" value="verry@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary mb-1">Password Lama</label>
                            <input type="password" class="form-control rounded-3" placeholder="Masukkan password lama">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary mb-1">Password Baru</label>
                            <input type="password" class="form-control rounded-3" placeholder="Masukkan password baru">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-semibold text-secondary mb-1">Konfirmasi Password</label>
                            <input type="password" class="form-control rounded-3" placeholder="Masukkan konfirmasi password">
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success rounded-3 pb-3 fw-semibold">
                                <i class="fa fa-save me-1"></i> Simpan Perubahan
                            </button>
                            <button type="button" class="btn btn-outline-secondary rounded-3 py-2 fw-semibold">
                                <i class="fa fa-arrow-left me-1"></i> Kembali
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- end mobile view -->

        <script>
            // Preview avatar untuk mobile
            document.getElementById('avatar-upload-mobile').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('avatar-preview-mobile').src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>



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