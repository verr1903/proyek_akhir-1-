<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">




        <x-header-client></x-header-client>

        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/clientAssets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>


        <!--Shop Single Start-->
        <div class="shop-single-page section-padding-4 mb-5 desktop-view">
            <div class="container">

                <div class="card rounded-3  shadow-sm mb-4">
                    <div class="table-responsive rounded-3">
                        <table class="table table-bordered align-middle text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Checkout</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($carts as $cart)
                                <tr data-cart-id="{{ $cart->id }}">
                                    <td class="py-4">
                                        <a href="{{ route('detail', $cart->product->encrypted_id) }}">
                                            <img src="{{ asset('storage/' . $cart->product->gambar) }}"
                                                alt="{{ $cart->product->nama }}"
                                                class="img-thumbnail"
                                                style="width:70px; height:80px; object-fit:cover;">
                                        </a>
                                    </td>

                                    <td class="py-4 text-start">
                                        <a href="{{ route('detail', $cart->product->encrypted_id) }}">
                                            <strong>{{ $cart->product->nama }}</strong><br>
                                            <small class="text-muted">Kategori: {{ $cart->product->kategori }}</small>
                                        </a>
                                    </td>

                                    <td class="py-4">
    @if ($cart->product->discount)
        <span class="text-danger fw-bold">
            Rp {{ number_format($cart->harga_diskon, 0, ',', '.') }}
        </span><br>
        <span class="text-muted text-decoration-line-through small">
            Rp {{ number_format($cart->product->harga, 0, ',', '.') }}
        </span>
    @else
        Rp {{ number_format($cart->harga_diskon, 0, ',', '.') }}
    @endif
</td>


                                    <td class="py-4 text-center">
                                        <text style="font-size: 16px;">{{ $cart->size }}</text><br>
                                    </td>

                                    <td class="py-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm btn-minus">-</button>
                                            <input type="text" class="form-control form-control-sm text-center mx-1 qty-input"
                                                style="width:50px;" value="{{ $cart->quantity }}" readonly>
                                            <button class="btn btn-outline-secondary btn-sm btn-plus">+</button>
                                        </div>
                                    </td>

                                    <td class="py-4  total-price">
                                        Rp {{ number_format($cart->quantity * $cart->harga_diskon, 0, ',', '.') }}
                                    </td>

                                    <td class="py-4 text-center">
                                        <button class="btn btn-soft-success rounded-4 me-2 pb-5 px-3 shadow-sm toggle-check">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-soft-danger rounded-4 shadow-sm pb-5 px-3 btn-delete"
                                            data-id="{{ $cart->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="py-5 text-center text-muted">
                                        Keranjangmu masih kosong 😢
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card mb-4 rounded-3">
                    <a href="{{ route('lokasi') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-map-marker-alt fa-lg text-danger me-2 mt-1"></i>
                                <div>
                                    @if ($alamatAktif)
                                    <strong>{{ $alamatAktif->nama_penerima }}</strong>
                                    <span class="text-muted">( +62 {{ ltrim($alamatAktif->nomor_hp, '0') }} )</span><br>
                                    {{ $alamatAktif->jalan }},
                                    Kelurahan {{ $alamatAktif->kelurahan }},
                                    Kecamatan {{ $alamatAktif->kecamatan }}.
                                    @else
                                    <span class="text-muted">Belum ada alamat aktif</span><br>
                                    <small>Klik untuk menambahkan alamat pengiriman</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="row g-3 ">
                    <!-- Rincian Pembayaran -->
                    <div class="col-md-6">
                        <div class="card h-100 rounded-3">
                            <div class="card-body">
                                <h5 class="card-title">Rincian Pembayaran</h5>
                                <p class="d-flex justify-content-between mb-1">
                                    <span>Subtotal Produk</span>
                                    <span class="subtotal">Rp 0</span>
                                </p>
                                <p class="d-flex justify-content-between mb-1">
                                    <span>Subtotal Pengiriman</span>
                                    <span class="pengiriman">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between fw-bold mb-0">
                                    <span>Total Pembayaran</span>
                                    <span class="total">Rp 0</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Bagian kanan (metode + tombol aksi) -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <!-- Metode Pembayaran -->
                            <div class="col-md-8">
                                <div class="card rounded-3" style="min-height: 110px;">
                                    <div class="card-body">
                                        <h5 class="card-title pb-1" style="font-weight: 200;">Pilih Metode Pembayaran</h5>
                                        <select id="metode-pembayaran" class="form-select mt-2">
                                            <option selected disabled>Pilih Metode</option>
                                            <option value="bca">Virtual Account (BCA)</option>
                                            <option value="bni">Virtual Account (BNI)</option>
                                            <option value="mandiri">Virtual Account (Mandiri)</option>
                                            <option value="cod">Bayar di Tempat (COD)</option>
                                            <option value="qris">QRIS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="col-md-4">
                                <div class="d-flex flex-column gap-2 h-100 justify-content-between">
                                    <div>
                                        <button class="btn rounded-3  btn-soft-danger w-100 mb-2 pb-5">Bersihkan</button>
                                        <button class="btn rounded-3 btn-soft-success w-100 pb-5">Pilih Semua</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Buat Pesanan -->
                            <div class="col-12 mt-4">
                                <button class="btn rounded-3 btn-soft-success btn-lg w-100 pb-5">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <!--Shop Single End-->


        <div class="mobile-view p-2">
            <div class="card mb-3 rounded-4 shadow-sm">
                <a href="{{ route('lokasi')}}" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <i class="fa fa-map-marker-alt fa-lg text-danger me-2 mt-1"></i>
                            <div>
                                <strong>Budi</strong> <span class="text-muted">( +62 8590850174 )</span><br>
                                Jalan Tegal Sari Ujung, Villamas Permai Blok C No 24, Kelurahan Sri Meranti .......
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 rounded-4 shadow-sm">
                <div class="d-flex align-items-start p-2">
                    <!-- Checkbox -->
                    <input type="checkbox" class="form-check-input fci me-2 mt-2 p-2">

                    <!-- Gambar Produk -->
                    <img src="/clientAssets/images/product/image1.png" class="rounded-3 me-3"
                        style="width: 80px; height: 120px; object-fit: cover;">

                    <!-- Detail Produk -->
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Tshirt Oversize Series “WHOA”</h6>
                        <p class="text-muted small mb-2">Kode: TS-01</p>

                        <!-- Ukuran + Jumlah sejajar -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select form-select-sm"
                                    style="font-size: 15px; padding: 2px 30px 2px 10px; height: 40px; width: auto;">
                                    <option>S</option>
                                    <option>M</option>
                                    <option selected>L</option>
                                    <option>XL</option>
                                </select>

                                <div class="d-flex align-items-center ms-auto">
                                    <button class="btn btn-outline-secondary btn-sm btn-minus px-2">-</button>
                                    <input type="text" class="form-control form-control-sm text-center mx-1 qty-input"
                                        style="width: 40px;" value="2" readonly>
                                    <button class="btn btn-outline-secondary btn-sm btn-plus px-2">+</button>
                                </div>
                            </div>

                            <!-- Harga -->
                            <span class="fw-bold text-danger mt-3" style="font-size: 17px;">Rp80.000</span>
                        </div>
                    </div>



                    <!-- Tombol Hapus -->
                    <button class="btn btn-soft-danger btn-sm ms-2 px-3 d-flex align-items-center justify-content-center rounded-4">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

            </div>

            <div class="card mb-3 rounded-4 shadow-sm">
                <div class="d-flex align-items-start p-2">
                    <!-- Checkbox -->
                    <input type="checkbox" class="form-check-input fci me-2 mt-2 p-2">

                    <!-- Gambar Produk -->
                    <img src="/clientAssets/images/product/image1.png" class="rounded-3 me-3"
                        style="width: 80px; height: 120px; object-fit: cover;">

                    <!-- Detail Produk -->
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Tshirt Oversize Series “WHOA”</h6>
                        <p class="text-muted small mb-2">Kode: TS-01</p>

                        <!-- Ukuran + Jumlah sejajar -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select form-select-sm"
                                    style="font-size: 15px; padding: 2px 30px 2px 10px; height: 40px; width: auto;">
                                    <option>S</option>
                                    <option>M</option>
                                    <option selected>L</option>
                                    <option>XL</option>
                                </select>

                                <div class="d-flex align-items-center ms-auto">
                                    <button class="btn btn-outline-secondary btn-sm btn-minus px-2">-</button>
                                    <input type="text" class="form-control form-control-sm text-center mx-1 qty-input"
                                        style="width: 40px;" value="2" readonly>
                                    <button class="btn btn-outline-secondary btn-sm btn-plus px-2">+</button>
                                </div>
                            </div>

                            <!-- Harga -->
                            <span class="fw-bold text-danger mt-3" style="font-size: 17px;">Rp80.000</span>
                        </div>
                    </div>

                    <!-- Tombol Hapus -->
                    <button class="btn btn-soft-danger btn-sm ms-2 px-3 d-flex align-items-center justify-content-center rounded-4">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

            </div>

            <div class="card mb-3 rounded-4 shadow-sm border-0">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-semibold text-dark">Pilih Metode Pembayaran</h6>
                        <i class="fa fa-chevron-down text-secondary"></i>
                    </div>
                    <small class="text-muted d-block mt-1 ms-2">Virtual Account (BCA)</small>
                </div>
            </div>

            <div class="card shadow-sm border-0 rounded-4 mb-3">
                <div class="card-body p-3">
                    <h6 class="fw-semibold mb-3 text-dark">Rincian Pembayaran</h6>

                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Subtotal Produk</span>
                        <span class="fw-medium text-dark">Rp 20.000,00</span>
                    </div>

                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Subtotal Pengiriman</span>
                        <span class="fw-medium text-dark">Rp 5.000,00</span>
                    </div>

                    <hr class="my-3">

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-dark">Total Pembayaran</span>
                        <span class="fw-bold text-danger fs-6">Rp 25.000,00</span>
                    </div>
                </div>
            </div>



            <!-- Footer Checkout (Sticky di bawah layar) -->
            <!-- Footer Checkout -->
            <div class="checkout-footer fixed-bottom bg-white border-top shadow-sm">
                <!-- Baris Pilih Semua -->
                <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="selectAll" class="form-check-input me-2 fci p-2" style="width:18px; height:18px;">
                        <label for="selectAll" class="mb-0 small text-muted mt-1">Pilih Semua</label>
                    </div>
                    <button class="btn btn-outline-danger btn-sm rounded-3 mt-1">
                        Hapus
                    </button>
                </div>

                <!-- Baris Total + Tombol -->
                <div class="d-flex align-items-center justify-content-between px-3 py-3">
                    <div>
                        <div class="fw-semibold small mb-1">Total <span class="fw-bold text-danger fs-6 mb-0">Rp49.703</span></div>
                    </div>
                    <button class="btn btn-soft-success rounded-3 px-4 pb-4 fw-semibold">
                        Buat Pesanan
                    </button>
                </div>
            </div>


        </div>





        <x-footer-client></x-footer-client>


    </div>

    @push('scripts')

    <script>
        // ambil semua tombol tambah & kurang pada jumlah produk
        document.querySelectorAll('.btn-plus').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value) || 0;
                input.value = value + 1;
            });
        });

        document.querySelectorAll('.btn-minus').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value) || 0;
                if (value > 1) input.value = value - 1; // minimal 1
            });
        });
    </script>

    <!-- atur rincian pembayaran disudut kiri bawah -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const shippingCost = {{ $shippingCost ?? 0 }};

            const subtotalEl = document.querySelector(".subtotal");
            const pengirimanEl = document.querySelector(".pengiriman");
            const totalEl = document.querySelector(".total");

            // Format angka ke Rupiah
            function formatRupiah(value) {
                return "Rp " + value.toLocaleString("id-ID");
            }

            // Fungsi untuk hitung ulang total
            function updateSummary() {
                let subtotal = 0;

                // Hitung subtotal dari produk yang dicentang
                document.querySelectorAll(".toggle-check.active").forEach(btn => {
                    const row = btn.closest("tr");
                    const totalText = row.querySelector(".total-price").textContent;
                    const totalValue = parseInt(totalText.replace(/[^\d]/g, "")) || 0;
                    subtotal += totalValue;
                });

                // 🚀 Selalu gunakan ongkir tetap, walaupun tidak ada produk dipilih
                const pengiriman = shippingCost;

                const total = subtotal + pengiriman;

                subtotalEl.textContent = formatRupiah(subtotal);
                pengirimanEl.textContent = formatRupiah(pengiriman);
                totalEl.textContent = formatRupiah(total);
            }

            // Klik tombol ✅ untuk pilih/deselect produk
            document.querySelectorAll(".toggle-check").forEach(btn => {
                btn.addEventListener("click", () => {
                    btn.classList.toggle("active");
                    updateSummary();
                });
            });

            // Perbarui juga ketika jumlah produk berubah
            document.querySelectorAll(".btn-plus, .btn-minus").forEach(button => {
                button.addEventListener("click", () => {
                    setTimeout(updateSummary, 300);
                });
            });
        });
    </script>



    <!-- update quantity -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.btn-plus, .btn-minus').forEach(button => {
                button.addEventListener('click', async function() {
                    const row = this.closest('tr');
                    const cartId = row.getAttribute('data-cart-id');
                    const action = this.classList.contains('btn-plus') ? 'plus' : 'minus';

                    const response = await fetch("{{ route('cart.updateQuantity') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        body: JSON.stringify({
                            cart_id: cartId,
                            action
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Update tampilan quantity dan total
                        row.querySelector('.qty-input').value = data.quantity;
                        row.querySelector('.total-price').textContent =
                            'Rp ' + new Intl.NumberFormat('id-ID').format(data.total);
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', async function() {
                    const cartId = this.getAttribute('data-id');
                    const row = this.closest('tr');

                    Swal.fire({
                        title: 'Hapus Produk?',
                        text: 'Produk ini akan dihapus dari keranjangmu.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal'
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                const response = await fetch(`/cart/${cartId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken
                                    }
                                });

                                const data = await response.json();

                                if (data.success) {
                                    // Hapus baris dari tabel
                                    row.remove();

                                    // Update total (jika kamu sudah punya fungsi updateSummary)
                                    if (typeof updateSummary === 'function') updateSummary();

                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Dihapus!',
                                        text: data.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: data.message || 'Terjadi kesalahan saat menghapus.'
                                    });
                                }
                            } catch (error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan koneksi.'
                                });
                            }
                        }
                    });
                });
            });
        });
    </script>

   <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkoutBtn = document.querySelector('.btn-soft-success.btn-lg'); // tombol Buat Pesanan
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // alamat aktif dari server (blade) — null jika belum ada
            const alamatAktifId = @json($alamatAktif ? $alamatAktif->id : null);
            const shippingCost = {{ $shippingCost ?? 0 }};

            function parseRpToNumber(rpString) {
                return parseInt(String(rpString).replace(/[^\d]/g, '')) || 0;
            }

            // ambil total tampil di UI (sudah ada fungsi updateSummary di halaman; tetap ambil dari DOM)
            function getDisplayedTotal() {
                const totalText = document.querySelector('.total').textContent || '';
                return parseRpToNumber(totalText);
            }

            checkoutBtn.addEventListener('click', async (e) => {
                e.preventDefault();

                // daftar cart id yang dipilih (toggle-check.active)
                const selected = [...document.querySelectorAll('.toggle-check.active')]
                    .map(btn => btn.closest('tr').getAttribute('data-cart-id'))
                    .filter(Boolean);

                if (selected.length === 0) {
                    return Swal.fire('Pilih Produk', 'Pilih setidaknya satu produk untuk melakukan checkout.', 'warning');
                }

                if (!alamatAktifId) {
                    return Swal.fire('Belum ada alamat', 'Silakan pilih atau tambahkan alamat pengiriman terlebih dahulu.', 'warning');
                }

                const metode = document.getElementById('metode-pembayaran').value;
                if (!metode || metode === '' || metode === null) {
                    return Swal.fire('Pilih Metode', 'Silakan pilih metode pembayaran.', 'warning');
                }

                // ambil total dari tampilan (subtotal + ongkir)
                const totalHarga = getDisplayedTotal();

                if (totalHarga <= 0) {
                    return Swal.fire('Total Tidak Valid', 'Total pembayaran tidak valid.', 'error');
                }

                // Jika metode bukan COD — tampilkan informasi (karena belum di-handle)
                if (metode.toLowerCase() !== 'cod') {
                    return Swal.fire({
                        icon: 'info',
                        title: 'Metode Pembayaran',
                        text: 'Metode pembayaran selain COD belum diaktifkan. Untuk sementara gunakan COD.',
                    });
                }

                // Konfirmasi akhir sebelum submit
                const confirm = await Swal.fire({
                    title: 'Konfirmasi Pesanan',
                    html: `Kamu akan membuat pesanan dengan <b>${selected.length}</b> produk.<br>Total: <b>Rp ${new Intl.NumberFormat('id-ID').format(totalHarga)}</b><br>Metode: <b>${metode.toUpperCase()}</b>`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, buat pesanan',
                    cancelButtonText: 'Batal'
                });

                if (!confirm.isConfirmed) return;

                // Kirim request ke server
                try {
                    const res = await fetch("{{ route('checkout.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            cart_ids: selected,
                            address_id: alamatAktifId,
                            metode_pembayaran: metode,
                            total_harga: totalHarga
                        })
                    });

                    const data = await res.json();

                    if (res.ok && data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pesanan Dibuat',
                            text: data.message || 'Pesanan berhasil dibuat.',
                            showConfirmButton: false,
                            timer: 1600
                        }).then(() => {
                            // arahkan ke halaman pesanan (ubah sesuai route di aplikasimu)
                            window.location.href = '/riwayat';
                        });
                    } else {
                        // jika server mengembalikan not_implemented untuk non-COD, tunjukkan pesannya
                        if (data.not_implemented) {
                            Swal.fire('Info', data.message || 'Fitur belum diaktifkan.', 'info');
                        } else {
                            Swal.fire('Gagal', data.message || 'Terjadi kesalahan saat membuat pesanan.', 'error');
                        }
                    }
                } catch (err) {
                    Swal.fire('Error', 'Terjadi kesalahan koneksi. Coba lagi.', 'error');
                    console.error(err);
                }
            });
        });
    </script>



    @endpush

</x-layout-client>