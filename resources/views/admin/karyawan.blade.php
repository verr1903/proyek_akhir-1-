<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"></h5>
                        <button type="button"
                            class="btn btn-success btn-rounded waves-effect py-2 px-3 shadow-sm fw-semibold"
                            data-bs-toggle="modal" data-bs-target="#tambahProdukModal"
                            style="border-radius: 30px; transition: all 0.3s ease;">
                            <i class="zmdi zmdi-plus me-1"></i> Tambah Karyawan
                        </button>
                    </div>

                    @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div id="error-alert" class="alert alert-danger alert-dismissible fade show mt-2">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <form action="{{ route('karyawanAdmin') }}" method="GET" class="w-100">
                            <div class="d-flex flex-wrap align-items-center gap-3 py-2">

                                <!-- Search -->
                                <div class="flex-grow-1 min-w-0">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control border-0 rounded-pill"
                                        placeholder="Cari karyawan berdasarkan nama atau email..."
                                        style="height:44px; font-size:14px; min-width:150px; padding-left:18px;">
                                </div>

                                <!-- Sort -->
                                <select name="sort" class="form-select mx-1 form-select-sm border-0 bg-white text-dark rounded-pill px-2"
                                    style="width:170px; height:44px; font-size:14px;">
                                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tanggal dibuat</option>
                                    <option value="username" {{ request('sort') == 'username' ? 'selected' : '' }}>Nama</option>
                                    <option value="email" {{ request('sort') == 'email' ? 'selected' : '' }}>Email</option>
                                </select>

                                <!-- Direction -->
                                <select name="direction" class="form-select mx-1 form-select-sm border-0 bg-white text-dark rounded-pill px-2"
                                    style="width:140px; height:44px; font-size:14px;">
                                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Naik</option>
                                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Turun</option>
                                </select>

                                <!-- Buttons -->
                                <div class="d-flex align-items-center gap-2 mx-1">
                                    <button type="submit" class="btn btn-primary rounded-pill d-flex align-items-center"
                                        style="height:44px; padding: 0 18px; font-weight:600;">
                                        <i class="zmdi zmdi-search" style="margin-right:5px; margin-top:-5px;"></i> Cari
                                    </button>

                                    @if(request()->has('search') || request()->has('sort') || request()->has('direction'))
                                    <a href="{{ route('karyawanAdmin') }}" class="btn mx-1 btn-light border rounded-pill d-flex align-items-center text-muted"
                                        style="height:44px; padding: 0 12px;">
                                        <i class="zmdi zmdi-refresh" style="margin-right:5px; margin-top:-5px;"></i> Reset
                                    </a>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawans as $index => $karyawan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $karyawan->username }}</td>
                                        <td>{{ $karyawan->email }}</td>
                                        <td>
                                            <button
                                                class="btn-action waves-effect waves-yellow btn-edit-karyawan"
                                                title="Edit"
                                                data-id="{{ $karyawan->id }}"
                                                data-username="{{ $karyawan->username }}"
                                                data-email="{{ $karyawan->email }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editKaryawanModal">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>

                                            <form action="{{ route('karyawanAdmin.destroy', $karyawan->id) }}" method="POST" class="form-delete d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn-action waves-effect waves-red btn-delete-karyawan" title="Hapus">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            <div class="mt-3">
                                {{ $karyawans->links('pagination::bootstrap-5') }}
                            </div>

                            <!-- Modal Edit Karyawan -->
                            <div class="modal fade" id="editKaryawanModal" tabindex="-1" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-warning text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="editKaryawanModalLabel">Edit Karyawan</h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <form id="formEditKaryawan" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body p-4">
                                                <input type="hidden" id="edit_id" name="id">

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Nama Karyawan</label>
                                                    <input type="text" id="edit_username" name="username" class="form-control rounded-3 shadow-sm" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Email</label>
                                                    <input type="email" id="edit_email" name="email" class="form-control rounded-3 shadow-sm" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
                                                    <i class="zmdi zmdi-close me-1"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-warning text-white rounded-3 fw-semibold">
                                                    <i class="zmdi zmdi-save me-1"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Tambah Karyawan -->
                            <div class="modal fade" id="tambahProdukModal" tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-success text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold">Tambah Karyawan</h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" style="color: white;">
                                                <i class="zmdi zmdi-close-circle"></i>
                                            </button>
                                        </div>

                                        <form action="{{ route('karyawanAdmin.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Nama Karyawan</label>
                                                    <input type="text" name="username" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Email</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Password</label>
                                                    <input type="password" name="password" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success text-white">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    @push('scripts')

    <!-- script modal edit -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Saat tombol edit diklik
            document.querySelectorAll('.btn-edit-karyawan').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const username = this.dataset.username;
                    const email = this.dataset.email;

                    // Masukkan data ke modal
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_username').value = username;
                    document.getElementById('edit_email').value = email;

                    // Ubah action form sesuai ID
                    const form = document.getElementById('formEditKaryawan');
                    form.action = `/admin/karyawan/update/${id}`;
                });
            });
        });
    </script>

    <!-- menghilangkan alert -->
    <script>
        // Hilangkan alert success setelah 3 detik
        setTimeout(function() {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.classList.remove('show');
                successAlert.classList.add('fade');
                setTimeout(() => successAlert.remove(), 500); // hapus elemen dari DOM
            }

            const errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.classList.remove('show');
                errorAlert.classList.add('fade');
                setTimeout(() => errorAlert.remove(), 500);
            }
        }, 3000);
    </script>

    <!-- SweetAlert Delete Confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua tombol delete
            document.querySelectorAll('.btn-delete-karyawan').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data karyawan ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>


    @endpush
</x-layout-admin>