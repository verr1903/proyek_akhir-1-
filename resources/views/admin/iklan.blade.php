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
                            <i class="zmdi zmdi-plus me-1"></i> Tambah Iklan
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


                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 text-center" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 15%;">Gambar</th>
                                        <th style="width: 25%;">Judul</th>
                                        <th style="width: 40%;">Sub Judul</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($iklans as $index => $iklan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if ($iklan->gambar)
                                            <img src="{{ asset('storage/' . $iklan->gambar) }}" width="48" alt="Iklan img"
                                                class="img-clickable"
                                                data-bs-toggle="modal"
                                                data-bs-target="#previewImageModal"
                                                data-src="{{ $iklan->gambar ? asset('storage/' . $iklan->gambar) : '/Adminassets/images/ecommerce/placeholder.png' }}">
                                            @else
                                            <img src="/Adminassets/images/ecommerce/placeholder.png" width="48" alt="Default">
                                            @endif
                                        </td>
                                        <td>
                                            {!! $iklan->judul !!}</h5>
                                        </td>
                                        <td><span class="text-muted">{!! $iklan->sub_judul !!}</span></td>
                                        <td>

                                            <!-- edit -->
                                            <a href="javascript:void(0);"
                                                class="btn-action-edit btn-action waves-effect waves-yellow"
                                                title="Edit"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editProdukModal"
                                                data-id="{{ $iklan->id }}"
                                                data-judul="{{ $iklan->judul }}"
                                                data-sub_judul="{{ $iklan->sub_judul }}"
                                                data-gambar="{{ $iklan->gambar ? asset('storage/' . $iklan->gambar) : '/Adminassets/images/ecommerce/placeholder.png' }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>

                                            <!-- Hapus -->
                                            <form action="{{ route('iklanAdmin.destroy', $iklan->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn-action waves-effect waves-red btn-delete border-0"
                                                    title="Hapus"
                                                    data-nama="{{ strip_tags($iklan->judul) }}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada Iklan</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>

                            <!-- Modal Edit Produk -->
                            <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-warning text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="editProdukModalLabel">
                                                Edit Iklan
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body p-4">
                                            <form id="formEditProduk" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" id="editId" name="id">
                                                <div class="container-fluid py-2">
                                                    <!-- Gambar Produk -->
                                                    <div class="mb-4 text-center">
                                                        <label for="editGambar" class="form-label fw-semibold mb-2">Gambar Iklan</label>
                                                        <div class="d-flex flex-column align-items-center">
                                                            <img id="previewGambarEdit"
                                                                src="/Adminassets/images/ecommerce/1.png"
                                                                alt="Preview"
                                                                class="img-thumbnail rounded-4 shadow-sm mb-3"
                                                                style="width: 140px; height: auto;">
                                                            <label for="editGambar" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                                <i class="zmdi zmdi-upload me-1"></i> Pilih Gambar
                                                            </label>
                                                            <input type="file" id="editGambar" name="gambar" accept="image/*" class="d-none">
                                                        </div>
                                                    </div>

                                                    <!-- Judul Iklan -->
                                                    <div class="mb-3">
                                                        <label for="editDetail" class="form-label fw-semibold">Judul</label>
                                                        <textarea name="judul" class="form-control rounded-3" id="editJudul" rows="2"></textarea>
                                                    </div>

                                                    <!-- Sub Judul Iklan -->
                                                    <div class="mb-3">
                                                        <label for="editDetail" class="form-label fw-semibold">Sub Judul</label>
                                                        <textarea name="sub_judul" class="form-control rounded-3" id="editSubJudul" rows="2"></textarea>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn close-footer btn-outline-secondary rounded-3 btn-close-red" data-bs-dismiss="modal">
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
                            </div>

                            <!-- Modal Tambah Produk -->
                            <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <!-- Header -->
                                        <div class="modal-header bg-success text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="tambahProdukModalLabel">
                                                Tambah Iklan
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body p-4">
                                            <form id="formTambahProduk" action="{{ route('iklanAdmin.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="container-fluid py-2">
                                                    <div class="mb-4 text-center">
                                                        <label for="tambahGambar" class="form-label fw-semibold mb-2">Gambar Iklan</label>
                                                        <div class="d-flex flex-column align-items-center">
                                                            <img id="previewGambarTambah"
                                                                src="/Adminassets/images/ecommerce/placeholder.png"
                                                                alt="Preview"
                                                                class="img-thumbnail rounded-4 shadow-sm mb-3"
                                                                style="width: 140px; height: auto;">
                                                            <label for="tambahGambar" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                                <i class="zmdi zmdi-upload me-1"></i> Pilih Gambar
                                                            </label>
                                                            <input type="file" id="tambahGambar" name="gambar" accept="image/*" class="d-none">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="tambahJudul" class="form-label fw-semibold">Judul</label>
                                                        <textarea name="judul" class="form-control rounded-3 shadow-sm" id="tambahJudul" rows="2" placeholder="Masukkan judul iklan"></textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="tambahSubJudul" class="form-label fw-semibold">Sub Judul</label>
                                                        <textarea name="sub_judul" class="form-control rounded-3 shadow-sm" id="tambahSubJudul" rows="2" placeholder="Masukkan sub judul"></textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
                                                        <i class="zmdi zmdi-close me-1"></i> Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-success text-white rounded-3 fw-semibold">
                                                        <i class="zmdi zmdi-check me-1"></i> Simpan Iklan
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Preview Gambar -->
                            <div class="modal fade" id="previewImageModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0 bg-transparent">
                                        <div class="modal-body text-center p-0">
                                            <img id="previewModalImage" src="" alt="Preview" class="img-fluid rounded-4 shadow-sm">
                                        </div>
                                        <div class="modal-footer justify-content-center border-0">
                                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Tutup</button>
                                        </div>
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

    <!-- preview gambar dalam modal -->
    <script>
        document.getElementById('editGambar').addEventListener('change', function(event) {
            const img = document.getElementById('previewGambarEdit');
            const file = event.target.files[0];
            if (file) {
                img.src = URL.createObjectURL(file);
            }
        });
        document.getElementById('tambahGambar').addEventListener('change', function(event) {
            const img = document.getElementById('previewGambarTambah');
            const file = event.target.files[0];
            if (file) {
                img.src = URL.createObjectURL(file);
            }
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

    <!-- modal preview gambar -->
    <script>
        const previewModalImage = document.getElementById('previewModalImage');

        document.querySelectorAll('.img-clickable').forEach(img => {
            img.addEventListener('click', function() {
                previewModalImage.src = this.dataset.src;
            });
        });
    </script>

    <!-- CKEditor untuk Edit Judul & Sub Judul -->
    <script>
        let editorJudul, editorSubJudul;

        ClassicEditor
            .create(document.querySelector('#tambahJudul'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo'
                ],
                placeholder: 'Masukkan judul iklan...',
                fontSize: {
                    options: [12, 14, 16, 18, 20, 24],
                    supportAllValues: true
                }
            })
            .then(editor => editorTambahJudul = editor)
            .catch(console.error);

        // 🔸 CKEditor untuk Tambah Sub Judul
        ClassicEditor
            .create(document.querySelector('#tambahSubJudul'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo'
                ],
                placeholder: 'Masukkan sub judul iklan...',
                fontSize: {
                    options: [12, 14, 16, 18, 20, 24],
                    supportAllValues: true
                }
            })
            .then(editor => editorTambahSubJudul = editor)
            .catch(console.error);
        // Inisialisasi CKEditor untuk Judul
        ClassicEditor
            .create(document.querySelector('#editJudul'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo'
                ],
                placeholder: 'Tulis judul iklan...',
                fontSize: {
                    options: [12, 14, 16, 18, 20, 24],
                    supportAllValues: true
                }
            })
            .then(editor => {
                editorJudul = editor;
            })
            .catch(error => console.error(error));

        // Inisialisasi CKEditor untuk Sub Judul
        ClassicEditor
            .create(document.querySelector('#editSubJudul'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo'
                ],
                placeholder: 'Tulis sub judul iklan...',
                fontSize: {
                    options: [12, 14, 16, 18, 20, 24],
                    supportAllValues: true
                }
            })
            .then(editor => {
                editorSubJudul = editor;
            })
            .catch(error => console.error(error));

        // Saat klik tombol edit — isi CKEditor dengan data dari tabel
        document.querySelectorAll('.btn-action-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const judul = this.dataset.judul;
                const sub_judul = this.dataset.sub_judul;
                const gambar = this.dataset.gambar;

                // isi data ke form
                document.getElementById('editId').value = id;
                document.getElementById('previewGambarEdit').src = gambar;

                // ubah action form ke route update
                document.getElementById('formEditProduk').action = `/admin/iklan/${id}`;

                // isi data ke CKEditor (kalau sudah siap)
                if (editorJudul) editorJudul.setData(judul);
                if (editorSubJudul) editorSubJudul.setData(sub_judul);
            });
        });

        // Saat form submit — kirim data CKEditor ke textarea
        document.getElementById('formEditProduk').addEventListener('submit', function() {
            document.querySelector('#editJudul').value = editorJudul.getData();
            document.querySelector('#editSubJudul').value = editorSubJudul.getData();
        });
    </script>

    <!-- sweetalert hapus -->
    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.delete-form');
                const namaIklan = this.dataset.nama;

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    html: `Iklan <strong>${namaIklan}</strong> akan dihapus secara permanen.`,
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
    </script>


    @endpush
</x-layout-admin>