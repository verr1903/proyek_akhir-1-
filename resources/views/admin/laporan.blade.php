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
                            class="btn btn-danger btn-rounded waves-effect py-2 px-3 shadow-sm fw-semibold"
                            style="border-radius: 30px; transition: all 0.3s ease;">
                            <i class="zmdi zmdi-file-text me-1"></i> Cetak PDF
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
                                    <tr data-bulan="Oktober 2025">
                                        <td>1</td>
                                        <td class="text-primary fw-semibold bulan-item" style="cursor:pointer;">Oktober 2025</td>
                                        <td class="text-success fw-bold">Rp 7.700.000</td>
                                    </tr>
                                    <tr data-bulan="September 2025">
                                        <td>2</td>
                                        <td class="text-primary fw-semibold bulan-item" style="cursor:pointer;">September 2025</td>
                                        <td class="text-success fw-bold">Rp 5.200.000</td>
                                    </tr>
                                    <tr data-bulan="Agustus 2025">
                                        <td>3</td>
                                        <td class="text-primary fw-semibold bulan-item" style="cursor:pointer;">Agustus 2025</td>
                                        <td class="text-success fw-bold">Rp 6.450.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabel Detail Penjualan Bulanan -->
                    <div class="card shadow-sm rounded-4 border-0 mt-4 d-none" id="detailCard">
                        <div class="body table-responsive p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold text-dark mb-0">Detail Penjualan <span id="detailBulan"></span></h6>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill" id="btnKembali">
                                    <i class="zmdi zmdi-arrow-left me-1"></i> Kembali
                                </button>
                            </div>
                            <table class="table table-hover m-b-0 text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Total Penjualan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody id="detailTabelBody">
                                    <!-- akan diisi lewat JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    @push('scripts')
    <script>
        // Simulasi data penjualan per bulan
        const dataPenjualan = {
            "Oktober 2025": [
                { produk: "Produk A", jumlah: 15, total: 1500000, tanggal: "02 Okt 2025" },
                { produk: "Produk B", jumlah: 20, total: 2200000, tanggal: "10 Okt 2025" },
                { produk: "Produk C", jumlah: 25, total: 4000000, tanggal: "17 Okt 2025" },
            ],
            "September 2025": [
                { produk: "Produk A", jumlah: 10, total: 1000000, tanggal: "05 Sep 2025" },
                { produk: "Produk D", jumlah: 15, total: 2500000, tanggal: "12 Sep 2025" },
                { produk: "Produk B", jumlah: 10, total: 1700000, tanggal: "21 Sep 2025" },
            ],
            "Agustus 2025": [
                { produk: "Produk C", jumlah: 20, total: 3000000, tanggal: "04 Agu 2025" },
                { produk: "Produk D", jumlah: 30, total: 3450000, tanggal: "22 Agu 2025" },
            ]
        };

        // Klik bulan → tampilkan detail
        document.querySelectorAll(".bulan-item").forEach(el => {
            el.addEventListener("click", () => {
                const bulan = el.textContent.trim();
                const detailCard = document.getElementById("detailCard");
                const detailBody = document.getElementById("detailTabelBody");
                const detailBulan = document.getElementById("detailBulan");

                // isi detail tabel
                detailBody.innerHTML = "";
                dataPenjualan[bulan].forEach((item, index) => {
                    detailBody.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.produk}</td>
                            <td>${item.jumlah}</td>
                            <td class="text-success fw-semibold">Rp ${item.total.toLocaleString("id-ID")}</td>
                            <td>${item.tanggal}</td>
                        </tr>
                    `;
                });

                detailBulan.textContent = bulan;
                detailCard.classList.remove("d-none");
                document.getElementById("tabelRingkasan").closest(".card").classList.add("d-none");
            });
        });

        // Tombol kembali
        document.getElementById("btnKembali").addEventListener("click", () => {
            document.getElementById("detailCard").classList.add("d-none");
            document.getElementById("tabelRingkasan").closest(".card").classList.remove("d-none");
        });

        // Simulasi cetak PDF
        document.querySelector('.btn-danger').addEventListener('click', function() {
            alert('Fitur Cetak PDF hanya simulasi di sisi frontend.');
        });
    </script>
    @endpush

</x-layout-admin>
