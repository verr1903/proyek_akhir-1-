 @php
 use Illuminate\Support\Str;
 @endphp
 <x-layout-client>

     <x-slot:title>{{$title}}</x-slot:title>
     <div class="main-wrapper">

         <x-header-client></x-header-client>

         <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
             <div class="container">
                 <img src="/clientAssets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
             </div>
         </div>

         <!-- Desktop View -->
         <div class="shop-single-page section-padding-4 mb-5 desktop-view">
             <div class="container mb-5">
                 @if (session('success'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('success') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                 @endif

                 @if (session('error'))
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     {{ session('error') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                 @endif

                 @if ($errors->any())
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <ul class="mb-0">
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                 @endif

                 <div class="card shadow-sm border-0 rounded-4 p-3">
                     <div class="card-header bg-white d-flex align-items-center justify-content-between border-0 pb-0 position-relative">

                         <!-- Judul di tengah -->
                         <h4 class="fw-bold text-dark mb-0 text-center flex-grow-1"></h4>

                         <!-- Tombol logout di kanan -->
                         <!-- <form action="" method="POST" class="position-absolute end-0 top-50 translate-middle-y me-2 mb-0"> -->
                         <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                             @csrf
                             <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                 <i class="fa fa-sign-out-alt me-1"></i> Logout
                             </button>
                         </form>

                     </div>



                     <div class="card-body">
                         <!-- Avatar Upload -->
                         <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                             @csrf

                             <div class="text-center mb-4">
                                 <img id="avatar-preview"
                                     src="{{ Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/profile/' . $user->avatar) }}"
                                     alt="Avatar"
                                     class="rounded-circle border shadow-sm"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                                 <div class="mt-2">
                                     <label for="avatar-upload" class="btn btn-outline-success btn-sm rounded-pill">
                                         <i class="fa fa-camera me-1"></i> Ganti Foto
                                     </label>
                                     <input type="file" id="avatar-upload" name="avatar" class="d-none" accept="image/*">
                                 </div>
                             </div>

                             <div class="mb-3">
                                 <label class="form-label fw-semibold">Username</label>
                                 <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                             </div>

                             <div class="mb-3">
                                 <label class="form-label fw-semibold">Email</label>
                                 <input type="email" disabled name="email" class="form-control text-muted" value="{{ old('email', $user->email) }}">
                             </div>


                             <div class="d-flex justify-content-between align-items-center mt-4">
                                 <button type="button" class="btn btn-outline-secondary rounded-3 px-4" onclick="window.history.back();">
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
             @if (session('success'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{ session('success') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             @endif

             @if (session('error'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 {{ session('error') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             @endif

             @if ($errors->any())
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <ul class="mb-0">
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                 </ul>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             @endif
             <div class="card border-0 shadow-sm rounded-4 mb-5">
                 <div class="card-body p-3">

                     <!-- Judul -->
                     <h5 class="fw-bold text-center text-dark mb-3"></h5>
                     <!-- Form Profil -->
                     <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                         @csrf

                         <!-- Foto Profil -->
                         <div class="text-center mb-4">
                             <div class="position-relative d-inline-block">
                                 <img id="avatar-preview-mobile"
                                     src="{{ Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/profile/' . $user->avatar) }}"
                                     alt="Avatar"
                                     class="rounded-circle border shadow-sm"
                                     style="width: 100px; height: 100px; object-fit: cover;">
                                 <label for="avatar-upload-mobile"
                                     class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle p-2"
                                     style="cursor: pointer; transform: translate(25%, 25%);">
                                     <i class="fa fa-camera"></i>
                                 </label>
                                 <input type="file" name="avatar" id="avatar-upload-mobile" class="d-none" accept="image/*">
                             </div>
                             <p class="small text-muted mt-2 mb-0">Ketuk ikon kamera untuk ganti foto</p>
                         </div>


                         <div class="mb-3">
                             <label class="form-label small fw-semibold text-secondary mb-1">Username</label>
                             <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                         </div>

                         <div class="mb-3">
                             <label class="form-label small fw-semibold text-secondary mb-1">Email</label>
                             <input type="email" disabled name="email" class="form-control text-muted" value="{{ old('email', $user->email) }}">
                         </div>

                         <!-- Tombol Aksi -->
                         <div class="d-grid gap-2">
                             <div class="d-grid gap-2">
                                 <!-- Simpan -->
                                 <button type="submit" class="btn btn-success rounded-3 fw-semibold pb-3">
                                     <i class="fa fa-save me-1"></i> Simpan Perubahan
                                 </button>
                     </form>
                     <!-- Logout -->
                     <!-- <form action="" method="POST" class="mb-0"> -->
                     <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                         @csrf
                         <button type="submit" class="btn btn-danger rounded-3 fw-semibold pb-3 w-100">
                             <i class="fa fa-sign-out-alt me-1"></i> Logout
                         </button>
                     </form>

                     <!-- Kembali -->
                     <button
                         type="button"
                         class="btn btn-outline-secondary rounded-3 fw-semibold pb-3"
                         onclick="window.history.back();">
                         <i class="fa fa-arrow-left me-1"></i> Kembali
                     </button>
                 </div>


             </div>


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