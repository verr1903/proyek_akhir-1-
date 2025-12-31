<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"></h5>

                    </div>

                    <!-- Ringkasan Bulanan -->
                    <div class="card shadow-sm rounded-4 border-0">
                        <div class="body table-responsive p-3">
                            <table class="table table-hover m-b-0 text-center align-middle" id="tabelRingkasan">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan / Tahun</th>
                                        <th>Total Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ringkasanBulanan as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="text-primary fw-semibold bulan-item" style="cursor:pointer;"
                                            data-bulan="{{ $item->bulan }}"
                                            data-tahun="{{ $item->tahun }}">
                                            {{ \Carbon\Carbon::create()->month($item->bulan)->translatedFormat('F') }}
                                            {{ $item->tahun }}
                                        </td>
                                        <td class="text-success fw-bold">
                                            Rp {{ number_format($item->total_penjualan, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-muted">Belum ada data penjualan</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <!-- Tabel Detail Penjualan Bulanan -->
                    <div class="card shadow-sm rounded-4 border-0 mt-4 d-none" id="orderCard">
                        <div class="body table-responsive p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <h6 class="fw-bold">Order Bulan <span id="labelBulan"></span></h6>
                                <button class="btn btn-danger btn-rounded waves-effect my-3 py-2 px-3 shadow-sm fw-semibold"
                                    style="border-radius: 30px; transition: all 0.3s ease;" id="btnKembali">
                                    ← Kembali
                                </button>
                            </div>

                            <table class="table table-hover text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No Pesanan</th>
                                        <th>Tempat</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="orderBody"></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Order Items -->
                    <div class="modal fade" id="orderItemModal" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4">
                                <div class="modal-header bg-primary text-white rounded-top-4">
                                    <h5 class="modal-title fw-semibold" id="stokDetailModalLabel">
                                        Detail Order <span id="modalNoPesanan"></span>
                                    </h5>
                                    <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                        <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div id="modalLoading" class="text-center py-4">
                                        <div class="spinner-border text-primary"></div>
                                    </div>

                                    <div id="modalContent" class="d-none">
                                        <table class="table table-bordered text-center align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Produk</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="modalOrderItems"></tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Cetak Excel Range -->
                    <div class="card shadow-sm rounded-4 border-0 mb-4">
                        <div class="body p-4">

                            <h6 class="fw-bold mb-3">
                                <i class="zmdi zmdi-file-text text-success me-1"></i>
                                Cetak Laporan Penjualan (Range Tanggal)
                            </h6>

                            <!-- Filter -->
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Dari Tanggal</label>
                                    <input type="date" id="tanggalDari" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Sampai Tanggal</label>
                                    <input type="date" id="tanggalSampai" class="form-control">
                                </div>

                                <div class="col-md-4 d-flex gap-2">
                                    <button class="btn btn-primary w-100" id="btnFilterRange">
                                        <i class="zmdi zmdi-search me-1"></i> Tampilkan
                                    </button>

                                    <a href="#" class="btn btn-success w-100 disabled" id="btnCetakExcel">
                                        <i class="zmdi zmdi-download me-1"></i> Cetak Excel
                                    </a>
                                </div>
                            </div>

                            <!-- Tabel Preview -->
                            <div class="table-responsive mt-4 d-none" id="rangeTableWrapper">
                                <table class="table table-hover text-center align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Pesanan</th>
                                            <th>Tempat</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rangeTableBody"></tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <th colspan="4" class="text-end">Total</th>
                                            <th class="text-success fw-bold" id="totalRange"></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    @push('scripts')

    <!-- card pertama -->
    <script>
        document.querySelectorAll('.bulan-item').forEach(el => {
            el.addEventListener('click', () => {
                const bulan = el.dataset.bulan;
                const tahun = el.dataset.tahun;

                fetch(`/admin/laporan/bulan?bulan=${bulan}&tahun=${tahun}`)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('orderBody').innerHTML = '';
                        document.getElementById('labelBulan').innerText = el.innerText;

                        data.forEach((order, i) => {
                            document.getElementById('orderBody').innerHTML += `
        <tr 
            data-id="${order.id}" 
            data-no="${order.no_pesanan}"
            class="order-row" 
            style="cursor:pointer"
        >
            <td>${i + 1}</td>
             <td>${new Date(order.created_at).toLocaleDateString('id-ID')}</td>
            <td>${order.no_pesanan}</td>
                <td>${order.tempat_pesanan ?? '-'}</td>
            <td class="text-success fw-bold">
                Rp ${Number(order.total_harga).toLocaleString('id-ID')}
            </td>
           
        </tr>
    `;
                        });


                        document.getElementById('tabelRingkasan').closest('.card').classList.add('d-none');
                        document.getElementById('orderCard').classList.remove('d-none');
                    });
            });
        });

        // 🔹 Klik order → load order item
        document.addEventListener('click', function(e) {
            const row = e.target.closest('.order-row');
            if (!row) return;

            const orderId = row.dataset.id;
            if (!orderId) return; // ⬅️ PENTING

            const noPesanan = row.dataset.no;

            document.getElementById('modalNoPesanan').innerText = noPesanan;
            document.getElementById('modalOrderItems').innerHTML = '';
            document.getElementById('modalLoading').classList.remove('d-none');
            document.getElementById('modalContent').classList.add('d-none');

            const modal = new bootstrap.Modal(document.getElementById('orderItemModal'));
            modal.show();

            fetch(`/admin/laporan/order-items/${orderId}`)
                .then(res => res.json())
                .then(items => {
                    let html = '';
                    console.log(items); // 🔍 cek isi response
                    if (items.length === 0) {
                        html = `<tr>
                    <td colspan="3" class="text-muted">Tidak ada item</td>
                </tr>`;
                    } else {
                        items.forEach(i => {
                            html += `<tr>
                        <td>${i.nama}</td>
                        <td>${i.quantity}</td>
                        <td>Rp ${Number(i.subtotal).toLocaleString('id-ID')}</td>
                    </tr>`;
                        });
                    }

                    document.getElementById('modalOrderItems').innerHTML = html;
                    document.getElementById('modalLoading').classList.add('d-none');
                    document.getElementById('modalContent').classList.remove('d-none');
                });
        });


        // 🔹 Kembali
        document.getElementById('btnKembali').addEventListener('click', () => {
            document.getElementById('orderCard').classList.add('d-none');
            document.getElementById('tabelRingkasan').closest('.card').classList.remove('d-none');
        });
    </script>

    <!-- card kedua -->
    <script>
        document.getElementById('btnFilterRange').addEventListener('click', () => {
            const dari = document.getElementById('tanggalDari').value;
            const sampai = document.getElementById('tanggalSampai').value;

            if (!dari || !sampai) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tanggal belum lengkap',
                    text: 'Silakan pilih range tanggal terlebih dahulu',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            fetch(`/admin/laporan/range?dari=${dari}&sampai=${sampai}`)
                .then(res => res.json())
                .then(data => {
                    let html = '';
                    let total = 0;

                    if (data.length === 0) {
                        html = `
                        <tr>
                            <td colspan="5" class="text-muted text-center">
                                Tidak ada data pada range ini
                            </td>
                        </tr>
                    `;

                        // nonaktifkan tombol excel jika kosong
                        document.getElementById('btnCetakExcel').classList.add('disabled');
                    } else {
                        data.forEach((item, i) => {
                            total += Number(item.total_harga);
                            html += `
                            <tr>
                                <td>${i + 1}</td>
                                <td>${new Date(item.created_at).toLocaleDateString('id-ID')}</td>
                                <td>${item.no_pesanan}</td>
                                <td>${item.tempat_pesanan ?? '-'}</td>
                                <td class="text-success fw-bold">
                                    Rp ${Number(item.total_harga).toLocaleString('id-ID')}
                                </td>
                            </tr>
                        `;
                        });

                        // aktifkan tombol excel
                        const excelBtn = document.getElementById('btnCetakExcel');
                        excelBtn.classList.remove('disabled');
                        excelBtn.href = `/admin/laporan/export-excel?dari=${dari}&sampai=${sampai}`;
                    }

                    document.getElementById('rangeTableBody').innerHTML = html;
                    document.getElementById('totalRange').innerText =
                        `Rp ${total.toLocaleString('id-ID')}`;

                    document.getElementById('rangeTableWrapper').classList.remove('d-none');
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal memuat data',
                        text: 'Terjadi kesalahan saat mengambil data laporan',
                        confirmButtonText: 'Tutup'
                    });
                });
        });
    </script>


    @endpush


</x-layout-admin>