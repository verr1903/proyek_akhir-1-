<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"></h5>
                    </div>

                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 text-center align-middle">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Total Pesanan</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
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
                                                data-status="{{ $order->status }}"
                                                data-total="{{ $order->total_harga }}"
                                                title="Lihat Detail Pesanan">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </td>

                                        <td class="status-cell">
                                            <span class="badge status-badge 
                                        @if($order->status === 'diproses') bg-info
                                        @elseif($order->status === 'diantar') bg-primary
                                        @elseif($order->status === 'selesai') bg-success
                                        @endif
                                        text-white">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="action-cell">
                                            @if ($order->status == 'diproses')
                                            <button class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1 fw-semibold shadow-sm btn-antar">
                                                <i class="zmdi zmdi-truck me-1"></i> Antar
                                            </button>
                                            @elseif ($order->status == 'diantar')
                                            <button class="btn btn-outline-success btn-sm rounded-pill px-3 py-1 fw-semibold shadow-sm btn-diterima" data-id="{{ $order->id }}">
                                                <i class="zmdi zmdi-check-circle me-1"></i> Diterima
                                            </button>
                                            @else
                                            <span class="text-success fw-semibold">Pesanan Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


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
                                            <!-- Informasi Pembeli -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary mb-3">Informasi Pembeli</h6>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <p class="mb-1"><strong>Nama Penerima:</strong> <span id="detail-nama">-</span></p>
                                                        <p class="mb-1"><strong>No. Telepon:</strong> <span id="detail-telepon">-</span></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1"><strong>Alamat Pengiriman:</strong></p>
                                                        <p class="small text-muted mb-0" id="detail-alamat">-</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

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
                                                    <h6 class="fw-bold text-primary mb-3">Status Pesanan</h6>
                                                    <span id="detail-status" class="badge status-badge text-white bg-secondary">-</span>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-detail').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const nama = this.dataset.nama;
                    const telepon = this.dataset.telepon;
                    const jalan = this.dataset.jalan;
                    const kelurahan = this.dataset.kelurahan;
                    const kecamatan = this.dataset.kecamatan;
                    const status = this.dataset.status;
                    const total = this.dataset.total;
                    const alamatLengkap = `Jln. ${jalan}, Kel. ${kelurahan}, Kec. ${kecamatan}`;
                    // Isi data user langsung dari data-attribute
                    document.getElementById('detail-nama').textContent = nama;
                    document.getElementById('detail-telepon').textContent = telepon;
                    document.getElementById('detail-alamat').textContent = alamatLengkap;

                    // Status badge
                    const statusEl = document.getElementById('detail-status');
                    statusEl.textContent = status.charAt(0).toUpperCase() + status.slice(1);
                    statusEl.className = 'badge status-badge text-white';
                    if (status === 'diproses') statusEl.classList.add('bg-info');
                    else if (status === 'diantar') statusEl.classList.add('bg-primary');
                    else if (status === 'selesai') statusEl.classList.add('bg-success');
                    else statusEl.classList.add('bg-secondary');

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