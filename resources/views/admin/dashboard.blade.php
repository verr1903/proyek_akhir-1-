<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
            <div class="alert alert-warning">
                ⚠️ 5 produk hampir kehabisan stok.
            </div>
            <div class="alert alert-info">
                📢 Iklan “Promo Ramadhan” akan berakhir dalam 2 hari.
            </div>

            <!-- Card Top -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report p-3">
                        <div class="card-value">660</div>
                        <div class="progress">
                            <div class="progress-bar" style="width:100%; background-color:#00ced1;"></div>
                        </div>
                        <h6>Total Karyawan</h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <a href="{{ route('produkAdmin') }}" style="text-decoration: none;color: black;">
                        <div class="card tasks_report p-3">
                            <div class="card-value">26</div>
                            <div class="progress">
                                <div class="progress-bar" style="width:100%; background-color:#ffa07a;"></div>
                            </div>
                            <h6>Total Produk Tersedia</h6>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report p-3">
                        <div class="card-value">100</div>
                        <div class="progress">
                            <div class="progress-bar" style="width:100%; background-color:00adef#8fbc8f;"></div>
                        </div>
                        <h6>Total Pesanan</h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report p-3">
                        <div class="card-value"><i class="fa fa-star" style="font-size: 20px;"></i>
                        <span style="margin-top: 30px;">4.5</span></div>
                        <div class="progress">
                            <div class="progress-bar" style="width:100%; background-color:#8fbc8f;"></div>
                        </div>
                        <h6>Tingkat Kepuasan</h6>
                    </div>
                </div>

            </div>


            <!-- Laporan Aktivitas & Kinerja -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card product-report">
                        <div class="header d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="mb-1">Laporan Aktivitas & Kinerja</h2>
                                <small class="text-muted">Menampilkan grafik pendapatan dan distribusi produk berdasarkan tahun.</small>
                            </div>

                            <div class="year-filter">
                                <label for="yearFilter" class="fw-semibold text-muted mb-0">Filter Tahun:</label>
                                <select id="yearFilter" class="form-select form-select-sm text-black fw-semibold"
                                    style="width: 120px; backdrop-filter: blur(10px); background: rgba(255,255,255,0.15);border: 1px solid rgba(255,255,255,0.3); border-radius: 12px; padding: 5px 12px;">
                                    <option value="2025" selected>2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>

                        </div>

                        <div class="body">
                            <div class="row">
                                <!-- Grafik Pesanan & Pendapatan -->
                                <div class="col-lg-8 col-md-12 mb-4">
                                    <canvas id="activityChart" height="250"></canvas>
                                </div>

                                <!-- Pie Chart Distribusi Produk -->
                                <div class="col-lg-4 col-md-12 text-center mt-4">
                                    <div id="donut_chart" class="dashboard-donut-chart"></div>
                                    <table class="table m-t-15 m-b-0">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tshirt</td>
                                                <td>6985</td>
                                                <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Hoodie</td>
                                                <td>2697</td>
                                                <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sweater</td>
                                                <td>3597</td>
                                                <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Pesanan -->
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Pesanan Belum Diproses</h2>
                            <small>Daftar pesanan baru yang menunggu konfirmasi admin</small>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Pembeli</th>
                                        <th>Produk</th>
                                        <th>Total Harga</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contoh data statis -->
                                    <tr>
                                        <td>1</td>
                                        <td>

                                            <span>Andi Pratama</span>
                                        </td>
                                        <td>Hoodie Oversize</td>
                                        <td>Rp 250.000</td>
                                        <td>Kec. Sukmajaya</td>
                                        <td>2025-10-17</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>

                                            <span>Siti Lestari</span>
                                        </td>
                                        <td>T-shirt Unisex</td>
                                        <td>Rp 150.000</td>
                                        <td>Kec. Beji</td>
                                        <td>2025-10-16</td>
                                    </tr>
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
        // ===========================
        // Laporan Aktivitas & Kinerja
        // ===========================

        // DATA PER TAHUN (contoh dummy)
        const yearlyData = {
            2025: {
                income: [150000, 240000, 220000, 280000, 350000, 420000, 380000, 450000, 410000, 460000],
                category: [25, 30, 15]
            },
            2024: {
                income: [120000, 210000, 190000, 260000, 300000, 370000, 340000, 400000, 370000, 420000],
                category: [20, 40, 10]
            },
            2023: {
                income: [90000, 150000, 180000, 210000, 250000, 310000, 290000, 340000, 300000, 360000],
                category: [30, 25, 20]
            }
        };

        // Fungsi bantu untuk format angka jadi Rupiah
        function formatRupiah(value) {
            return 'Rp. ' + value.toLocaleString('id-ID');
        }

        // GRAFIK LINE PENDAPATAN
        const ctx1 = document.getElementById('activityChart').getContext('2d');
        let activityChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                datasets: [{
                    label: 'Pendapatan',
                    data: yearlyData[2025].income,
                    borderColor: '#0ea10eff',
                    backgroundColor: 'rgba(19, 153, 48, 0.2)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: '#0ea10eff',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                // Format tooltip jadi "Pendapatan: Rp. xxx"
                                let label = context.dataset.label || '';
                                if (label) label += ': ';
                                if (context.parsed.y !== null) {
                                    label += formatRupiah(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    },
                },
                scales: {
                    x: {
                        grid: {
                            color: '#f1f1f1'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f1f1f1'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp. ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });


        // Pie Chart Distribusi Produk 
        function initDonutChart() {
            Morris.Donut({
                element: 'donut_chart',
                data: [{
                    label: 'Tshirt',
                    value: 37
                }, {
                    label: 'Hoodie',
                    value: 30
                }, {
                    label: 'Sweater',
                    value: 18
                }],
                colors: ['#00adef', '#fcb711', '#12a682'],
                formatter: function(y) {
                    return y + '%'
                }
            });
        }
    </script>
    @endpush
</x-layout-admin>