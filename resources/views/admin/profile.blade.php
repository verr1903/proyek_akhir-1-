    <x-layout-admin>

        <x-slot:title>{{$title}}</x-slot:title>

        <section class="content home" style="margin-top: 100px;">
            <div class="container-fluid">
                <div class="justify-content-center">
                    <div class="card shadow-sm rounded-4 border-0">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4 text-center text-dark">Profil Pengguna</h4>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <form id="formProfile"
                                action="{{ route('profileAdmin.update') }}"
                                method="POST"
                                enctype="multipart/form-data"
                                class="px-2">

                                @csrf

                                <!-- Avatar -->
                                <div class="mb-4 text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <img id="avatarPreview"
                                            src="{{ 
        $admin->avatar
            ? (Str::startsWith($admin->avatar, ['http://', 'https://'])
                ? $admin->avatar
                : asset('storage/profile/' . $admin->avatar))
            : asset('Adminassets/images/profile/default-avatar.png')
    }}"
                                            alt="Avatar"
                                            class="img-thumbnail rounded-circle shadow-sm mb-3"
                                            style="width: 120px; height: 120px; object-fit: cover;">


                                        <label for="avatarInput" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            <i class="zmdi zmdi-upload me-1"></i> Ganti Foto
                                        </label>
                                        <input type="file" id="avatarInput" name="avatar" accept="image/*" class="d-none">

                                    </div>
                                </div>

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama</label>
                                    <input type="text"
                                        name="username"
                                        class="form-control rounded-3 shadow-sm"
                                        value="{{ old('username', $admin->username) }}"
                                        required>


                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email"
                                        id="email"
                                        class="form-control rounded-3 shadow-sm"
                                        value="{{ $admin->email }}"
                                        readonly>

                                </div>

                                <hr class="my-4">



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
            document.getElementById('avatarInput').addEventListener('change', function(e) {
                const img = document.getElementById('avatarPreview');
                const file = e.target.files[0];
                if (file) img.src = URL.createObjectURL(file);
            });
        </script>

        @endpush

    </x-layout-admin>