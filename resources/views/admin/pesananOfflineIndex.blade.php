<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"></h5>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <form action="{{ route('pesananOffline.index') }}" method="GET" class="w-100">
                            <div class="d-flex flex-wrap align-items-center gap-3 py-2">

                                <!-- Search -->
                                <div class="flex-grow-1 min-w-0">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control border-0 rounded-pill"
                                        placeholder="Cari pesanan ..."
                                        style="height:44px; font-size:14px; min-width:150px; padding-left:18px;">
                                </div>

                                <!-- Sort -->
                                <select name="sort" class="form-select mx-1 form-select-sm border-0 bg-white text-dark rounded-pill px-2"
                                    style="width:170px; height:44px; font-size:14px;">
                                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tanggal dibuat</option>
                                    <option value="no_pesanan" {{ request('sort') == 'no_pesanan' ? 'selected' : '' }}>No Pesanan</option>
                                    <option value="total_harga" {{ request('sort') == 'total_harga' ? 'selected' : '' }}>Total Harga</option>
                                </select>

                                <!-- Direction -->
                                <select name="direction" class="form-select mx-1 form-select-sm border-0 bg-white text-dark rounded-pill px-2"
                                    style="width:140px; height:44px; font-size:14px;">
                                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}> Naik</option>
                                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}> Turun</option>
                                </select>

                                <!-- Buttons -->
                                <div class="d-flex align-items-center gap-2 mx-1">
                                    <button type="submit" class="btn btn-primary rounded-pill d-flex align-items-center"
                                        style="height:44px; padding: 0 18px; font-weight:600;">
                                        <i class="zmdi zmdi-search" style="margin-right:5px; margin-top:-5px;"></i>Cari
                                    </button>

                                    @if(request()->has('search') || request()->has('sort') || request()->has('direction'))
                                    <a href="{{ route('pesananOffline.index') }}" class="btn mx-1 btn-light border rounded-pill d-flex align-items-center text-muted"
                                        style="height:44px; padding: 0 12px;">
                                        <i class="zmdi zmdi-refresh" style="margin-right:5px; margin-top:-5px;"></i> Reset
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!-- BUTTON TRANSAKSI BARU -->
                        <a href="{{ route('pesananOfflineAdmin') }}"
                            class="btn btn-success rounded-pill d-flex align-items-center gap-2 px-4"
                            style="height:44px; font-weight:600; white-space:nowrap;">
                           
                            Transaksi Baru
                        </a>
                    </div>


                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 text-center align-middle">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Total Produk</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody id="orderTable">
                                    @foreach ($orders as $index => $order)
                                    <tr data-id="{{ $order->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->no_pesanan }}</td>
                                        <td>{{ $order->items->sum('quantity') }} Pcs</td>
                                        <td>
                                            <a href="javascript:void(0);"
                                                class="btn-action waves-effect waves-blue btn-detail"
                                                data-bs-toggle="modal"
                                                data-bs-target="#stokDetailModal"
                                                data-id="{{ $order->id }}"
                                                data-nama="{{ $order->address->nama_penerima ?? '-' }}"
                                                data-telepon="{{ $order->address->nomor_hp ?? '-' }}"
                                                data-jalan="{{ $order->address->jalan ?? '-' }}"
                                                data-kelurahan="{{ $order->address->kelurahan ?? '-' }}"
                                                data-kecamatan="{{ $order->address->kecamatan ?? '-' }}"
                                                data-status="{{ $order->metode_pembayaran }}"
                                                data-total="{{ $order->total_harga }}"
                                                title="Lihat Detail Pesanan">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div>


                            <!-- Modal Detail Stok -->
                            <div class="modal fade" id="stokDetailModal" tabindex="-1" aria-labelledby="stokDetailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content rounded-4 shadow-lg border-0">
                                        <!-- Header -->
                                        <div class="modal-header bg-primary text-white rounded-top-4">
                                            <h5 class="modal-title fw-semibold" id="stokDetailModalLabel">
                                                Detail Pesanan
                                            </h5>
                                            <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                                <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                            </button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body p-4">

                                            <!-- Produk Dipesan -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary mb-3">Produk Dipesan</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr class="text-center">
                                                                <th>Gambar</th>
                                                                <th>Nama Produk</th>
                                                                <th>Size</th>
                                                                <th>Jumlah</th>
                                                                <th>Harga</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="detail-produk-body">
                                                            <!-- Diisi via JS -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Total dan Status -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold text-primary mb-2">Metode Pembayaran</h6>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <span id="detail-status"
                                                            class="fw-bold text-dark"
                                                            style="font-size: 20px; letter-spacing: 0.5px;">-</span>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 text-end">
                                                    <h6 class="fw-bold text-primary mb-2">Total Pembayaran</h6>
                                                    <h4 class="fw-bold text-success" id="detail-total">Rp0</h4>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
                                                <i class="zmdi zmdi-close me-1"></i> Tutup
                                            </button>
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
    <!-- menampilkan detail -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-detail').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const status = this.dataset.status;
                    const total = this.dataset.total;

                    // Isi data user langsung dari data-attribute


                    const statusEl = document.getElementById('detail-status');
                    statusEl.textContent = status.charAt(0).toUpperCase() + status.slice(1);


                    // Total harga
                    document.getElementById('detail-total').textContent = 'Rp' + parseInt(total).toLocaleString('id-ID');

                    // Ambil detail produk via AJAX
                    fetch(`/admin/orders/${id}/items`)
                        .then(res => res.json())
                        .then(data => {
                            const tbody = document.getElementById('detail-produk-body');
                            tbody.innerHTML = '';

                            data.items.forEach(item => {
                                tbody.innerHTML += `
                                <tr>
                                    <td class="text-center">
                                        <img src="${item.gambar}" alt="${item.nama}" class="img-thumbnail rounded-3" style="width: 60px;">
                                    </td>
                                    <td>${item.nama}</td>
                                    <td class="text-center">${item.size}</td>
                                    <td class="text-center">${item.jumlah}</td>
                                    <td>Rp${parseInt(item.harga).toLocaleString('id-ID')}</td>
                                    <td>Rp${parseInt(item.subtotal).toLocaleString('id-ID')}</td>
                                </tr>
                            `;
                            });
                        })
                        .catch(err => {
                            console.error('Gagal mengambil data produk:', err);
                        });
                });
            });
        });
    </script>


    @endpush

</x-layout-admin>