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

                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Sub Judul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><img src="/Adminassets/images/ecommerce/1.png" width="48" alt="Product img"></td>
                                        <td>
                                            <h5>List Monochrome </h5>
                                        </td>
                                        <td><span class="text-muted">randomised words even slightly believable</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-yellow" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#editProdukModal">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-red" title="Hapus">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td><img src="/Adminassets/images/ecommerce/10.png" width="48" alt="Product img"></td>
                                        <td>
                                            <h5>whoe series </h5>
                                        </td>
                                        <td><span class="text-muted">It is a long established will be distracted</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-yellow" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#editProdukModal">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-red" title="Hapus">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td><img src="/Adminassets/images/ecommerce/11.png" width="48" alt="Product img"></td>
                                        <td>
                                            <h5>Retro</h5>
                                        </td>
                                        <td><span class="text-muted">There passages of Lorem Ipsum available</span></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-yellow" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#editProdukModal">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-red" title="Hapus">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

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
                                            <form id="formEditProduk">
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
                                                            <input type="file" id="editGambar" accept="image/*" class="d-none">
                                                        </div>
                                                    </div>

                                                    <!-- Judul Iklan -->
                                                    <div class="mb-3">
                                                        <label for="editDetail" class="form-label fw-semibold">Judul</label>
                                                        <textarea class="form-control rounded-3" id="editDetail" rows="3">randomised words even slightly believable</textarea>
                                                    </div>

                                                    <!-- Sub Judul Iklan -->
                                                    <div class="mb-3">
                                                        <label for="editDetail" class="form-label fw-semibold">Sub Judul</label>
                                                        <textarea class="form-control rounded-3" id="editDetail" rows="3">randomised words even slightly believable</textarea>
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
                                            <form id="formTambahProduk">
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
                                                            <input type="file" id="tambahGambar" accept="image/*" class="d-none">
                                                        </div>
                                                    </div>

                                                    <!-- Judul Iklan -->
                                                    <div class="mb-3">
                                                        <label for="tambahDetail" class="form-label fw-semibold">Judul</label>
                                                        <textarea class="form-control rounded-3 shadow-sm" id="tambahDetail" rows="3" placeholder="Deskripsi produk"></textarea>
                                                    </div>

                                                    <!-- Sub Judul Iklan -->
                                                    <div class="mb-3">
                                                        <label for="tambahDetail" class="form-label fw-semibold">Sub Judul</label>
                                                        <textarea class="form-control rounded-3 shadow-sm" id="tambahDetail" rows="3" placeholder="Deskripsi produk"></textarea>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    @push('scripts')
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
    @endpush
</x-layout-admin>