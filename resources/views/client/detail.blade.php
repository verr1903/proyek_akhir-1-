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
        <div class="shop-single-page section-padding-4">
            <div class="container">


                <!--Shop Single Start-->
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="shop-image">
                            <div class="shop-single-preview-image">
                                {{-- Gambar utama --}}
                                <img class="product-zoom" src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" style="width: 100%; height: auto;">

                                @if ($product->discount)
                                <span class="sticker-new label-sale">
                                    -{{ $product->discount->persentase }}%
                                </span>
                                @endif

                            </div>
                            <!-- <div id="gallery_01" class="shop-single-thumb-image shop-thumb-active swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide single-product-thumb">
                                        <a class="active" href="#" data-image="clientAssets/images/product/image1.png">
                                            <img src="clientAssets/images/product/image1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide single-product-thumb">
                                        <a href="#" data-image="clientAssets/images/product/image2.png">
                                            <img src="clientAssets/images/product/image2.png" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide single-product-thumb">
                                        <a href="#" data-image="clientAssets/images/product/image3.png">
                                            <img src="clientAssets/images/product/image3.png" alt="">
                                        </a>
                                    </div>

                                </div> -->

                            <!-- Add Arrows -->
                            <!-- <div class="swiper-thumb-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-thumb-prev"><i class="fa fa-angle-left"></i></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-single-content">
                            <h3 class="title">{{ $product->nama }}</h3>
                            <div class="product-rating">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <span>No reviews</span>
                            </div>
                            <div class="thumb-price">
                                @if ($discountPrice)
                                <span class="current-price">Rp {{ number_format($discountPrice, 0, ',', '.') }}</span>
                                <span class="old-price text-decoration-line-through text-muted">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                <span class="discount text-white px-2 rounded">-{{ $product->discount->persentase }}%</span>
                                @else
                                <span class="current-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <p>{!! $product->detail ?? 'Tidak ada deskripsi untuk produk ini.' !!}</p>

                            <ul style="margin-top: -20px;" class="product-additional-information">
                                @php
                                $defaultSize = null;
                                if ($product->stok_s > 0) $defaultSize = 'S';
                                elseif ($product->stok_m > 0) $defaultSize = 'M';
                                elseif ($product->stok_l > 0) $defaultSize = 'L';
                                elseif ($product->stok_xl > 0) $defaultSize = 'XL';
                                @endphp
                                <li>
                                    <div class="size-options">
                                        <span style="font-weight: 500; margin-right: 5px;">Size</span>

                                        {{-- Ukuran S --}}
                                        <input type="radio" id="sizeS" name="size" value="S"
                                            @if ($product->stok_s <= 0) class="out-of-stock" disabled @endif
                                            @if ($defaultSize==='S' ) checked @endif>
                                            <label for="sizeS" class="@if ($product->stok_s <= 0) text-muted text-decoration-line-through @endif">S</label>

                                            {{-- Ukuran M --}}
                                            <input type="radio" id="sizeM" name="size" value="M"
                                                @if ($product->stok_m <= 0) class="out-of-stock" disabled @endif
                                                @if ($defaultSize==='M' ) checked @endif>
                                                <label for="sizeM" class="@if ($product->stok_m <= 0) text-muted text-decoration-line-through @endif">M</label>

                                                {{-- Ukuran L --}}
                                                <input type="radio" id="sizeL" name="size" value="L"
                                                    @if ($product->stok_l <= 0) class="out-of-stock" disabled @endif
                                                    @if ($defaultSize==='L' ) checked @endif>
                                                    <label for="sizeL" class="@if ($product->stok_l <= 0) text-muted text-decoration-line-through @endif">L</label>

                                                    {{-- Ukuran XL --}}
                                                    <input type="radio" id="sizeXL" name="size" value="XL"
                                                        @if ($product->stok_xl <= 0) class="out-of-stock" disabled @endif
                                                        @if ($defaultSize==='XL' ) checked @endif>
                                                        <label for="sizeXL" class="@if ($product->stok_xl <= 0) text-muted text-decoration-line-through @endif">XL</label>
                                    </div>
                                </li>

                                {{-- Toast Notification --}}
                                <div id="toast" class="toast-message">Produk ukuran ini sedang tidak tersedia 😢</div>

                            </ul>

                            {{-- Quantity --}}
                            <div class="product-quantity d-flex flex-wrap align-items-center mt-3">
                                <span class="quantity-title me-2">Quantity:</span>
                                <form action="#">
                                    <div class="quantity d-flex align-items-center">
                                        <button type="button" class="sub btn btn-light border" style="padding-bottom: 40px;padding-right: 50px;"><i class="ti-minus"></i></button>
                                        <input type="text" class="form-control text-center mx-1" id="quantityInput" value="1" style="width:60px;" readonly>
                                        <button type="button" class="add btn btn-light border" style="padding-bottom: 40px;padding-right: 50px;"><i class="ti-plus"></i></button>
                                    </div>
                                </form>
                            </div>

                            {{-- Toast Notification --}}
                            <div id="toast" class="toast-message">Produk ukuran ini sedang tidak tersedia 😢</div>
                            <div id="toastStock" class="toast-message">Jumlah sudah mencapai stok maksimum 😅</div>

                            <div class="product-action d-flex flex-wrap">
                                <div class="action">
                                    <button class="btn btn-primary">Tambah KeKeranjang</button>
                                </div>

                            </div>

                            <div class="social-share">
                                <span class="share-title">Share:</span>
                                <ul class="social">
                                    <li><a href="#" id="shareWA"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="#" id="shareBtn"><i class="fas fa-share-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shop Single End-->



                <!--Shop Single info Start-->
                <div class="shop-single-info">
                    <div class="shop-info-tab">
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a class="active" data-bs-toggle="tab" href="#tab2">Reviews</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade  show active" id="tab2" role="tabpanel">
                            <div class="reviews">
                                <h3 class="review-title">Customer Reviews</h3>

                                <ul class="reviews-items">
                                    <li>
                                        <div class="single-review">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="rating-date">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <span class="date">Oct 20, 2022</span>
                                            </div>

                                            <p>Proin bibendum dolor vitae neque ornare, vel mollis est venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascet</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-review">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="rating-date">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <span class="date">Oct 20, 2022</span>
                                            </div>

                                            <p>Proin bibendum dolor vitae neque ornare, vel mollis est venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascet</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-review">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="rating-date">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <span class="date">Oct 20, 2022</span>
                                            </div>

                                            <p>Proin bibendum dolor vitae neque ornare, vel mollis est venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascet</p>
                                        </div>
                                    </li>
                                </ul>

                                <!-- <div class="reviews-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <label>Name</label>
                                                    <input type="text" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <label>Email</label>
                                                    <input type="text" placeholder="john.smith@example.com">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="reviews-rating">
                                                    <label>Rating</label>
                                                    <ul id="rating" class="rating">
                                                        <li class="star" title='Poor' data-value='1'><i class="fa fa-star-o"></i></li>
                                                        <li class="star" title='Poor' data-value='2'><i class="fa fa-star-o"></i></li>
                                                        <li class="star" title='Poor' data-value='3'><i class="fa fa-star-o"></i></li>
                                                        <li class="star" title='Poor' data-value='4'><i class="fa fa-star-o"></i></li>
                                                        <li class="star" title='Poor' data-value='5'><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form">
                                                    <label>Body of Review (1500)</label>
                                                    <textarea placeholder="Write your comments here"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form">
                                                    <button class="btn btn-dark">Submit Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shop Single info End-->


            </div>
        </div>
        <!--Shop Single End-->


        <!--New Product Start-->



        <!--Brand Start-->
        <div class="brand-area">
            <div class="container">
                <div class="brand-active swiper-container">

                </div>
            </div>
        </div>
        <!--Brand End-->

        <x-footer-client></x-footer-client>


    </div>

    <script>
        // Tombol Share WhatsApp
        document.getElementById('shareWA').addEventListener('click', (e) => {
            e.preventDefault(); // cegah reload halaman

            const text = encodeURIComponent(`Lihat halaman ini: ${document.title}`);
            const url = encodeURIComponent(window.location.href);

            // Buat link share WhatsApp
            const waLink = `https://wa.me/?text=${text}%20${url}`;

            // Buka di tab baru
            window.open(waLink, '_blank');
        });


        // Tombol Share lainnya (Web Share API)
        document.getElementById('shareBtn').addEventListener('click', async (e) => {
            e.preventDefault(); // mencegah reload halaman

            if (navigator.share) {
                try {
                    await navigator.share({
                        title: document.title, // judul halaman
                        text: 'Lihat halaman ini:', // teks deskripsi
                        url: window.location.href, // URL halaman saat ini
                    });
                    console.log('Berhasil dibagikan!');
                } catch (err) {
                    console.error('Gagal membagikan:', err);
                }
            } else {
                alert('Fitur berbagi tidak didukung di browser ini 😢');
            }
        });
    </script>

    <!-- aktifkan pemberitahuan jika produk habis -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('toast');

            // Tangkap semua label ukuran
            document.querySelectorAll('.size-options label').forEach(label => {
                label.addEventListener('click', function(e) {
                    const input = document.getElementById(label.getAttribute('for'));
                    if (input.hasAttribute('disabled')) {
                        e.preventDefault();
                        showToast();
                    }
                });
            });

            function showToast() {
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 2500);
            }
        });
    </script>

    <!-- aktifkan tombol tambah dan kurang sesuai stok -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('toast');
            const toastStock = document.getElementById('toastStock');
            const quantityInput = document.getElementById('quantityInput');
            const subBtn = document.querySelector('.sub');
            const addBtn = document.querySelector('.add');

            const stok = {
                S: {
                    {
                        $product - > stok_s
                    }
                },
                M: {
                    {
                        $product - > stok_m
                    }
                },
                L: {
                    {
                        $product - > stok_l
                    }
                },
                XL: {
                    {
                        $product - > stok_xl
                    }
                }
            };

            let selectedSize = document.querySelector('input[name="size"]:checked')?.value;
            let maxStok = stok[selectedSize] || 0;

            updateButtons();

            // Ganti ukuran
            document.querySelectorAll('input[name="size"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    selectedSize = this.value;
                    maxStok = stok[selectedSize];
                    quantityInput.value = 1;
                    updateButtons();
                });
            });

            // Tombol tambah
            addBtn.addEventListener('click', function() {
                let currentVal = parseInt(quantityInput.value);
                if (currentVal < maxStok) {
                    quantityInput.value = currentVal + 1;
                    updateButtons();
                } else {
                    showToast(toastStock);
                }
            });

            // Tombol kurang
            subBtn.addEventListener('click', function() {
                let currentVal = parseInt(quantityInput.value);
                if (currentVal > 1) {
                    quantityInput.value = currentVal - 1;
                    updateButtons();
                }
            });

            // Klik ukuran yang stoknya habis
            document.querySelectorAll('.size-options label').forEach(label => {
                label.addEventListener('click', function(e) {
                    const input = document.getElementById(label.getAttribute('for'));
                    if (input.hasAttribute('disabled')) {
                        e.preventDefault();
                        showToast(toast);
                    }
                });
            });

            function updateButtons() {
                let currentVal = parseInt(quantityInput.value);
                subBtn.classList.toggle('disabled', currentVal <= 1);
                addBtn.classList.toggle('disabled', currentVal >= maxStok);
            }

            function showToast(element) {
                element.classList.add('show');
                setTimeout(() => {
                    element.classList.remove('show');
                }, 2000);
            }
        });
    </script>
</x-layout-client>