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

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <form action="{{ route('diskonAdmin') }}" method="GET" class="w-100">
                            <div class="d-flex flex-wrap align-items-center gap-3 py-2">

                                <!-- Search -->
                                <div class="flex-grow-1 min-w-0">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control border-0 rounded-pill"
                                        placeholder="Cari diskon berdasarkan produk..."
                                        style="height:44px; font-size:14px; min-width:150px; padding-left:18px;">
                                </div>

                                <!-- Sort -->
                                <select name="sort" class="form-select mx-1 form-select-sm border-0 bg-white text-dark rounded-pill px-2"
                                    style="width:170px; height:44px; font-size:14px;">
                                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tanggal dibuat</option>
                                    <option value="persentase" {{ request('sort') == 'persentase' ? 'selected' : '' }}>Persentase</option>
                                    <option value="durasi" {{ request('sort') == 'durasi' ? 'selected' : '' }}>Durasi</option>
                                    <option value="nama_produk" {{ request('sort') == 'nama_produk' ? 'selected' : '' }}>Nama Produk</option>
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
                                    <a href="{{ route('diskonAdmin') }}" class="btn mx-1 btn-light border rounded-pill d-flex align-items-center text-muted"
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
                                        <td>
                                            <span class="fw-semibold text-black"
                                                id="countdown-{{ $discount->id }}"
                                                data-end="{{ \Carbon\Carbon::parse($discount->created_at)->addHours($discount->durasi)->toISOString() }}">
                                                Memuat...
                                            </span>
                                        </td>
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

                            <div class="mt-3">
                                {{ $discounts->links('pagination::bootstrap-5') }}
                            </div>

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
                                                        @php
                                                        // Ambil produk yang sedang diedit (nanti diganti via JS)
                                                        $isInDiscount = $usedProductIds->contains($product->id);
                                                        @endphp

                                                        {{-- tampilkan jika produk belum punya diskon --}}
                                                        <option
                                                            value="{{ $product->id }}"
                                                            {{ $isInDiscount ? 'data-has-discount=true' : '' }}>
                                                            {{ $product->nama }} - {{ $product->kategori }}
                                                        </option>
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
                                                    <select id="tambahProduk" name="id_product" class="form-select rounded-3 shadow-sm custom-select-style">
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

    <!-- script modal edit agar tidk tampil produk yang sama  -->
    <script>
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const persentase = this.dataset.persentase;
                const durasi = this.dataset.durasi;
                const produk = this.dataset.produk;

                const select = document.getElementById('editProduk');

                // Sembunyikan semua produk yang punya diskon kecuali yang sedang diedit
                select.querySelectorAll('option').forEach(opt => {
                    if (opt.dataset.hasDiscount === "true" && opt.value !== produk) {
                        opt.style.display = "none";
                    } else {
                        opt.style.display = "block";
                    }
                });

                // Isi form modal
                document.getElementById('editId').value = id;
                document.getElementById('editPersentase').value = persentase;
                document.getElementById('editDurasi').value = durasi;
                select.value = produk;

                // Ubah action form sesuai ID
                document.getElementById('formEditDiskon').action = `/admin/diskon/${id}`;
            });
        });
    </script>

    <!-- hitung mundur durasi -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCountdown() {
                document.querySelectorAll('[id^="countdown-"]').forEach(el => {
                    const end = new Date(el.dataset.end);
                    const now = new Date();
                    const diff = end - now;

                    if (diff <= 0) {
                        el.textContent = 'Waktu Habis';
                        el.classList.remove('text-black');
                        el.classList.add('text-danger');
                        return;
                    }

                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                    const seconds = Math.floor((diff / 1000) % 60);
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));

                    let text = '';
                    if (days > 0) text += `${days}h `;
                    text += `${hours}j ${minutes}m ${seconds}d`;

                    el.textContent = text;
                });
            }

            updateCountdown();
            setInterval(updateCountdown, 1000); // update tiap detik
        });
    </script>
    @endpush
</x-layout-admin>