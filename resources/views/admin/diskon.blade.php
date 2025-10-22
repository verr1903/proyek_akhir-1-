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
                            <i class="zmdi zmdi-plus me-1"></i> Tambah Diskon
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
                                    @forelse($discounts as $index => $discount)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success fw-semibold">
                                                {{ $discount->persentase }}%
                                            </span>
                                        </td>
                                        <td><span class="fw-semibold">{{ $discount->durasi }}</span></td>
                                        <td><span class="text-muted">{{ $discount->product->nama ?? '-' }}</span></td>
                                        <td>
                                            <!-- edit -->
                                            <a href="javascript:void(0);"
                                                class="btn-action waves-effect waves-yellow btn-edit"
                                                title="Edit"
                                                data-id="{{ $discount->id }}"
                                                data-persentase="{{ $discount->persentase }}"
                                                data-durasi="{{ $discount->durasi }}"
                                                data-produk="{{ $discount->product->id ?? '' }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editProdukModal">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>

                                            <!-- hapus -->
                                            <a href="javascript:void(0);" class="btn-action waves-effect waves-red btn-hapus"
                                                data-id="{{ $discount->id }}" data-nama="{{ $discount->product->nama }}">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">Tidak ada data diskon.</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>

                            <!-- Modal Edit Produk -->
                            <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg">
                                        <div class="modal-header bg-warning text-white rounded-top-4">
                                            <h5 class="modal-title fw-bold" id="editProdukModalLabel">Edit Diskon</h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form id="formEditDiskon" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" id="editId" name="id">

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Persentase</label>
                                                    <input type="number" id="editPersentase" name="persentase" class="form-control rounded-3 shadow-sm" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Durasi (Jam)</label>
                                                    <input type="number" id="editDurasi" name="durasi" class="form-control rounded-3 shadow-sm" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Produk</label>
                                                    <select id="editProduk" name="id_product" class="form-select rounded-3 shadow-sm custom-select-style" required>
                                                        <option value="" disabled selected>Pilih produk</option>
                                                        @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->nama }} - {{ $product->kategori }}</option>
                                                        @endforeach
                                                    </select>
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
                                            <h5 class="modal-title fw-bold" id="tambahProdukModalLabel">Tambah Diskon</h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form action="{{ route('diskonAdmin.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Persentase</label>
                                                    <input type="number" name="persentase" class="form-control rounded-3 shadow-sm" placeholder="Contoh: 50">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Durasi (Jam)</label>
                                                    <input type="number" name="durasi" class="form-control rounded-3 shadow-sm" placeholder="Contoh: 72">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Produk</label>
                                                    <select id="editProduk" class="form-select rounded-3 shadow-sm custom-select-style">
                                                        <option value="" disabled selected>Pilih produk</option>
                                                        @foreach($products->whereNotIn('id', $discounts->pluck('id_product')) as $product)
                                                        <option value="{{ $product->id }}">{{ $product->nama }} - {{ $product->kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
                                                        <i class="zmdi zmdi-close me-1"></i> Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-success text-white rounded-3 fw-semibold">
                                                        <i class="zmdi zmdi-check me-1"></i> Simpan Diskon
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

    <!-- sweatalert hapus -->
    <script>
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    html: `Iklan <strong>${nama}</strong> akan dihapus secara permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e3342f',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/admin/diskon/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            }).then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Berhasil!', 'Diskon telah dihapus.', 'success')
                                        .then(() => location.reload());
                                }
                            });
                    }
                });
            });
        });
    </script>

    <!-- modal edit -->
    <script>
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const persentase = this.dataset.persentase;
                const durasi = this.dataset.durasi;
                const produk = this.dataset.produk;

                // Isi form modal
                document.getElementById('editId').value = id;
                document.getElementById('editPersentase').value = persentase;
                document.getElementById('editDurasi').value = durasi;
                document.getElementById('editProduk').value = produk;

                // Ubah action form sesuai ID
                document.getElementById('formEditDiskon').action = `/admin/diskon/${id}`;
            });
        });
    </script>

    @endpush
</x-layout-admin>