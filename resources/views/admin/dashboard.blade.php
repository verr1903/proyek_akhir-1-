<x-layout-admin>

    <x-slot:title>{{$title}}</x-slot:title>

    <section class="content home" style="margin-top: 100px;">

        <div class="container-fluid">
           @if($produkStokMenipis->count() > 0)
            <div class="alert alert-warning">
                <strong>⚠️ Stok Menipis!</strong>
                <p class="mb-1">
                    {{ $produkStokMenipis->count() }} produk hampir kehabisan stok:
                </p>

                <ul class="mb-0 ps-3">
                    @foreach($produkStokMenipis as $produk)
                        <li>
                            <strong>{{ $produk->nama }}</strong>
                            — sisa stok  <strong class="text-danger">
                   {{ $produk->stok_s + $produk->stok_m + $produk->stok_l + $produk->stok_xl }}

                </strong>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Card Top -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report p-3">
                        <div class="card-value">{{ $totalKaryawan }}</div>
                        <div class="progress">
                            <div class="progress-bar" style="width:100%; background-color:#00ced1;"></div>
                        </div>
                        <h6>Total Karyawan</h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <a href="{{ route('produkAdmin') }}" style="text-decoration: none;color: black;">
                        <div class="card tasks_report p-3">
                            <div class="card-value">{{ $totalProduk }}</div>
                            <div class="progress">
                                <div class="progress-bar" style="width:100%; background-color:#ffa07a;"></div>
                            </div>
                            <h6>Total Produk</h6>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report p-3">
                        <div class="card-value">{{ $totalPesanan }}</div>
                        <div class="progress">
                            <div class="progress-bar" style="width:100%; background-color:00adef#8fbc8f;"></div>
                        </div>
                        <h6>Total Pesanan</h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report p-3">
                        <div class="card-value">
                            <i class="fa fa-star text-warning" style="font-size: 20px;"></i>
                            <span class="ms-1">{{ $rataRating }}</span>
                            <small class="text-muted">/ 5</small>
                        </div>

                        <div class="progress mt-2">
                            <div
                                class="progress-bar bg-warning"
                                style="width: {{ ($rataRating / 5) * 100 }}%;">
                            </div>
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

                            <div class="d-flex align-items-center gap-2 flex-wrap">

                                <!-- Filter Tempat Pesanan -->
                                <div>
                                    <label class="fw-semibold text-muted mb-0">Tempat:</label>
                                    <select
                                        id="tempatFilter"
                                        class="form-select form-select-sm text-black fw-semibold"
                                        style="width:120px; backdrop-filter: blur(10px);
                                        background: rgba(255,255,255,0.15);
                                        border: 1px solid rgba(255,255,255,0.3);
                                        border-radius: 12px; padding: 5px 12px;"
                                        onchange="updateFilter()"
                                    >
                                        <option value="">Semua</option>
                                        <option value="online" {{ request('tempat') == 'online' ? 'selected' : '' }}>
                                            Online
                                        </option>
                                        <option value="offline" {{ request('tempat') == 'offline' ? 'selected' : '' }}>
                                            Offline
                                        </option>
                                    </select>
                                </div>

                                <!-- Filter Tahun -->
                                <div>
                                    <label for="yearFilter" class="fw-semibold text-muted mb-0">Tahun:</label>
                                    <select
                                        id="yearFilter"
                                        class="form-select form-select-sm text-black fw-semibold"
                                        style="width:120px; backdrop-filter: blur(10px);
                                        background: rgba(255,255,255,0.15);
                                        border: 1px solid rgba(255,255,255,0.3);
                                        border-radius: 12px; padding: 5px 12px;"
                                        onchange="updateFilter()"
                                    >
                                        <option value="2026" {{ $tahun == 2026 ? 'selected' : '' }}>2026</option>
                                        <option value="2025" {{ $tahun == 2025 ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>

                            </div>



                        </div>

                        <div class="body">
                            <div class="row">
                                <!-- Grafik Pesanan & Pendapatan -->
                                <div class="col-lg-8 col-md-12 mb-4">
                                    <canvas id="activityChart" height="250"></canvas>
                                </div>

                                <!-- Pie Chart Distribusi Produk -->
                                <div class="col-lg-4 col-md-12 text-center" style="margin-top: 80px;">
                                    <div id="donut_chart" class="dashboard-donut-chart"></div>
                                    <table class="table m-t-15 m-b-0">
                                        <tbody>
                                            @forelse($distribusiProduk as $i => $item)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td class="fw-semibold">
                                                    {{ number_format($item->total, 0, ',', '.') }}
                                                </td>
                                            
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    Tidak ada data
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- customer terloyal -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Customer Terloyal</h2>
                            <small>Pelanggan dengan jumlah pesanan terbanyak</small>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Customer</th>
                                        <th>Email</th>
                                        <th>Total Pesanan</th>
                                        <th>Total Belanja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customerTerloyal as $i => $item)
                                    <tr>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                #{{ $i + 1 }}
                                            </span>
                                        </td>
                                        <td class="fw-semibold">
                                            {{ $item->user->username ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $item->user->email ?? '-' }}
                                        </td>
                                        <td>
                                            <span class="badge bg-success text-white">
                                                {{ $item->total_pesanan }} pesanan
                                            </span>
                                        </td>
                                        <td class="text-success fw-bold">
                                            Rp {{ number_format($item->total_belanja, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            Belum ada data customer
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
                                    @forelse($pesananPending as $i => $order)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $order->address->nama_penerima ?? '-' }}</td>
                                        <td>{{ $order->no_pesanan }}</td>
                                        <td class="text-success fw-bold">
                                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                        </td>
                                       <td>
                                            {{ 
                                                trim(
                                                    'Jln.' . ' '. ($order->address->jalan ?? '') . ', ' .
                                                    'Kel.' . ' '. ($order->address->kelurahan ?? '') . ', ' .
                                                    'Kec.' . ' '. ($order->address->kecamatan ?? '')
                                                ) ?: '-' 
                                            }}
                                        </td>

                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Tidak ada pesanan pending
                                        </td>
                                    </tr>
                                    @endforelse
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
        const incomeData = @json($income);

        const ctx1 = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Pendapatan',
                    data: incomeData,
                    borderColor: '#0ea10eff',
                    backgroundColor: 'rgba(19,153,48,0.2)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            callback: value => 'Rp ' + value.toLocaleString('id-ID')
                        }
                    }
                }
            }
        });
    </script>


<script>
    Morris.Donut({
        element: 'donut_chart',
        data: [
            @foreach($distribusiProduk as $item)
            {
                label: '{{ $item->kategori }}',
                value: {{ $item->total }}
            },
            @endforeach
        ],
        colors: ['#00adef', '#fcb711', '#12a682'],
        formatter: function (y) {
            return y + ' pcs'
        }
    });
</script>

<script>
    function updateFilter() {
        const tahun = document.getElementById('yearFilter').value;
        const tempat = document.getElementById('tempatFilter').value;

        let url = `?tahun=${tahun}`;
        if (tempat !== '') {
            url += `&tempat=${tempat}`;
        }

        window.location.href = url;
    }
</script>


    @endpush
</x-layout-admin>