<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="main-wrapper">

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Banner -->
        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/assets/images/logo/logoo.jpg" alt="Banner Logo"
                    style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>

        <!-- Register Section -->
        <div class="register-page p-5 desktop-view">
            <div class="container">

                <div class="card shadow-lg border-0 rounded-3 p-5 text-center"
                    style="max-width: 850px; margin: 0 auto;">
                    <h3 class="fw-bold mb-4" style="color:#445244;font-size: 35px;">Register</h3>

                    <!-- Avatar -->
                    <div class="mb-3">
                        <div class="position-relative d-inline-block">
                            <img src="/assets/images/profile/default.png" alt="Avatar"
                                class="rounded-circle border"
                                style="width:100px; height:100px; object-fit:cover;">
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn rounded-4 btn-sm btn-outline-secondary">
                                Ganti Avatar
                            </button>
                        </div>
                    </div>

                    <!-- Form -->
                    <form action="#" method="POST" class="text-start">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Username: *</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email: *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Password: *</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Konfirmasi Password: *</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Tombol Register -->
                        <div class="mt-4 d-flex justify-content-center align-items-center gap-3 flex-wrap">
                            <button type="submit" class="btn rounded-4 btn-success px-4">Register</button>
                            <span class="fw-semibold text-muted">Or</span>
                            <a href="#" class="btn rounded-4 d-flex align-items-center px-3 google-btn"
                                style="background-color:#e6ebe7; border:1px solid #445244; color:#445244; transition:all 0.3s ease;">
                                <img src="https://developers.google.com/identity/images/g-logo.png"
                                    style="width:20px; height:20px; margin-right:8px; transition:transform 0.3s ease;">
                                Sign In With Google
                            </a>

                        </div>


                        <!-- Link ke Login -->
                        <div class="mt-4 text-center">
                            <p class="mb-1 text-muted">Sudah Memiliki Akun?</p>
                            <a href="{{ route('login') }}" class="btn rounded-4 btn-outline-dark btn-sm px-4">
                                Login Disini
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="register-page mobile-view p-3" style="background-color:#f8f9fa; ">
            <div class="">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h4 class="fw-bold mb-3 text-center" style="color:#445244;">Register</h4>

                    <!-- Avatar -->
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

                    <!-- Form -->
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Username:</label>
                            <input type="text" class="form-control rounded-3" name="username" placeholder="Masukkan username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Email:</label>
                            <input type="email" class="form-control rounded-3" name="email" placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Password:</label>
                            <input type="password" class="form-control rounded-3" name="password" placeholder="Masukkan password" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Konfirmasi Password:</label>
                            <input type="password" class="form-control rounded-3" name="password_confirmation" placeholder="Ulangi password" required>
                        </div>

                        <!-- Tombol Register -->
                        <button type="submit" class="btn btn-success w-100 rounded-4 fw-semibold mb-3">Register</button>

                        <div class="text-center fw-semibold text-muted mb-2">Or</div>

                        <a href="#" class="btn w-100 rounded-4 d-flex justify-content-center align-items-center google-btn py-4"
                            style="background-color:#e6ebe7; border:1px solid #445244; color:#445244; transition:all 0.3s ease;">
                            <img src="https://developers.google.com/identity/images/g-logo.png"
                                style="width:20px; height:20px; margin-right:8px; transition:transform 0.3s ease;">
                            Sign In With Google
                        </a>

                        <!-- Link ke Login -->
                        <div class="text-center mt-4">
                            <p class="small text-muted mb-1">Sudah memiliki akun?</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm rounded-4 px-4 fw-semibold">
                                Login Disini
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Back To Top -->
        <a href="#" class="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>

    </div>
    <style>
        /* Responsif hanya untuk halaman login */
        @media (max-width: 991px) {
            body {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
        }
    </style>
</x-layout-client>