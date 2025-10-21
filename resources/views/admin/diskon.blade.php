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
                            <table class="table table-hover m-b-0 text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Persentase</th>
                                        <th>Durasi(Jam)</th>
                                        <th>Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><span style="font-size: 13px;" class="badge bg-success-subtle text-success fw-semibold">45%</span></td>
                                        <td><span style="font-size: 15px;" class="fw-semibold">72</span></td>
                                        <td><span style="font-size: 15px;" class="text-muted">randomised words even slightly believable</span></td>
                                        <td>
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
                                        <td><span style="font-size: 13px;" class="badge bg-success text-white fw-semibold">85%</span></td>
                                        <td><span style="font-size: 15px;" class="fw-semibold">72</span></td>
                                        <td><span style="font-size: 15px;" class="text-muted">It is a long established will be distracted</span></td>
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
                                        <td><span style="font-size: 13px;" class="badge bg-warning-subtle text-warning fw-semibold">45%</span></td>
                                        <td><span style="font-size: 15px;" class="fw-semibold">72</span></td>
                                        <td><span style="font-size: 15px;" class="text-muted">There passages of Lorem Ipsum available</span></td>
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
                                            <h5 class="modal-title fw-bold" id="editProdukModalLabel">Edit Produk</h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form id="formEditProduk">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Persentase</label>
                                                    <input type="text" id="editPersentase" class="form-control rounded-3 shadow-sm" value="50">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Durasi (Jam)</label>
                                                    <input type="number" id="editDurasi" class="form-control rounded-3 shadow-sm" value="72">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Produk</label>
                                                    <div class="">
                                                        <select id="editProduk" class="form-select rounded-3 shadow-sm custom-select-style">
                                                            <option value="" disabled selected>Pilih produk</option>
                                                            <option value="Produk A">Produk A</option>
                                                            <option value="Produk B">Produk B</option>
                                                            <option value="Produk C">Produk C</option>
                                                            <option value="Produk D">Produk D</option>
                                                        </select>
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
                            </div>

                            <!-- Modal Tambah Produk -->
                            <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-success text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="tambahProdukModalLabel">Tambah Produk</h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form id="formTambahProduk">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Persentase</label>
                                                    <input type="text" id="tambahPersentase" class="form-control rounded-3 shadow-sm" placeholder="Contoh: 50">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Durasi (Jam)</label>
                                                    <input type="number" id="tambahDurasi" class="form-control rounded-3 shadow-sm" placeholder="Contoh: 72">
                                                </div>
                                               <div class="mb-3">
                                                    <label class="form-label fw-semibold">Produk</label>
                                                    <div class="">
                                                        <select id="editProduk" class="form-select rounded-3 shadow-sm custom-select-style">
                                                            <option value="" disabled selected>Pilih produk</option>
                                                            <option value="Produk A">Produk A</option>
                                                            <option value="Produk B">Produk B</option>
                                                            <option value="Produk C">Produk C</option>
                                                            <option value="Produk D">Produk D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
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