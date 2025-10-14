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
        <div class="register-page p-5">
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
                            <a href="login.html" class="btn rounded-4 btn-outline-dark btn-sm px-4">
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
</x-layout-client>