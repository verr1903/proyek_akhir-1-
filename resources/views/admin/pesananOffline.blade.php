<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">
        <div class="container d-flex justify-content-center">
            <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 9000px;">
                <div class="card-header bg-white border-0 px-4 pt-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0">
                        Buat Pesanan
                    </h5>

                </div>

                <div class="card-body px-4 pb-4">
                    <form id="kasirForm" action="javascript:void(0)">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cartBody"></tbody>
                        </table>

                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#produkModal">
                            + Tambah Produk
                        </button>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h4 id="totalHarga">Rp 0</h4>
                        </div>

                        <div class="mt-3">
                            <label for="paymentMethod" class="form-label fw-semibold mb-2">
                                Metode Pembayaran
                            </label>
                            <select
                                class="form-select rounded-3 kategori-select shadow-sm border-1"
                                id="paymentMethod" style="padding: 8px 36px 8px 14px;"
                                required>
                                <option value="" selected disabled>Pilih metode pembayaran</option>
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>
                                <option value="qris">QRIS</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success w-100 mt-4">
                            Konfirmasi Pesanan
                        </button>

                    </form>

                    <div class="modal fade" id="produkModal" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4">
                                <!-- Header -->
                                <div class="modal-header bg-success text-white rounded-top-4">
                                    <h5 class="modal-title fw-semibold" id="stokDetailModalLabel">
                                        Tambah Produk
                                    </h5>
                                    <button type="button" class="btn btn-link p-0 m-0 border-0" data-bs-dismiss="modal" aria-label="Close" style="color: white; font-size: 22px;">
                                        <i class="zmdi zmdi-close-circle" style="font-size: 25px;"></i>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <!-- PILIH PRODUK -->
                                    <div class="mb-3">
                                        <label for="modalProduk" class="form-label fw-semibold mb-2 ">Produk</label>
                                        <select class="form-select rounded-3 kategori-select shadow-sm border-1" style="padding: 8px 36px 8px 14px;" id="modalProduk">
                                            <option value="">Pilih Produk</option>
                                            @foreach($products as $p)
                                            <option
                                                value="{{ $p->id }}"
                                                data-nama="{{ $p->nama }}"
                                                data-harga="{{ $p->harga }}"
                                                data-s="{{ $p->stok_s }}"
                                                data-m="{{ $p->stok_m }}"
                                                data-l="{{ $p->stok_l }}"
                                                data-xl="{{ $p->stok_xl }}">
                                                {{ $p->nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- UKURAN -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Ukuran</label>
                                        <div class="d-flex">
                                            <button class="btn btn-outline-dark ukuran-btn" data-size="S">S</button>
                                            <button class="btn btn-outline-dark ukuran-btn" data-size="M">M</button>
                                            <button class="btn btn-outline-dark ukuran-btn" data-size="L">L</button>
                                            <button class="btn btn-outline-dark ukuran-btn" data-size="XL">XL</button>
                                        </div>
                                        <div class="mt-2 text-muted small" id="stokInfo">Stok: -</div>
                                    </div>

                                    <!-- JUMLAH -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Jumlah</label>
                                        <input type="number" min="1" class="form-control" id="modalJumlah">
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-success" id="simpanProduk">
                                        Tambahkan ke Pesanan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        /* Perbaikan tampilan agar tidak menumpuk dan tetap rapi */
        .produk-item {
            background-color: #f8f9fa;
            transition: all 0.2s ease;
        }

        .produk-item:hover {
            background-color: #f1f3f4;
        }

        .form-control {
            border-radius: 20px;
            padding: 10px 14px;
        }

        .close-footer {
            transition: all 0.3s ease;
            border-color: #6c757d;
            /* warna default bootstrap */
            color: #6c757d;
        }

        .close-footer:hover {
            background-color: #dc3545;
            /* merah bootstrap */
            border-color: #dc3545;
            color: #fff;
            /* teks putih agar kontras */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .produk-item {
            position: relative !important;
            /* <-- pastikan ini aktif */
            background-color: #f8f9fa;
            transition: all 0.2s ease;
            border-radius: 15px;
            padding-top: 40px;
            /* kasih sedikit ruang agar X tidak nabrak isi */
        }

        .remove-produk {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #dc3545;
            background-color: transparent;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
            line-height: 1;
            z-index: 10;
            /* pastikan di atas elemen lain */
        }


        .remove-produk:hover {
            color: #fff;
            background-color: #dc3545;
            transform: scale(1.1);
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
        }


        @media (max-width: 576px) {
            .form-row {
                flex-direction: column;
            }

            .form-row .form-group {
                width: 100%;
            }
        }
    </style>
    @endpush

    @push('scripts')

    <script>
        let selectedSize = null;
        let editRow = null;
        let selectedStock = 0;

        const modalProduk = document.getElementById("modalProduk");
        const stokInfo = document.getElementById("stokInfo");
        const cartBody = document.getElementById("cartBody");
        const totalHarga = document.getElementById("totalHarga");

        function formatRupiah(num) {
            return "Rp " + num.toLocaleString("id-ID");
        }

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll(".subtotal").forEach(el => {
                total += parseInt(el.dataset.value);
            });
            totalHarga.textContent = formatRupiah(total);
        }

        /* === PILIH UKURAN === */
        document.querySelectorAll(".ukuran-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                document.querySelectorAll(".ukuran-btn").forEach(b => {
                    b.classList.remove("btn-success");
                    b.classList.add("btn-outline-dark");
                });

                this.classList.remove("btn-outline-dark");
                this.classList.add("btn-success");

                selectedSize = this.dataset.size;

                const opt = modalProduk.selectedOptions[0];
                selectedStock = opt ? parseInt(opt.dataset[selectedSize.toLowerCase()]) : 0;

                stokInfo.textContent = "Stok: " + selectedStock;
            });
        });

        document.getElementById("simpanProduk").addEventListener("click", () => {
            const opt = modalProduk.selectedOptions[0];
            const jumlah = parseInt(document.getElementById("modalJumlah").value);

            if (!opt || !selectedSize || !jumlah) {
                alert("Lengkapi produk, ukuran, dan jumlah");
                return;
            }

            if (jumlah > selectedStock) {
                alert("Jumlah melebihi stok");
                return;
            }

            const harga = parseInt(opt.dataset.harga);
            const subtotal = harga * jumlah;

            /* === MODE EDIT === */
            if (editRow) {
                editRow.innerHTML = `
            <td>${opt.dataset.nama}</td>
            <td>${selectedSize}</td>
            <td>${jumlah}</td>
            <td>${formatRupiah(harga)}</td>
            <td class="subtotal" data-value="${subtotal}">
                ${formatRupiah(subtotal)}
            </td>
             <td>
                        <a type="button" class="btn-action edit waves-effect waves-yellow" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>                                            
                        <a type="button" class="btn-action hapus waves-effect waves-red " title="Edit">
                            <i class="zmdi zmdi-delete"></i>
                        </a>                                                                 
                    </td>
        `;
                editRow = null;
            }
            /* === MODE TAMBAH === */
            else {
                const row = document.createElement("tr");
                row.dataset.productId = opt.value;
                row.innerHTML = `
                    <td>${opt.dataset.nama}</td>
                    <td>${selectedSize}</td>
                    <td>${jumlah}</td>
                    <td>${formatRupiah(harga)}</td>
                    <td class="subtotal" data-value="${subtotal}">
                        ${formatRupiah(subtotal)}
                    </td>
                    <td>
                        <a type="button" class="btn-action edit waves-effect waves-yellow" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>                                            
                        <a type="button" class="btn-action hapus waves-effect waves-red " title="Edit">
                            <i class="zmdi zmdi-delete"></i>
                        </a>                                                                 
                    </td>
                `;
                cartBody.appendChild(row);
            }

            hitungTotal();

            bootstrap.Modal.getInstance(document.getElementById("produkModal")).hide();

            // reset modal
            modalProduk.selectedIndex = 0;
            document.getElementById("modalJumlah").value = "";
            stokInfo.textContent = "Stok: -";
            selectedSize = null;
        });


        /* === HAPUS ITEM === */
        cartBody.addEventListener("click", (e) => {
            if (e.target.classList.contains("hapus")) {
                e.target.closest("tr").remove();
                hitungTotal();
            }
        });

        cartBody.addEventListener("click", (e) => {

            /* === EDIT === */
            if (e.target.classList.contains("edit")) {
                editRow = e.target.closest("tr");

                const namaProduk = editRow.children[0].textContent;
                const ukuran = editRow.children[1].textContent;
                const jumlah = editRow.children[2].textContent;

                // pilih produk sesuai nama
                [...modalProduk.options].forEach(opt => {
                    if (opt.dataset.nama === namaProduk) {
                        opt.selected = true;
                    }
                });

                // set ukuran
                document.querySelectorAll(".ukuran-btn").forEach(btn => {
                    btn.classList.remove("btn-success");
                    btn.classList.add("btn-outline-dark");

                    if (btn.dataset.size === ukuran) {
                        btn.classList.remove("btn-outline-dark");
                        btn.classList.add("btn-success");
                        selectedSize = ukuran;

                        const opt = modalProduk.selectedOptions[0];
                        selectedStock = parseInt(opt.dataset[ukuran.toLowerCase()]);
                        stokInfo.textContent = "Stok: " + selectedStock;
                    }
                });

                document.getElementById("modalJumlah").value = jumlah;

                new bootstrap.Modal(document.getElementById("produkModal")).show();
            }

            /* === HAPUS === */
            if (e.target.classList.contains("hapus")) {
                e.target.closest("tr").remove();
                hitungTotal();
            }
        });
    </script>

    <!-- co -->
    <script>
        document.getElementById('kasirForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const paymentMethod = document.getElementById('paymentMethod').value;

            if (!paymentMethod) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Metode pembayaran kosong',
                    text: 'Silakan pilih metode pembayaran terlebih dahulu',
                    confirmButtonColor: '#198754'
                });
                return;
            }

            const items = [];

            document.querySelectorAll('#cartBody tr').forEach(row => {
                items.push({
                    product_id: row.dataset.productId,
                    size: row.children[1].innerText,
                    quantity: parseInt(row.children[2].innerText)
                });
            });

            if (items.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pesanan kosong',
                    text: 'Tambahkan minimal satu produk',
                    confirmButtonColor: '#198754'
                });
                return;
            }

            // 🔔 KONFIRMASI DULU
            Swal.fire({
                title: 'Konfirmasi Pesanan',
                text: 'Apakah Anda yakin ingin pesanan telah selesai, dan pastikan duit sudah diterima?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (!result.isConfirmed) return;

                // ⏳ LOADING
                Swal.fire({
                    title: 'Memproses...',
                    text: 'Mohon tunggu',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // 🚀 KIRIM DATA
                fetch("{{ route('pesananOffline.coOffline') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            items,
                            metode_pembayaran: paymentMethod
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (!res.success) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message || 'Terjadi kesalahan',
                                confirmButtonColor: '#dc3545'
                            });
                            return;
                        }

                        // ✅ BERHASIL
                        Swal.fire({
                            icon: 'success',
                            title: 'Pesanan Berhasil!',
                            text: `No Pesanan: ${res.no_pesanan}`,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#198754'
                        }).then(() => {
                            window.location.href = "{{ route('pesananOffline.index') }}";
                        });
                    })
                    .catch(err => {
                        console.error(err);
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan Sistem',
                            text: 'Terjadi kesalahan pada server',
                            confirmButtonColor: '#dc3545'
                        });
                    });
            });
        });
    </script>




    @endpush



</x-layout-admin>