    <x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">
        <div class="container-fluid">
            <div class="justify-content-center">
                    <div class="card shadow-sm rounded-4 border-0">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4 text-center text-dark">Profil Pengguna</h4>

                            <form id="formProfile" class="px-2">

                                <!-- Avatar -->
                                <div class="mb-4 text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <img id="avatarPreview"
                                            src="/Adminassets/images/profile/default-avatar.png"
                                            alt="Avatar"
                                            class="img-thumbnail rounded-circle shadow-sm mb-3"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                        <label for="avatarInput" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            <i class="zmdi zmdi-upload me-1"></i> Ganti Foto
                                        </label>
                                        <input type="file" id="avatarInput" accept="image/*" class="d-none">
                                    </div>
                                </div>

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama</label>
                                    <input type="text" id="nama" class="form-control rounded-3 shadow-sm"
                                        placeholder="Masukkan nama anda" value="Admin Utama">
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" id="email" class="form-control rounded-3 shadow-sm"
                                        placeholder="Masukkan email anda" value="admin@mail.com">
                                </div>

                                <hr class="my-4">

                                <!-- Ubah Password -->
                                <h6 class="fw-bold text-dark mb-3">Ubah Password</h6>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password Baru</label>
                                    <input type="password" id="password" class="form-control rounded-3 shadow-sm"
                                        placeholder="Masukkan password baru">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Konfirmasi Password</label>
                                    <input type="password" id="confirmPassword" class="form-control rounded-3 shadow-sm"
                                        placeholder="Ulangi password baru">
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success rounded-pill px-4 py-2 fw-semibold shadow-sm">
                                        <i class="zmdi zmdi-check me-1"></i> Simpan Perubahan
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        // Preview Avatar Otomatis
        document.getElementById('avatarInput').addEventListener('change', function(event) {
            const img = document.getElementById('avatarPreview');
            const file = event.target.files[0];
            if (file) {
                img.src = URL.createObjectURL(file);
            }
        });

        // Validasi Password
        document.getElementById('formProfile').addEventListener('submit', function(e) {
            e.preventDefault();

            const pass = document.getElementById('password').value;
            const confirm = document.getElementById('confirmPassword').value;

            if (pass !== confirm) {
                alert('Password dan konfirmasi password tidak cocok!');
                return;
            }

            alert('Perubahan profil berhasil disimpan (simulasi FE)');
        });
    </script>
    @endpush

</x-layout-admin>
