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
                            <i class="zmdi zmdi-plus me-1"></i> Tambah Produk
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
                            <table class="table table-hover m-b-0" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 10%;">Gambar</th>
                                        <th style="width: 15%;">Nama Produk</th>
                                        <th style="width: 30%;">Detail</th>
                                        <th style="width: 10%;">Kategori</th>
                                        <th style="width: 10%;">Harga</th>
                                        <th style="width: 8%;">Stock</th>
                                        <th style="width: 12%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $index => $product)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($product->gambar)
                                            <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : '/Adminassets/images/ecommerce/placeholder.png' }}"
                                                width="48"
                                                alt="Product img"
                                                class="img-clickable"
                                                data-bs-toggle="modal"
                                                data-bs-target="#previewImageModal"
                                                data-src="{{ $product->gambar ? asset('storage/' . $product->gambar) : '/Adminassets/images/ecommerce/placeholder.png' }}">

                                            @else
                                            <img src="/Adminassets/images/ecommerce/placeholder.png" width="48" alt="No Image">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $product->nama }}
                                        </td>
                                        <td>{!! $product->detail !!}</td>

                                        <td>{{ $product->kategori }}</td>
                                        <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);"
                                                class="btn-action waves-effect waves-blue btn-detail-stok"
                                                data-bs-toggle="modal"
                                                data-bs-target="#stokDetailModal"
                                                data-nama="{{ $product->nama }}"
                                                data-kategori="{{ $product->kategori }}"
                                                data-gambar="{{ $product->gambar ? asset('storage/' . $product->gambar) : '/Adminassets/images/ecommerce/placeholder.png' }}"
                                                data-stok_s="{{ $product->stok_s }}"
                                                data-stok_m="{{ $product->stok_m }}"
                                                data-stok_l="{{ $product->stok_l }}"
                                                data-stok_xl="{{ $product->stok_xl }}"
                                                title="Lihat Detail Stok">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <!-- edit -->
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-yellow btn-action-edit"
                                                data-id="{{ $product->id }}"
                                                data-nama="{{ $product->nama }}"
                                                data-kategori="{{ $product->kategori }}"
                                                data-detail="{{ $product->detail }}"
                                                data-harga="{{ $product->harga }}"
                                                data-stok_s="{{ $product->stok_s }}"
                                                data-stok_m="{{ $product->stok_m }}"
                                                data-stok_l="{{ $product->stok_l }}"
                                                data-stok_xl="{{ $product->stok_xl }}"
                                                data-gambar="{{ $product->gambar ? asset('storage/' . $product->gambar) : '/Adminassets/images/ecommerce/placeholder.png' }}"
                                                data-bs-toggle="modal" data-bs-target="#editProdukModal"
                                                title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>

                                            <!-- hapus -->
                                            <form action="{{ route('produkAdmin.destroy', $product->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn-action waves-effect waves-red btn-delete border-0" data-nama="{{ $product->nama }}" title="Hapus">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada produk</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>

                            <!-- Modal Detail Stok -->
                            <div class="modal fade" id="stokDetailModal" tabindex="-1" aria-labelledby="stokDetailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4 shadow-lg border-0">
                                        <div class="modal-header bg-primary text-white rounded-top-4">
                                            <h5 class="modal-title fw-semibold" id="stokDetailModalLabel">
                                                Detail Stok Produk
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>


                                        </div>

                                        <div class="modal-body">
                                            <div class="text-center mb-3">
                                                <img src="/Adminassets/images/ecommerce/1.png" width="90" class="rounded-3 shadow-sm" alt="Product Image">
                                                <h5 class="mt-3 fw-bold">List Monochrome</h5>
                                                <p class="text-muted mb-0">Kategori: <strong>T-shirt</strong></p>
                                            </div>

                                            <table class="table table-bordered align-middle text-center">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Ukuran</th>
                                                        <th>Stok Tersisa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>S</strong></td>
                                                        <td>15</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>M</strong></td>
                                                        <td>22</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>L</strong></td>
                                                        <td>18</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>XL</strong></td>
                                                        <td>10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn close-footer btn-outline-secondary rounded-3 btn-close-red" data-bs-dismiss="modal">
                                                <i class="zmdi zmdi-close me-1"></i> Tutup
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Produk -->
                            <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-warning text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="editProdukModalLabel">
                                                Edit Produk
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body p-4">
                                            <form id="formEditProduk" action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" id="editProductId" name="id">
                                                <div class="container-fluid py-2">
                                                    <!-- Gambar Produk -->
                                                    <div class="mb-4 text-center">
                                                        <label for="editGambar" class="form-label fw-semibold mb-2">Gambar Produk</label>
                                                        <div class="d-flex flex-column align-items-center">
                                                            <img id="previewGambarEdit"
                                                                src="/Adminassets/images/ecommerce/1.png"
                                                                alt="Preview"
                                                                class="img-thumbnail rounded-4 shadow-sm mb-3"
                                                                style="width: 140px; height: auto;">
                                                            <label for="editGambar" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                                <i class="zmdi zmdi-upload me-1"></i> Pilih Gambar
                                                            </label>
                                                            <input type="file" name="gambar" id="editGambar" accept="image/*" class="d-none">
                                                        </div>
                                                    </div>

                                                    <!-- Nama & Kategori -->
                                                    <div class="row g-3 mb-3 align-items-end">
                                                        <!-- Nama Produk -->
                                                        <div class="col-md-6">
                                                            <label for="editNama" class="form-label fw-semibold mb-2">Nama Produk</label>
                                                            <input type="text" name="nama" class="form-control rounded-3 shadow-sm border-1"
                                                                id="editNama" value="List Monochrome"
                                                                style="padding: 10px 14px; font-weight: 500;">
                                                        </div>

                                                        <!-- Kategori -->
                                                        <div class="col-md-6">
                                                            <label for="editKategori" class="form-label fw-semibold mb-2 kategori">Kategori</label>
                                                            <select class="form-select rounded-3 kategori-select shadow-sm border-1" id="editKategori"
                                                                style="padding: 8px 36px 8px 14px;" name="kategori">
                                                                <option value="Tshirt">Tshirt</option>
                                                                <option value="Sweater">Sweater</option>
                                                                <option value="Hoodie">Hoodie</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <!-- Detail Produk -->
                                                    <div class="mb-3">
                                                        <label for="editDetail" class="form-label fw-semibold">Detail Produk</label>
                                                        <textarea class="form-control rounded-3" id="editDetail" rows="3" name="detail"></textarea>
                                                    </div>

                                                    <!-- Harga -->
                                                    <div class="mb-4">
                                                        <label for="editHarga" class="form-label fw-semibold">Harga (Rp)</label>
                                                        <input type="number" class="form-control rounded-3" id="editHarga" name="harga">
                                                    </div>

                                                    <!-- Stok per Size -->
                                                    <div class="mb-2">
                                                        <label class="form-label fw-semibold mb-2">Stok per Size</label>
                                                        <div class="row g-3">
                                                            <div class="col-6 col-md-3">
                                                                <label for="stokS" class="form-label small mb-1">S</label>
                                                                <input type="number" class="form-control rounded-3 text-center" name="stok_s" id="stokS" value="10">
                                                            </div>
                                                            <div class="col-6 col-md-3">
                                                                <label for="stokM" class="form-label small mb-1">M</label>
                                                                <input type="number" class="form-control rounded-3 text-center" name="stok_m" id="stokM" value="8">
                                                            </div>
                                                            <div class="col-6 col-md-3">
                                                                <label for="stokL" class="form-label small mb-1">L</label>
                                                                <input type="number" class="form-control rounded-3 text-center" name="stok_l" id="stokL" value="5">
                                                            </div>
                                                            <div class="col-6 col-md-3">
                                                                <label for="stokXL" class="form-label small mb-1">XL</label>
                                                                <input type="number" class="form-control rounded-3 text-center" name="stok_xl" id="stokXL" value="3">
                                                            </div>
                                                        </div>
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
                                                Tambah Produk
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body p-4">
                                            <form id="formTambahProduk" action="{{ route('produkAdmin.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="container-fluid py-2">
                                                    <!-- Gambar Produk -->
                                                    <div class="mb-4 text-center">
                                                        <label for="tambahGambar" class="form-label fw-semibold mb-2">Gambar Produk</label>
                                                        <div class="d-flex flex-column align-items-center">
                                                            <img id="previewGambarTambah"
                                                                src="/Adminassets/images/ecommerce/placeholder.png"
                                                                alt="Preview"
                                                                class="img-thumbnail rounded-4 shadow-sm mb-3"
                                                                style="width: 140px; height: auto;">
                                                            <label for="tambahGambar" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                                <i class="zmdi zmdi-upload me-1"></i> Pilih Gambar
                                                            </label>
                                                            <input type="file" name="gambar" id="tambahGambar" accept="image/*" class="d-none">
                                                        </div>
                                                    </div>

                                                    <!-- Nama & Kategori -->
                                                    <div class="row g-3 mb-3 align-items-end">
                                                        <div class="col-md-6">
                                                            <label for="tambahNama" class="form-label fw-semibold mb-2">Nama Produk</label>
                                                            <input type="text" name="nama" class="form-control rounded-3 shadow-sm border-1"
                                                                id="tambahNama" placeholder="Masukkan nama produk"
                                                                style="padding: 10px 14px; font-weight: 500;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tambahKategori" class="form-label fw-semibold mb-2 kategori">Kategori</label>
                                                            <select class="form-select rounded-3 kategori-select shadow-sm border-1" id="tambahKategori"
                                                                style="padding: 8px 36px 8px 14px;" name="kategori">
                                                                <option selected disabled>Pilih kategori</option>
                                                                <option value="Tshirt">Tshirt</option>
                                                                <option value="Sweater">Sweater</option>
                                                                <option value="Hoodie">Hoodie</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Detail Produk -->
                                                    <div class="mb-3">
                                                        <label for="tambahDetail" class="form-label fw-semibold">Detail Produk</label>
                                                        <textarea name="detail" class="form-control rounded-3 shadow-sm" id="tambahDetail" rows="3" placeholder="Deskripsi produk"></textarea>
                                                    </div>

                                                    <!-- Harga -->
                                                    <div class="mb-4">
                                                        <label for="tambahHarga" class="form-label fw-semibold">Harga (Rp)</label>
                                                        <input name="harga" type="number" class="form-control rounded-3 shadow-sm" id="tambahHarga" placeholder="Masukkan harga">
                                                    </div>

                                                    <!-- Stok per Size -->
                                                    <div class="mb-2">
                                                        <label class="form-label fw-semibold mb-2">Stok per Size</label>
                                                        <div class="row g-3">
                                                            <div class="col-6 col-md-3">
                                                                <label for="tambahStokS" class="form-label small mb-1">S</label>
                                                                <input type="number" name="stok_s" class="form-control rounded-3 text-center shadow-sm" id="tambahStokS" value="0">
                                                            </div>
                                                            <div class="col-6 col-md-3">
                                                                <label for="tambahStokM" class="form-label small mb-1">M</label>
                                                                <input type="number" name="stok_m" class="form-control rounded-3 text-center shadow-sm" id="tambahStokM" value="0">
                                                            </div>
                                                            <div class="col-6 col-md-3">
                                                                <label for="tambahStokL" class="form-label small mb-1">L</label>
                                                                <input type="number" name="stok_l" class="form-control rounded-3 text-center shadow-sm" id="tambahStokL" value="0">
                                                            </div>
                                                            <div class="col-6 col-md-3">
                                                                <label for="tambahStokXL" name="stok_xl" class="form-label small mb-1">XL</label>
                                                                <input type="number" name="stok_xl" class="form-control rounded-3 text-center shadow-sm" id="tambahStokXL" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn close-footer btn-outline-secondary rounded-3 btn-close-red" data-bs-dismiss="modal">
                                                        <i class="zmdi zmdi-close me-1"></i> Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-success text-white rounded-3 fw-semibold">
                                                        <i class="zmdi zmdi-check me-1"></i> Simpan Produk
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

    <!-- preview gambar didalam modal-->
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

    <!-- modal detail -->
    <script>
        document.querySelectorAll('.btn-detail-stok').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById('stokDetailModal');
                // Update judul dan gambar
                modal.querySelector('h5.mt-3') ? modal.querySelector('h5.mt-3').textContent = this.dataset.nama : null;
                modal.querySelector('p.text-muted strong') ? modal.querySelector('p.text-muted strong').textContent = this.dataset.kategori : null;
                modal.querySelector('img') ? modal.querySelector('img').src = this.dataset.gambar : null;

                // Update stok
                modal.querySelector('tbody tr:nth-child(1) td:nth-child(2)').textContent = this.dataset.stok_s;
                modal.querySelector('tbody tr:nth-child(2) td:nth-child(2)').textContent = this.dataset.stok_m;
                modal.querySelector('tbody tr:nth-child(3) td:nth-child(2)').textContent = this.dataset.stok_l;
                modal.querySelector('tbody tr:nth-child(4) td:nth-child(2)').textContent = this.dataset.stok_xl;
            });
        });
    </script>

    <!-- modal edit -->
    <script>
        document.querySelectorAll('.btn-action-edit').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById('editProdukModal');

                // Isi data produk
                document.getElementById('editNama').value = this.dataset.nama;
                document.getElementById('editKategori').value = this.dataset.kategori;
                document.getElementById('editDetail').value = this.dataset.detail;
                document.getElementById('editHarga').value = this.dataset.harga;
                document.getElementById('stokS').value = this.dataset.stok_s;
                document.getElementById('stokM').value = this.dataset.stok_m;
                document.getElementById('stokL').value = this.dataset.stok_l;
                document.getElementById('stokXL').value = this.dataset.stok_xl;

                // Preview gambar
                document.getElementById('previewGambarEdit').src = this.dataset.gambar;

                // Set action form sesuai ID produk
                document.getElementById('formEditProduk').action = '/admin/produk/update/' + this.dataset.id;
            });
        });
    </script>

    <!-- menghilangkan angka 0 pada stok -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua input stok
            const stokInputs = document.querySelectorAll('#formTambahProduk input[type="number"], #formEditProduk input[type="number"]');

            stokInputs.forEach(input => {
                // Kosongkan saat fokus jika value = 0
                input.addEventListener('focus', function() {
                    if (this.value == '0') {
                        this.value = '';
                    }
                });

                // Jika kosong saat blur, set ke 0
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.value = '0';
                    }
                });
            });
        });
    </script>

    <!-- menambahkan titik untuk harga pada modal edit dan tambah -->
    <script>
        // Fungsi untuk menambahkan titik ribuan
        function formatRupiah(input) {
            // Hapus semua karakter non-digit
            let angka = input.value.replace(/\D/g, '');
            // Tambahkan titik setiap 3 digit dari belakang
            input.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Tambahkan event listener ke semua input harga
        document.addEventListener("DOMContentLoaded", function() {
            const hargaInputs = document.querySelectorAll("#tambahHarga, #editHarga");

            hargaInputs.forEach(input => {
                input.addEventListener("input", function() {
                    formatRupiah(input);
                });

                // Optional: remove dots saat submit untuk backend
                input.form.addEventListener("submit", function(e) {
                    input.value = input.value.replace(/\./g, "");
                });
            });
        });
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

    <!-- delete dengan sweetalert -->
    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.delete-form');
                const namaProduk = this.dataset.nama; // ambil nama produk dari data-nama

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    html: `Produk <strong>${namaProduk}</strong> akan dihapus permanen.`,
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

    <!-- CK EDITOR -->
    <script>
        let editorEdit;
        ClassicEditor
            .create(document.querySelector('#tambahDetail'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo'
                ],
                placeholder: 'Tulis detail produk di sini...',
                fontSize: {
                    options: [10, 12, 14, 16, 18, 20, 24],
                    supportAllValues: true
                }
            })
            .then(editor => {
                editorEdit = editor;
            })
            .catch(error => {
                console.error(error);
            });
            
        ClassicEditor
            .create(document.querySelector('#editDetail'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo'
                ],
                placeholder: 'Tulis detail produk di sini...',
                fontSize: {
                    options: [10, 12, 14, 16, 18, 20, 24],
                    supportAllValues: true
                }
            })
            .then(editor => {
                editorEdit = editor;
            })
            .catch(error => {
                console.error(error);
            });

        // Submit form: ambil isi editor
        document.getElementById('formEditProduk').addEventListener('submit', function() {
            document.querySelector('#editDetail').value = editorEdit.getData();
        });

        // Saat klik tombol edit produk, isi ulang CKEditor
        document.querySelectorAll('.btn-action-edit').forEach(button => {
            button.addEventListener('click', function() {
                const detail = this.dataset.detail;
                if (editorEdit) {
                    editorEdit.setData(detail);
                }
            });
        });
    </script>


    @endpush
</x-layout-admin>