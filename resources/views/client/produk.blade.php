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

                <!--Shop Top Bar Start-->
                <div class="shop-top-bar d-sm-flex align-items-center justify-content-between">

                    <div class="top-bar-sorter">
                        <div class="sorter-wrapper d-flex align-items-center">
                            <label>Sort by:</label>
                            <select class="sorter wide ps-3" name="SortBy" id="SortBy">
                                <option value="manual">Featured</option>
                                <option value="best-selling">Best Selling</option>
                                <option value="title-ascending">Alphabetically, A-Z</option>
                            </select>
                        </div>
                    </div>
                    <div class="top-bar-page-amount">
                        <p>Showing 1 - 9 of 10 result</p>
                    </div>
                </div>
                <!--Shop Top Bar End-->


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="grid" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <a href="shop-single.html" class="text-decoration-none text-dark">
                                        <div class="product-image">
                                            <a href="shop-single.html">
                                                <img src="clientAssets/images/product/product-1.jpg" alt="">
                                            </a>

                                            <span class="sticker-new soldout-title">Soldout</span>


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
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <a href="shop-single.html" class="text-decoration-none text-dark">
                                        <div class="product-image">
                                            <a href="shop-single.html">
                                                <img src="clientAssets/images/product/product-2.jpg" alt="">
                                            </a>


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
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <a href="shop-single.html" class="text-decoration-none text-dark">
                                        <div class="product-image">
                                            <a href="shop-single.html">
                                                <img src="clientAssets/images/product/product-3.jpg" alt="">
                                            </a>

                                            <span class="sticker-new label-sale">-35%</span>



                                            <div class="product-countdown">
                                                <div data-countdown="2022/12/31"></div>
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
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <a href="shop-single.html" class="text-decoration-none text-dark">
                                        <div class="product-image">
                                            <a href="shop-single.html">
                                                <img src="clientAssets/images/product/product-1.jpg" alt="">
                                            </a>

                                            <span class="sticker-new soldout-title">Soldout</span>


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
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <a href="shop-single.html" class="text-decoration-none text-dark">
                                        <div class="product-image">
                                            <a href="shop-single.html">
                                                <img src="clientAssets/images/product/product-2.jpg" alt="">
                                            </a>


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
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-product">
                                    <a href="shop-single.html" class="text-decoration-none text-dark">
                                        <div class="product-image">
                                            <a href="shop-single.html">
                                                <img src="clientAssets/images/product/product-3.jpg" alt="">
                                            </a>

                                            <span class="sticker-new label-sale">-35%</span>



                                            <div class="product-countdown">
                                                <div data-countdown="2022/12/31"></div>
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
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-4.jpg" alt="">
                                </a>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Foxglove Flower</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$79.00</span>
                                </div>
                                <p>we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of...</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-8.jpg" alt="">
                                </a>

                                <span class="sticker-new label-sale">-34%</span>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$19.00</span>
                                    <span class="old-price">$29.00</span>
                                </div>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-9.jpg" alt="">
                                </a>

                                <span class="sticker-new soldout-title">Soldout</span>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$19.00</span>
                                    <span class="old-price">$29.00</span>
                                </div>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-2.jpg" alt="">
                                </a>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$50.00</span>
                                </div>
                                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-3.jpg" alt="">
                                </a>

                                <span class="sticker-new label-sale">-35%</span>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>

                                <div class="product-countdown">
                                    <div data-countdown="2022/12/31"></div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Scarlet Sage</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$39.00</span>
                                    <span class="old-price">$60.00</span>
                                </div>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-1.jpg" alt="">
                                </a>

                                <span class="sticker-new soldout-title">Soldout</span>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Spring Snowflake</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$19.00</span>
                                    <span class="old-price">$29.00</span>
                                </div>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-5.jpg" alt="">
                                </a>

                                <span class="sticker-new label-sale">-18%</span>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Summer Savory</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$40.00</span>
                                    <span class="old-price">$85.00</span>
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-2.jpg" alt="">
                                </a>

                                <span class="sticker-new label-sale">-27%</span>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$55.00</span>
                                    <span class="old-price">$75.00</span>
                                </div>
                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-product product-list">
                            <div class="product-image">
                                <a href="shop-single.html">
                                    <img src="clientAssets/images/product/product-7.jpg" alt="">
                                </a>

                                <div class="action-links">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating">
                                    <div class="rating-on" style="width: 80%;"></div>
                                </div>
                                <h4 class="product-name"><a href="shop-single.html">Sweet Alyssum</a></h4>
                                <div class="price-box">
                                    <span class="current-price">$50.00</span>
                                </div>
                                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>

                                <ul class="action-links">
                                    <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Pagination Start-->
                <div class="page-pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link prev" href="#">Prev</a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link next" href="#">Next</a></li>
                    </ul>
                </div>
                <!--Pagination End-->


            </div>
        </div>
        <!-- end Desktop View -->

        <!-- mobile view -->
        <div class="mobile-view p-3">

            <!-- Header & Sort -->
            <div class="d-flex justify-content-between align-items-center mb-3 mt-3">

                <select class="form-select form-select-sm w-100">
                    <option selected>Sort by</option>
                    <option>Featured</option>
                    <option>Best Selling</option>
                    <option>A-Z</option>
                </select>
            </div>

            <!-- Info -->
            <p class="text-muted small mb-3 text-center">Menampilkan 1 - 6 dari 10 produk</p>

            <!-- Product List -->
            <div class="row g-3">

                <!-- Single Product -->
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Duplicate for more products -->
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="shop-single.html" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="shop-single.html" class="d-block">
                                <img src="clientAssets/images/product/image.png"
                                    class="card-img-top product-img"
                                    alt="Spring Snowflake">
                            </a>
                            <div class="card-body text-center p-2">
                                <h6 class="fw-semibold text-truncate mb-1">Spring Snowflake</h6>
                                <div class="text-muted small mb-2">
                                    <span class="fw-bold text-danger">$19.00</span>
                                    <span class="text-decoration-line-through ms-1">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Tambahkan produk lainnya dengan pola yang sama -->

            </div>

            <!-- Pagination -->
            <div class="page-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link prev" href="#">Prev</a></li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link next" href="#">Next</a></li>
                </ul>
            </div>

        </div>
        <!-- end mobile view -->


        <x-footer-client></x-footer-client>
    </div>


</x-layout-client>