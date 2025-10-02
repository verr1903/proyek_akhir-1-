<x-layout-client>

    <div class="main-wrapper">

        <!--Top Notification Start-->
        <!-- <div class="top-notification-bar text-center">
            <div class="container">
                <div class="notification-entry">
                    <p>All featured product 50% off <a href="#">Shop Now</a></p>
                </div>
            </div>
            <div class="notification-close">
                <button class="notification-close-btn"><i class="fa fa-times"></i></button>
            </div>
        </div> -->
        <!--Top Notification End-->

        <x-header-client></x-header-client>

        <div class="overlay"></div>
        <!--Overlay-->


        <!--Slider Start-->
        <div class="slider-area">
            <div class="swiper-container slider-active">
                <div class="swiper-wrapper">
                    <!--Single Slider Start-->
                    <div class="single-slider swiper-slide animation-style-01" style="background-image: url(assets/images/slider/gambar11.png);">
                        <div class="container">
                            <div class="slider-content">
                                <h5 class="sub-title">20% Off For <br> New Members</h5>
                                <h2 class="main-title">NEW T-Shirt</h2>
                                <p>List Monochrome Style</p>

                                <ul class="slider-btn">
                                    <li><a href="shop-single.html" class="btn btn-round" style="background-color: #485444;color: white;">Start Shopping</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Single Slider End-->

                    <!--Single Slider Start-->
                    <div class="single-slider swiper-slide animation-style-01" style="background-image: url(/assets/images/slider/slider-2.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h5 class="sub-title">20% Off For <br> New Members</h5>
                                <h2 class="main-title">Happy Mother's Day!</h2>
                                <p>Bouquets your mom will love!</p>

                                <ul class="slider-btn">
                                    <li><a href="shop-single.html" class="btn btn-round btn-primary">Start Shopping</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Single Slider End-->
                </div>
                <!--Swiper Wrapper End-->

                <!-- Add Arrows -->
                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>

            </div>
            <!--Swiper Container End-->
        </div>
        <!--Slider End-->

        <!--New Product Start-->
        <div class="features-product-area section-padding-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-9 col-sm-11">
                        <div class="section-title text-center">

                        </div>
                    </div>
                </div>
                <div class="product-wrapper">
                    <div class="product-tab-menu d-flex flex-wrap justify-content-center align-items-center gap-3">
                        <!-- Tab Menu -->
                        <ul class="nav nav-pills d-flex flex-row justify-content-center flex-nowrap" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link nav-link1 active" data-bs-toggle="tab" href="#tab1" role="tab">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab">Recommended</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab3" role="tab" style="margin-right: 100px;">Trending</a>
                            </li>
                        </ul>


                        <!-- Filter & Sort -->
                        <div class="d-flex gap-2">
                            <!-- Sort By -->
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle rounded-3" style="background-color: #485444;color: white;" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort By
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item" href="#">Newest</a></li>
                                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                                    <li><a class="dropdown-item" href="#">Best Rated</a></li>
                                </ul>
                            </div>

                            <!-- Filter -->
                            <button class="btn btn-sm rounded-3" style="background-color: #485444;color: white;" data-bs-toggle="modal" data-bs-target="#filterModal">
                                Filter
                            </button>
                        </div>
                    </div>


                    <!-- Modal Filter -->
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filterModalLabel">Filter Products</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contoh isi filter -->
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select">
                                            <option>All</option>
                                            <option>Electronics</option>
                                            <option>Fashion</option>
                                            <option>Home</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price Range</label>
                                        <input type="range" class="form-range" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="tab-content product-items-tab">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <div class="swiper-container product-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-7.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-6.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-5.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-1.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-2.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-2.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-27%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$55.00</span>
                                                    <span class="old-price">$75.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-5.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-4.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Foxglove Flower</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$79.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-6.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-3.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-35%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                                <div class="product-countdown">
                                                    <div data-countdown="2020/12/31"></div>
                                                </div>

                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Scarlet Sage</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$39.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-7.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-1.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Arrows -->
                                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <div class="swiper-container product-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-2.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-27%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$55.00</span>
                                                    <span class="old-price">$75.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-6.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-5.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-7.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-1.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-2.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-7.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-6.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-3.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-35%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                                <div class="product-countdown">
                                                    <div data-countdown="2020/12/31"></div>
                                                </div>

                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Scarlet Sage</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$39.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-5.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-4.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Foxglove Flower</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$79.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-1.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Arrows -->
                                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <div class="swiper-container product-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-7.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-2.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-27%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$55.00</span>
                                                    <span class="old-price">$75.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-1.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-2.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-5.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-4.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Foxglove Flower</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$79.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-6.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-5.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-18%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$40.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-7.jpg" alt="">
                                                </a>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$50.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-9.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-8.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-34%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-1.jpg" alt="">
                                                </a>

                                                <span class="sticker-new soldout-title">Soldout</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$29.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-6.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-10%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Wild Roses</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$19.00</span>
                                                    <span class="old-price">$21.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="shop-single.html">
                                                    <img src="/assets/images/product/product-3.jpg" alt="">
                                                </a>

                                                <span class="sticker-new label-sale">-35%</span>

                                                <div class="action-links">
                                                    <ul>
                                                        <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                                        <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                                <div class="product-countdown">
                                                    <div data-countdown="2020/12/31"></div>
                                                </div>

                                            </div>
                                            <div class="product-content text-center">
                                                <div class="rating">
                                                    <div class="rating-on" style="width: 80%;"></div>
                                                </div>
                                                <h4 class="product-name"><a href="shop-single.html">Scarlet Sage</a></h4>
                                                <div class="price-box">
                                                    <span class="current-price">$39.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Arrows -->
                                <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--New Product End-->

       



     <x-footer-client></x-footer-client>




       


    </div>

</x-layout-client>