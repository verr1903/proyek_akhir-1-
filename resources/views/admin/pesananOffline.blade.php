<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">
        <div class="container d-flex justify-content-center">
            <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 800px;">
                <div class="card-header bg-white border-0 px-4 pt-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0">
                        Buat Pesanan
                    </h5>
                    <button id="addProductBtn" type="button"
                        class="btn btn-sm btn-success rounded-pill fw-semibold shadow-sm px-3 py-1">
                        <i class="zmdi zmdi-plus me-1"></i> Tambah Produk
                    </button>
                </div>

                <div class="card-body px-4 pb-4">
                    <form id="orderForm">
                        <div id="produkContainer">
                            <!-- Produk Item -->
                            <div class="produk-item border rounded-4 p-3 mb-3 bg-light position-relative">
                                <i class="remove-produk close-footer zmdi zmdi-close-circle"
                                    type="button" aria-label="Close" style="font-size: 25px;padding: 7px 10px;border-radius: 30px;margin-top: -10px;margin-left: 690px;"></i>
                                <div class="form-group mb-3">
                                    <label class="fw-semibold text-secondary">Nama Produk</label>
                                   <select class="form-control produk-nama">
                                        <option value="" disabled selected>Pilih Produk</option>
                                        @foreach ($products as $product)
                                            <option 
                                                value="{{ $product->id }}"
                                                data-harga="{{ $product->harga_setelah_diskon ?? $product->harga }}">
                                                {{ $product->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="fw-semibold text-secondary">Jumlah</label>
                                        <input type="number" min="1" placeholder="Masukkan jumlah"
                                            class="form-control produk-jumlah px-2  ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="fw-semibold text-secondary">Ukuran</label>
                                        <select class="form-control produk-ukuran px-2" style="margin-top: -6px;width: 800px;margin-left: -10px;">
                                            <option value="" selected disabled>Pilih ukuran...</option>
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="form-group mb-3">
                            <label class="fw-semibold text-secondary">Metode Pembayaran</label>
                            <select class="form-control">
                                <option value="" selected disabled>Pilih metode pembayaran...</option>
                                <option>Tunai</option>
                                <option>Transfer Bank</option>
                                <option>QRIS</option>
                            </select>
                        </div>

                        <!-- Total -->
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <h6 class="fw-semibold text-dark mb-0">Total :</h6>
                            <h5 id="totalHarga" class="fw-bold text-success mb-0">Rp 0,00</h5>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-4 text-center">
                            <button type="button" id="submitOrder" class="btn btn-success w-100 rounded-pill py-2 fw-semibold shadow-sm">
                                <i class="zmdi zmdi-check me-2"></i> Buat Pesanan
                            </button>
                        </div>
                    </form>
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
        const produkContainer = document.getElementById('produkContainer');
        const addProductBtn = document.getElementById('addProductBtn');
        const totalHargaEl = document.getElementById('totalHarga');

        function formatRupiah(angka) {
            return 'Rp ' + angka.toLocaleString('id-ID') + ',00';
        }

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('.produk-item').forEach(item => {
                const select = item.querySelector('.produk-nama');
                const harga = parseInt(select.options[select.selectedIndex]?.dataset.harga || 0);
                const jumlah = parseInt(item.querySelector('.produk-jumlah').value) || 0;
                total += harga * jumlah;
            });
            totalHargaEl.textContent = formatRupiah(total);
        }

        addProductBtn.addEventListener('click', () => {
            const clone = produkContainer.querySelector('.produk-item').cloneNode(true);
            clone.querySelectorAll('input, select').forEach(el => el.value = '');
            produkContainer.appendChild(clone);
            hitungTotal();
        });

        document.addEventListener('input', e => {
            if (e.target.classList.contains('produk-nama') || e.target.classList.contains('produk-jumlah')) {
                hitungTotal();
            }
        });

        document.addEventListener('click', e => {
            if (e.target.classList.contains('remove-produk')) {
                const items = document.querySelectorAll('.produk-item');
                if (items.length > 1) {
                    e.target.closest('.produk-item').remove();
                    hitungTotal();
                }
            }
        });

        hitungTotal();
    </script>

    <!-- submit -->
     <script>
        document.getElementById('submitOrder').addEventListener('click', function () {

            let produkData = [];

            document.querySelectorAll('.produk-item').forEach(item => {
                produkData.push({
                    id_product: item.querySelector('.produk-nama').value,
                    jumlah: item.querySelector('.produk-jumlah').value,
                    ukuran: item.querySelector('.produk-ukuran').value,
                });
            });

            const metode = document.querySelector('select[name="metode_pembayaran"]').value;
            const total = document.getElementById('totalHarga').textContent.replace(/[^0-9]/g, '');

            fetch("{{ route('pesananOffline.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    produk: produkData,
                    metode_pembayaran: metode,
                    total_harga: total
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: data.message
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        });
    </script>

    @endpush
</x-layout-admin>