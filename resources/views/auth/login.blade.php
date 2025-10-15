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


        <!-- DESKTOP VIEW -->
        <div class="login-page py-5 desktop-view" style="background-color:#f8f9fa; min-height:100vh;">
            <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
                <div class="card shadow-lg border-0 rounded-4 p-5 text-center" style="max-width: 600px; width:100%;">
                    <h3 class="fw-bold mb-4" style="color:#445244; font-size: 35px;">Login</h3>

                    <!-- Form -->
                    <form action="#" method="POST" class="text-start">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Email: *</label>
                            <input type="email" class="form-control form-control-lg rounded-3" name="email" placeholder="Masukkan email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password: *</label>
                            <input type="password" class="form-control form-control-lg rounded-3" name="password" placeholder="Masukkan password" required>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                <label class="form-check-label pt-1" for="rememberMe">Remember Me</label>
                            </div>
                            <a href="#" class="text-decoration-none fw-semibold" style="color:#445244;">Lupa Password?</a>
                        </div>

                        <!-- Tombol Login dan Google -->
                        <div class="mt-3 d-flex justify-content-center align-items-center gap-3 flex-wrap">
                            <button type="submit" class="btn btn-success rounded-4 px-4 fw-semibold shadow-sm" style="min-width:120px;">Login</button>
                            <span class="fw-semibold text-muted">Or</span>
                            <a href="#" class="btn rounded-4 d-flex align-items-center px-3 google-btn"
                                style="background-color:#e6ebe7; border:1px solid #445244; color:#445244; transition:all 0.3s ease;">
                                <img src="https://developers.google.com/identity/images/g-logo.png"
                                    style="width:20px; height:20px; margin-right:8px; transition:transform 0.3s ease;">
                                Sign In With Google
                            </a>
                        </div>

                        <!-- Link ke Register -->
                        <div class="mt-4 text-center">
                            <p class="mb-1 text-muted">Belum memiliki akun?</p>
                            <a href="{{ route('register') }}" class="btn rounded-4 btn-outline-dark btn-sm px-4 fw-semibold">
                                Daftar Disini
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MOBILE VIEW -->
        <div class="login-page mobile-view p-3" style="background-color:#f8f9fa;">
            <div class="">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h4 class="fw-bold mb-3 text-center" style="color:#445244;">Login</h4>

                    <form action="#" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Email:</label>
                            <input type="email" class="form-control rounded-3" name="email" placeholder="Masukkan email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Password:</label>
                            <input type="password" class="form-control rounded-3" name="password" placeholder="Masukkan password" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMeMobile" name="remember">
                                <label class="form-check-label small" for="rememberMeMobile">Remember Me</label>
                            </div>
                            <a href="#" class="small fw-semibold text-decoration-none" style="color:#445244;">Lupa Password?</a>
                        </div>

                        <button type="submit" class="btn btn-success w-100 rounded-4 fw-semibold mb-3">Login</button>

                        <div class="text-center fw-semibold text-muted mb-2">Or</div>

                        <a href="#" class="btn w-100 rounded-4 d-flex justify-content-center align-items-center google-btn py-4"
                            style="background-color:#e6ebe7; border:1px solid #445244; color:#445244; transition:all 0.3s ease;">
                            <img src="https://developers.google.com/identity/images/g-logo.png"
                                style="width:20px; height:20px; margin-right:8px; transition:transform 0.3s ease;">
                            Sign In With Google
                        </a>

                        <div class="text-center mt-4">
                            <p class="small text-muted mb-1">Belum memiliki akun?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-dark btn-sm rounded-4 px-4 fw-semibold">Daftar Disini</a>
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