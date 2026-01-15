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
                        <form action="{{ route('pesananOnlineAdmin') }}" method="GET" class="w-100">
                            <div class="d-flex flex-wrap align-items-center gap-3 py-2">

                                <!-- Search -->
                                <div class="flex-grow-1 min-w-0">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control border-0 rounded-pill"
                                        placeholder="Cari pesanan (nama atau no pesanan)..."
                                        style="height:44px; font-size:14px; min-width:150px; padding-left:18px;">
                                </div>

                                <!-- Sort -->
                                <select name="sort" class="form-select mx-1 form-select-sm border-0 bg-white text-dark rounded-pill px-2"
                                    style="width:170px; height:44px; font-size:14px;">
                                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tanggal dibuat</option>
                                    <option value="no_pesanan" {{ request('sort') == 'no_pesanan' ? 'selected' : '' }}>No Pesanan</option>
                                    <option value="total_harga" {{ request('sort') == 'total_harga' ? 'selected' : '' }}>Total Harga</option>
                                    <option value="status" {{ request('sort') == 'status' ? 'selected' : '' }}>Status</option>
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
                                    <a href="{{ route('pesananOnlineAdmin') }}" class="btn mx-1 btn-light border rounded-pill d-flex align-items-center text-muted"
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
                            <table class="table table-hover m-b-0 text-center align-middle">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Total Produk</th>
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
                                            <button
                                                class="btn btn-outline-success btn-sm rounded-pill px-3 py-1 fw-semibold shadow-sm btn-diterima"
                                                data-id="{{ $order->id }}"
                                                data-metode="{{ $order->metode_pembayaran }}"
                                                data-total="{{ $order->total_harga }}"
                                            >
                                                <i class="zmdi zmdi-check-circle me-1"></i> Diterima
                                            </button>
                                            @else
                                            <button 
    class="btn btn-outline-success btn-sm rounded-pill px-3 py-1 fw-semibold btn-lihat-bukti"
    data-bukti="{{ asset('storage/' . $order->bukti_pengiriman) }}"
>
    <i class="zmdi zmdi-image"></i> Bukti
</button>

                                            @endif
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
    <!-- menampilkan detail -->
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

    <!-- tombol antar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol "Antar"
            document.querySelectorAll('.btn-antar').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const orderId = row.dataset.id;

                    Swal.fire({
                        title: 'Konfirmasi Pengantaran',
                        text: 'Apakah pesanan ini akan diantar?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Antar Sekarang',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/admin/orders/${orderId}/status`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    },
                                    body: JSON.stringify({
                                        status: 'diantar'
                                    })
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Berhasil!', 'Pesanan telah diantar.', 'success');
                                        // Update tampilan status langsung di tabel
                                        const statusCell = row.querySelector('.status-cell span');
                                        statusCell.textContent = 'Diantar';
                                        statusCell.className = 'badge status-badge bg-primary text-white';
                                        // Ganti tombol aksi jadi "Diterima"
                                       row.querySelector('.action-cell').innerHTML = `
                                        <button
                                            class="btn btn-outline-success btn-sm rounded-pill px-3 py-1 fw-semibold shadow-sm btn-diterima"
                                            data-id="${orderId}"
                                            data-metode="${data.metode_pembayaran}"
                                            data-total="${data.total_harga}"
                                        >
                                            <i class="zmdi zmdi-check-circle me-1"></i> Diterima
                                        </button>
                                        `;

                                        attachDiterimaHandler(); // pasang ulang listener tombol baru
                                    } else {
                                        Swal.fire('Gagal', data.message || 'Terjadi kesalahan.', 'error');
                                    }
                                })
                                .catch(err => {
                                    console.error(err);
                                    Swal.fire('Error', 'Tidak dapat memperbarui status.', 'error');
                                });
                        }
                    });
                });
            });

            // Fungsi untuk pasang event listener ke tombol "Diterima"
           function attachDiterimaHandler() {
    document.querySelectorAll('.btn-diterima').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const orderId = this.dataset.id;
            const metode = this.dataset.metode;
            const total = parseInt(this.dataset.total || 0);

            let title = 'Konfirmasi Pesanan';
            let text = 'Pastikan pesanan sudah diterima oleh pelanggan';
            let icon = 'question';

            // 👉 KONDISI COD
            if (metode === 'cod') {
                title = 'Terima Pembayaran COD';
                text = `Terima pembayaran dari pembeli sebesar Rp ${total.toLocaleString('id-ID')}`;
                icon = 'warning';
            }

            Swal.fire({
    title: 'Selesaikan Pesanan',
    html: `
        <div style="text-align:center">
            <label class="fw-semibold mb-1">Upload Bukti Pengiriman</label>
            <input type="file" id="bukti_pengiriman" class="swal2-file mb-2" accept="image/*">

            <div class="text-center" style="text-align:center">
                <img id="preview_bukti"
     src=""
     alt="Preview"
     style="
        display:none;
        max-width:100%;
        max-height:220px;
        margin:10px auto;
        display:block;
     ">

            </div>
        </div>
    `,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Ya, Selesaikan Pesanan',
    cancelButtonText: 'Batal',
    confirmButtonColor: '#198754',
    cancelButtonColor: '#d33',

    didOpen: () => {
        const input = document.getElementById('bukti_pengiriman');
        const preview = document.getElementById('preview_bukti');

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    },

    preConfirm: () => {
        const file = document.getElementById('bukti_pengiriman').files[0];
        if (!file) {
            Swal.showValidationMessage('Bukti pengiriman wajib diupload');
            return false;
        }
        return file;
    }
}).then((result) => {
    if (result.isConfirmed) {
        const formData = new FormData();
        formData.append('status', 'selesai');
        formData.append('bukti_pengiriman', result.value);

        fetch(`/admin/orders/${orderId}/status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'),
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire('Selesai!', 'Pesanan berhasil diselesaikan.', 'success');

                const statusCell = row.querySelector('.status-cell span');
                statusCell.textContent = 'Selesai';
                statusCell.className = 'badge status-badge bg-success text-white';

                row.querySelector('.action-cell').innerHTML =
                    '<span class="text-success fw-semibold">Pesanan Selesai</span>';
            } else {
                Swal.fire('Gagal', data.message || 'Terjadi kesalahan.', 'error');
            }
        })
        .catch(() => {
            Swal.fire('Error', 'Tidak dapat memperbarui status.', 'error');
        });
    }
});

        });
    });
}

            // Panggil untuk pertama kali
            attachDiterimaHandler();
        });
    </script>

    <!-- butki pengiriman -->
     <script>
document.addEventListener('click', function (e) {
    if (e.target.closest('.btn-lihat-bukti')) {
        const button = e.target.closest('.btn-lihat-bukti');
        const bukti = button.dataset.bukti;

       Swal.fire({
            title: 'Bukti Pengiriman',
            imageUrl: bukti,
            imageAlt: 'Bukti Pengiriman',
            showCloseButton: true,
            confirmButtonText: 'Tutup',
            confirmButtonColor: '#198754',
            imageWidth: '100%',
            didOpen: () => {
                const img = document.querySelector('.swal2-image');
                if (img) {
                    img.style.marginTop = '30px';
                    img.style.padding = '20px';
                }
            }
        });

    }
});
</script>

    @endpush

</x-layout-admin>