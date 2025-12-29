<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"></h5>
                        <button type="button"
                            class="btn btn-success btn-rounded waves-effect py-2 px-3 shadow-sm fw-semibold"
                            style="border-radius: 30px; transition: all 0.3s ease;">
                            <i class="zmdi zmdi-file-text me-1"></i> Cetak Excel
                        </button>
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
                                        <th>No Pesanan</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
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


                </div>
            </div>
        </div>

    </section>

    @push('scripts')
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
            <td>${order.no_pesanan}</td>
            <td class="text-success fw-bold">
                Rp ${Number(order.total_harga).toLocaleString('id-ID')}
            </td>
            <td>${new Date(order.created_at).toLocaleDateString('id-ID')}</td>
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
    @endpush


</x-layout-admin>