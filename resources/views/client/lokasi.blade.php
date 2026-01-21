<x-layout-client>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="main-wrapper">

        <x-header-client></x-header-client>

        <div class="page-banner" style="background-color: #445244; padding: 20px 0; text-align: center;">
            <div class="container">
                <img src="/clientAssets/images/logo/logoo.jpg" alt="Banner Logo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
            </div>
        </div>

        <!-- Desktop View -->
        <div class="shop-single-page section-padding-4 mb-5 desktop-view">
            <div class="container mb-5">

                <!-- Notifikasi Info -->
                <div class="alert alert-warning text-center fw-semibold py-2 mb-4" style="background-color: #f39e1fff; color: #fff;">
                    <i class="fa fa-info-circle me-2"></i>Untuk Saat Ini Pengantaran Hanya Melayani Daerah Sekitaran Pekanbaru
                </div>

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Header dan Tombol Tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <h4 class="fw-bold mb-2 mb-md-0">Pilih Alamat</h4>
                    <button type="button" class="btn btn-success rounded-3 d-flex align-items-center"
                        data-bs-toggle="modal" data-bs-target="#tambahAlamatModal">
                        <i class="fa fa-plus-circle me-2"></i> Tambah Alamat Baru
                    </button>
                </div>


                <!-- Daftar Alamat -->
                @if ($addresses->count() > 0)
                @foreach ($addresses as $address)
                <div class="card mb-3 border rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <strong>{{ $address->nama_penerima }}</strong>
                            <span class="text-muted"> {{ $address->nomor_hp }}</span><br>
                            <span class="small text-secondary">
                                Jalan {{ $address->jalan }}, Kelurahan {{ $address->kelurahan }}, Kecamatan {{ $address->kecamatan }}.
                            </span>
                        </div>

                        <div class="d-flex gap-2">
                            <button
                                class="btn btn-soft-success rounded-4 pb-5 shadow-sm px-3 btn-aktifkan-alamat {{ $address->status == 'aktif' ? 'active' : '' }}"
                                data-id="{{ $address->id }}">
                                <i class="fa fa-check"></i>
                            </button>
                            <button
                                class="btn btn-soft-warning rounded-4 pb-5 shadow-sm px-3 btn-edit-alamat"
                                data-id="{{ $address->id }}"
                                data-nama="{{ $address->nama_penerima }}"
                                data-hp="{{ $address->nomor_hp }}"
                                data-jalan="{{ $address->jalan }}"
                                data-kecamatan="{{ $address->kecamatan }}"
                                data-kelurahan="{{ $address->kelurahan }}">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button
                                class="btn btn-soft-danger rounded-4 pb-5 shadow-sm px-3 btn-hapus-alamat"
                                data-id="{{ $address->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-secondary text-center">
                    Belum ada alamat tersimpan.
                </div>
                @endif

                

            </div>
        </div>
        <!-- End Desktop View -->

        <!-- Mobile View -->
        <div class="mobile-view p-2">
            <!-- Notifikasi Info -->
            <div class="alert alert-warning text-center fw-semibold py-2 mb-3 rounded-3"
                style="background-color: #f39e1f; color: #fff;">
                <i class="fa fa-info-circle me-2"></i>
                Untuk Saat Ini Pengantaran Hanya Melayani Daerah Sekitaran Pekanbaru
            </div>

            <!-- Header & Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <h5 class="fw-bold mb-2">Pilih Alamat</h5>
                <a href="#"
                class="btn btn-success btn-sm rounded-3 d-flex align-items-center px-3 py-2"
                data-bs-toggle="modal"
                data-bs-target="#tambahAlamatModal">
                    <i class="fa fa-plus-circle me-2"></i> Tambah
                </a>

            </div>

            <!-- Daftar Alamat -->
            <div class="address-list-mobile">

                @forelse ($addresses as $address)
                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body p-3">
                        <div class="d-flex flex-column">

                            <div class="mb-2">
                                <strong class="d-block">{{ $address->nama_penerima }}</strong>
                                <small class="text-muted d-block mb-1">
                                    {{ $address->nomor_hp }}
                                </small>
                                <span class="small text-secondary d-block">
                                    Jalan {{ $address->jalan }},
                                    Kelurahan {{ $address->kelurahan }},
                                    Kecamatan {{ $address->kecamatan }}.
                                </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-2">

                                <!-- AKTIFKAN -->
                                <button
                                    class="btn btn-soft-success rounded-3 flex-fill mx-1 pb-3 fw-semibold btn-aktifkan-alamat
                                    {{ $address->status === 'aktif' ? 'active' : '' }}"
                                    data-id="{{ $address->id }}">
                                    <i class="fa fa-check me-1"></i>
                                </button>

                                <!-- EDIT -->
                                <button
                                    class="btn btn-soft-warning rounded-3 flex-fill mx-1 pb-3 fw-semibold btn-edit-alamat"
                                    data-id="{{ $address->id }}"
                                    data-nama="{{ $address->nama_penerima }}"
                                    data-hp="{{ $address->nomor_hp }}"
                                    data-jalan="{{ $address->jalan }}"
                                    data-kecamatan="{{ $address->kecamatan }}"
                                    data-kelurahan="{{ $address->kelurahan }}">
                                    <i class="fa fa-edit me-1"></i>

                                </button>

                                <!-- HAPUS -->
                                <button
                                    class="btn btn-soft-danger rounded-3 flex-fill mx-1 pb-3 fw-semibold btn-hapus-alamat"
                                    data-id="{{ $address->id }}">
                                    <i class="fa fa-trash me-1"></i>
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-secondary text-center rounded-3">
                    Belum ada alamat tersimpan.
                </div>
                @endforelse

            </div>
 
            <!-- End address list -->

        </div>
        <!-- End Mobile View -->

        <!-- Modal Edit Alamat -->
        <div class="modal fade" id="editAlamatModal" tabindex="-1" aria-labelledby="editAlamatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content rounded-4 shadow-lg border-0">
                    <div class="modal-header bg-warning text-white rounded-top-4">
                        <h4 class="modal-title fw-bold text-white" id="editAlamatModalLabel">Edit Alamat</h4>
                        <button type="button" class="btn-close btn-close-white mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="formEditAlamat" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" id="edit_nama_penerima" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" name="nomor_hp" id="edit_nomor_hp" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jalan</label>
                                <textarea name="jalan" id="edit_jalan" class="form-control" rows="2" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select id="edit_kecamatan" name="kecamatan" class="form-select" required>
                                            <option value="" disabled>Pilih Kecamatan</option>
                                            <option value="Sukajadi">Sukajadi</option>
                                            <option value="Pekanbaru Kota">Pekanbaru Kota</option>
                                            <option value="Lima Puluh">Lima Puluh</option>
                                            <option value="Senapelan">Senapelan</option>
                                            <option value="Rumbai">Rumbai</option>
                                            <option value="Rumbai Barat">Rumbai Barat</option>
                                            <option value="Rumbai Timur">Rumbai Timur</option>
                                            <option value="Bukit Raya">Bukit Raya</option>
                                            <option value="Marpoyan Damai">Marpoyan Damai</option>
                                            <option value="Tenayan Raya">Tenayan Raya</option>
                                            <option value="Sail">Sail</option>
                                            <option value="Payung Sekaki">Payung Sekaki</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kelurahan</label>
                                        <select id="edit_kelurahan" name="kelurahan" class="form-select" required disabled>
                                            <option value="" selected>Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-3" style="width: auto;" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning rounded-3 text-white" style="width: auto;">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Alamat -->
        <div class="modal fade" id="tambahAlamatModal" tabindex="-1" aria-labelledby="tambahAlamatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content rounded-4 shadow-lg border-0">
                    <div class="modal-header bg-success text-white rounded-top-4">
                        <h4 class="modal-title fw-bold text-white" id="tambahAlamatModalLabel">Tambah Alamat Baru</h4>
                        <button type="button" class="btn-close btn-close-white mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('lokasi.store') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control" placeholder="Verry Adrian" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" name="nomor_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jalan</label>
                                <textarea name="jalan" class="form-control" rows="2" placeholder="Tegal Sari Ujung" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select id="kecamatan" name="kecamatan" class="form-select w" required>
                                            <option value="" selected disabled>Pilih Kecamatan</option>
                                            <option value="Sukajadi">Sukajadi</option>
                                            <option value="Pekanbaru Kota">Pekanbaru Kota</option>
                                            <option value="Lima Puluh">Lima Puluh</option>
                                            <option value="Senapelan">Senapelan</option>
                                            <option value="Rumbai">Rumbai</option>
                                            <option value="Rumbai Barat">Rumbai Barat</option>
                                            <option value="Rumbai Timur">Rumbai Timur</option>
                                            <option value="Bukit Raya">Bukit Raya</option>
                                            <option value="Marpoyan Damai">Marpoyan Damai</option>
                                            <option value="Tenayan Raya">Tenayan Raya</option>
                                            <option value="Sail">Sail</option>
                                            <option value="Payung Sekaki">Payung Sekaki</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kelurahan</label>
                                        <select id="kelurahan" name="kelurahan" class="form-select w-100" required disabled>
                                            <option value="" selected>Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>





                            <!-- Status default nonaktif -->
                            <input type="hidden" name="status" value="nonaktif">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success rounded-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-footer-client></x-footer-client>

    </div>

    @push('styles')
    <style>
        select.form-select {
            width: 100% !important;
            display: block !important;
        }
    </style>

    @endpush

    @push('scripts')

    <!-- script untuk dropdown nama kelurahan per kecamatan -->
    <script>
        // Data kelurahan per kecamatan
        const kelurahanData = {
            "Sukajadi": ["Harjosari", "Kampung Melayu", "Labuh Baru Barat", "Labuh Baru Timur"],
            "Pekanbaru Kota": ["Sumahilang", "Kota Baru", "Tanah Datar", "Sago"],
            "Lima Puluh": ["Pesisir", "Pahlawan", "Sago", "Tangkerang Timur"],
            "Senapelan": ["Padang Bulan", "Kampung Baru", "Kampung Dalam", "Kampung Bandar"],
            "Rumbai": ["Meranti Pandak", "Palas", "Sri Meranti", "Umban Sari"],
            "Rumbai Barat": ["Muara Fajar Barat", "Agrowisata", "Rumbai Bukit"],
            "Rumbai Timur": ["Lembah Damai", "Muara Fajar Timur", "Mekar Jaya"],
            "Bukit Raya": ["Tangkerang Selatan", "Tangkerang Utara", "Simpang Tiga", "Air Dingin"],
            "Marpoyan Damai": ["Tangkerang Tengah", "Wonorejo", "Maharatu", "Sidomulyo Timur"],
            "Tenayan Raya": ["Sialang Rampai", "Tangkerang Timur", "Sail", "Rejosari"],
            "Sail": ["Suka Mulya", "Kampung Melayu"],
            "Payung Sekaki": ["Labuh Baru Barat", "Air Hitam", "Tampan"]
        };

        const kecamatanSelect = document.getElementById('kecamatan');
        const kelurahanSelect = document.getElementById('kelurahan');

        kecamatanSelect.addEventListener('change', function() {
            const kecamatan = this.value;
            const kelurahanList = kelurahanData[kecamatan] || [];

            kelurahanSelect.innerHTML = '<option value="" selected>Pilih Kelurahan</option>';

            if (kelurahanList.length > 0) {
                kelurahanSelect.disabled = false;
                kelurahanList.forEach(kel => {
                    const option = document.createElement('option');
                    option.value = kel;
                    option.textContent = kel;
                    kelurahanSelect.appendChild(option);
                });
            } else {
                kelurahanSelect.disabled = true;
            }
        });
    </script>

    <!-- script untuk aktifkan lokasi -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.btn-aktifkan-alamat');

            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;

                    fetch(`/alamat/aktifkan/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                            },
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                // Hilangkan active dari semua tombol
                                document.querySelectorAll('.btn-aktifkan-alamat').forEach(b => b.classList.remove('active'));

                                // Tambahkan active ke tombol yang baru diklik
                                this.classList.add('active');

                                // Tampilkan notifikasi singkat
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Alamat diperbarui!',
                                    text: data.message,
                                    timer: 1000,
                                    showConfirmButton: false
                                });

                                // ⬇️ Reload halaman setelah delay singkat agar urutan data terupdate
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1000);
                            }
                        })
                        .catch(err => console.error(err));
                });
            });
        });
    </script>

    <!-- script untuk hapus lokasi -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.btn-hapus-alamat');

            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;

                    Swal.fire({
                        title: 'Hapus alamat ini?',
                        text: "Data alamat akan dihapus permanen.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/alamat/hapus/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    }
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: data.message,
                                            timer: 1000,
                                            showConfirmButton: false
                                        });

                                        // Reload agar tampilan terupdate
                                        setTimeout(() => window.location.reload(), 1000);
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message
                                        });
                                    }
                                })
                                .catch(err => console.error(err));
                        }
                    });
                });
            });
        });
    </script>

    <!-- script untuk edit lokasi -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editButtons = document.querySelectorAll('.btn-edit-alamat');
            const form = document.getElementById('formEditAlamat');
            const modal = new bootstrap.Modal(document.getElementById('editAlamatModal'));

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // isi field modal dengan data dari tombol
                    document.getElementById('edit_nama_penerima').value = this.dataset.nama;
                    document.getElementById('edit_nomor_hp').value = this.dataset.hp;
                    document.getElementById('edit_jalan').value = this.dataset.jalan;
                    document.getElementById('edit_kecamatan').value = this.dataset.kecamatan;
                    document.getElementById('edit_kelurahan').value = this.dataset.kelurahan;

                    // ubah action form
                    form.setAttribute('action', `/alamat/update/${this.dataset.id}`);

                    // tampilkan modal
                    modal.show();
                });
            });

            // Handle submit update
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const actionUrl = this.getAttribute('action');
                const formData = new FormData(this);

                fetch(actionUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-HTTP-Method-Override': 'PUT',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: data.message,
                                timer: 1000,
                                showConfirmButton: false
                            });
                            modal.hide();
                            setTimeout(() => window.location.reload(), 1000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: data.message
                            });
                        }
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>

    <!-- script kelurahan pada edit lokasi-->
    <script>
        // Data kelurahan per kecamatan (sama dengan form tambah)
        const kelurahanDataEdit = {
            "Sukajadi": ["Harjosari", "Kampung Melayu", "Labuh Baru Barat", "Labuh Baru Timur"],
            "Pekanbaru Kota": ["Sumahilang", "Kota Baru", "Tanah Datar", "Sago"],
            "Lima Puluh": ["Pesisir", "Pahlawan", "Sago", "Tangkerang Timur"],
            "Senapelan": ["Padang Bulan", "Kampung Baru", "Kampung Dalam", "Kampung Bandar"],
            "Rumbai": ["Meranti Pandak", "Palas", "Sri Meranti", "Umban Sari"],
            "Rumbai Barat": ["Muara Fajar Barat", "Agrowisata", "Rumbai Bukit"],
            "Rumbai Timur": ["Lembah Damai", "Muara Fajar Timur", "Mekar Jaya"],
            "Bukit Raya": ["Tangkerang Selatan", "Tangkerang Utara", "Simpang Tiga", "Air Dingin"],
            "Marpoyan Damai": ["Tangkerang Tengah", "Wonorejo", "Maharatu", "Sidomulyo Timur"],
            "Tenayan Raya": ["Sialang Rampai", "Tangkerang Timur", "Sail", "Rejosari"],
            "Sail": ["Suka Mulya", "Kampung Melayu"],
            "Payung Sekaki": ["Labuh Baru Barat", "Air Hitam", "Tampan"]
        };

        const editKecamatanSelect = document.getElementById('edit_kecamatan');
        const editKelurahanSelect = document.getElementById('edit_kelurahan');

        // Ketika kecamatan diubah di modal edit
        editKecamatanSelect.addEventListener('change', function() {
            const kecamatan = this.value;
            const kelurahanList = kelurahanDataEdit[kecamatan] || [];

            // Kosongkan dulu isi dropdown kelurahan
            editKelurahanSelect.innerHTML = '<option value="" selected>Pilih Kelurahan</option>';

            if (kelurahanList.length > 0) {
                editKelurahanSelect.disabled = false;
                kelurahanList.forEach(kel => {
                    const option = document.createElement('option');
                    option.value = kel;
                    option.textContent = kel;
                    editKelurahanSelect.appendChild(option);
                });
            } else {
                editKelurahanSelect.disabled = true;
            }
        });

        // Saat tombol edit diklik, isi juga dropdown kelurahan sesuai kecamatan yang tersimpan
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-edit-alamat')) {
                const btn = e.target.closest('.btn-edit-alamat');
                const kecamatan = btn.dataset.kecamatan;
                const kelurahan = btn.dataset.kelurahan;

                // Isi dropdown kelurahan berdasarkan kecamatan dari data
                const kelurahanList = kelurahanDataEdit[kecamatan] || [];
                editKelurahanSelect.innerHTML = '<option value="" selected>Pilih Kelurahan</option>';

                kelurahanList.forEach(kel => {
                    const option = document.createElement('option');
                    option.value = kel;
                    option.textContent = kel;
                    if (kel === kelurahan) option.selected = true;
                    editKelurahanSelect.appendChild(option);
                });

                editKelurahanSelect.disabled = kelurahanList.length === 0;
            }
        });
    </script>


    @endpush
</x-layout-client>