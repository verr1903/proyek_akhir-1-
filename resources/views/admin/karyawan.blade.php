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
                                    <tr>
                                        <td>1</td>
                                        <td>Retro</td>
                                        <td>There passages of Lorem Ipsum available</td>
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
                                        <td>2</td>
                                        <td>Retro</td>
                                        <td>There passages of Lorem Ipsum available</td>
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
                                        <td class="text-center">3</td>
                                        <td>Retro</td>
                                        <td>There passages of Lorem Ipsum available</td>
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

                            <!-- Modal Edit Karyawan -->
                            <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-warning text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="editProdukModalLabel">
                                                Edit Karyawan
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body p-4">
                                            <form id="formEditProduk">
                                                <div class="container-fluid py-2">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Nama Karyawan</label>
                                                        <input type="text" id="editKaryawan" class="form-control rounded-3 shadow-sm" value="budi">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Email</label>
                                                        <input type="email" id="editKaryawan" class="form-control rounded-3 shadow-sm" value="budi@gmail.com">
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

                            <!-- Modal Tambah Karyawan -->
                            <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <!-- Header -->
                                        <div class="modal-header bg-success text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="tambahProdukModalLabel">
                                                Tambah Karyawan
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body p-4">
                                            <form id="formTambahProduk">
                                                <div class="container-fluid py-2">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Nama Karyawan</label>
                                                        <input type="text" id="tambahKaryawan" class="form-control rounded-3 shadow-sm" placeholder="budi">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Email</label>
                                                        <input type="email" id="tambahKaryawan" class="form-control rounded-3 shadow-sm" placeholder="budi@gmail.com">
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

    </script>
    @endpush
</x-layout-admin>