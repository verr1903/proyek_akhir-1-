<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="main-wrapper">

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Banner -->
        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/clientAssets/images/logo/logoo.jpg" alt="Banner Logo"
                    style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>

        <!-- Register Section -->
        <div class="register-page p-5 desktop-view">
            <div class="container">

                <!-- Alert Success -->
                @if(session('success'))
                <div id="success-alert"
                    class="alert alert-success alert-dismissible fade show mx-auto"
                    role="alert"
                    style="max-width: 850px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Alert Error -->
                @if ($errors->any())
                <div id="error-alert"
                    class="alert alert-danger alert-dismissible fade show mx-auto"
                    role="alert"
                    style="max-width: 850px; margin-bottom: 20px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <div class="card shadow-lg border-0 rounded-3 p-5 text-center"
                    style="max-width: 850px; margin: 0 auto;">
                    <h3 class="fw-bold mb-5" style="color:#445244;font-size: 35px;">Register</h3>


                    <!-- Form -->
                    <form action="{{ route('register.store') }}" method="POST" class="text-start">
                        @csrf
                        <div class="row g-4 ">
                            <!-- Username -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Username: *</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ old('username') }}" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email: *</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Password: *</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <i class="fa fa-eye toggle-password"
                                        data-target="password"
                                        style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6c757d;"></i>
                                </div>
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Konfirmasi Password: *</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    <i class="fa fa-eye toggle-password"
                                        data-target="password_confirmation"
                                        style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6c757d;"></i>
                                </div>
                            </div>


                        </div>

                        <!-- Tombol Register -->
                        <div class="mt-4 d-flex justify-content-center align-items-center gap-3 flex-wrap">
                            <button type="submit" class="btn rounded-4 btn-success px-4">Register</button>
                            <span class="fw-semibold text-muted">Or</span>
                            <a href="{{ route('google.redirect') }}" class="btn rounded-4 d-flex align-items-center px-3 google-btn"
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
                @if(session('success'))
                <div id="success-alert"
                    class="alert alert-success alert-dismissible fade show mx-auto"
                    role="alert"
                    style="max-width: 850px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Alert Error -->
                @if ($errors->any())
                <div id="error-alert"
                    class="alert alert-danger alert-dismissible fade show mx-auto"
                    role="alert"
                    style="max-width: 850px; margin-bottom: 20px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h4 class="fw-bold mb-5 text-center" style="color:#445244;">Register</h4>

                    <!-- Form -->
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Username:</label>
                            <input type="text" class="form-control rounded-3" name="username" placeholder="Masukkan username" value="{{ old('username') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Email:</label>
                            <input type="email" class="form-control rounded-3" name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label fw-semibold small">Password:</label>
                            <input type="password" class="form-control rounded-3" id="m_password" name="password" placeholder="Masukkan password" required>
                            <i class="fa fa-eye toggle-password"
                                data-target="m_password"
                                style="position:absolute; right:15px; top:67%; transform:translateY(-50%); cursor:pointer; color:#6c757d;"></i>
                        </div>
                        <div class="mb-4 position-relative">
                            <label class="form-label fw-semibold small">Konfirmasi Password:</label>
                            <input type="password" class="form-control rounded-3" id="m_password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                            <i class="fa fa-eye toggle-password"
                                data-target="m_password_confirmation"
                                style="position:absolute; right:15px; top:67%; transform:translateY(-50%); cursor:pointer; color:#6c757d;"></i>
                        </div>

                        <!-- Tombol Register -->
                        <button type="submit" class="btn btn-success w-100 rounded-4 fw-semibold mb-3">Register</button>

                        <div class="text-center fw-semibold text-muted mb-2">Or</div>

                        <a href="{{ route('google.redirect') }}" class="btn w-100 rounded-4 d-flex justify-content-center align-items-center google-btn py-4"
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
        @media (max-width: 768px) {

            #success-alert,
            #error-alert {
                max-width: 100%;
                margin: 0 15px 15px 15px;
                /* sedikit jarak dari tepi layar */
            }
        }
    </style>

    @push('scripts')
    <script>
        // Hilangkan alert setelah 5 detik
        setTimeout(function() {
            ['success-alert', 'error-alert'].forEach(id => {
                const alertEl = document.getElementById(id);
                if (alertEl) {
                    alertEl.classList.remove('show');
                    alertEl.classList.add('fade');
                    setTimeout(() => alertEl.remove(), 500); // hapus setelah animasi selesai
                }
            });
        }, 5000);

        // 👁️ Toggle show/hide password
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);

                if (input.type === "password") {
                    input.type = "text";
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = "password";
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    </script>
    @endpush

</x-layout-client>