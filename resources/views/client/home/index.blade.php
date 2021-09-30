@extends('client.layouts.main')

@section('title', config('app.name'))

@section('content')
<div class="intro-slider-container mb-5">
    <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
        <div class="intro-slide" style="background-image: url(https://portotheme.com/html/molla/assets/images/demos/demo-16/slider/slide-1.jpg);">
            <div class="container intro-content text-center">
                <h3 class="intro-subtitle">Want to know what's hot?</h3><!-- End .h3 intro-subtitle -->
                <h1 class="intro-title text-white">For Spring In The City</h1><!-- End .intro-title -->

                <a href="#scroll-to-content" class="btn btn-outline-white scroll-to">
                    <span>Start scrolling</span>
                    <i class="icon-long-arrow-down"></i>
                </a>
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader text-white"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

<div class="container">
    <h2 class="title text-center">Currently Popular Items</h2><!-- End .title -->

    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tab-new-link" data-toggle="tab" href="#tab-new" role="tab" aria-controls="tab-new" aria-selected="true">New</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-featured-link" data-toggle="tab" href="#tab-featured" role="tab" aria-controls="tab-featured" aria-selected="false">Featured</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-best-link" data-toggle="tab" href="#tab-best" role="tab" aria-controls="tab-best" aria-selected="false">Best Seller</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-new" role="tabpanel" aria-labelledby="tab-new-link">
            <div class="row justify-content-center">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-1.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Linen-blend dress</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e5dcb1;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #bacbd8;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-primary">Sale</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-2.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-2-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Shoes</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Sandals with lacing</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">Now $70.00</span>
                                <span class="old-price">Was $84.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-3.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Paper bag trousers</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #9fac76;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-7.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-7-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Handbags</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Paper straw shopper</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $398.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-4.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Handbags</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Bucket bag</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $350.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e3a84d;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #f48a5b;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-5.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-5-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Silk-blend kaftan</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $370.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-6.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-6-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Linen-blend jumpsuit</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $595.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-8.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-8-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Shoes</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Sandals</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">Now $120.00</span>
                                <span class="old-price">Was $140.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- .End .tab-pane -->

        <div class="tab-pane fade" id="tab-featured" role="tabpanel" aria-labelledby="tab-featured-link">
            <div class="row justify-content-center">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-1.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Linen-blend dress</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e5dcb1;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #bacbd8;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-7.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-7-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Handbags</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Paper straw shopper</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $398.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-4.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Handbags</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Bucket bag</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $350.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e3a84d;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #f48a5b;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-9.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-9-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Vest dress</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $9.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-3.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Paper bag trousers</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #9fac76;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-8.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-8-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Shoes</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Sandals</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">Now $120.00</span>
                                <span class="old-price">Was $140.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-5.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-5-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Silk-blend kaftan</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $370.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-6.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-6-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Linen-blend jumpsuit</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $595.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- .End .tab-pane -->

        <div class="tab-pane fade" id="tab-best" role="tabpanel" aria-labelledby="tab-best-link">
            <div class="row justify-content-center">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-7.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-7-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Handbags</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Paper straw shopper</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $398.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-4.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Handbags</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Bucket bag</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $350.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e3a84d;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #f48a5b;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-18/products/product-9.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-18/products/product-9-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Vest dress</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $9.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-3.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Paper bag trousers</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #9fac76;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-primary">Sale</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-2.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-2-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Shoes</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Sandals with lacing</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">Now $70.00</span>
                                <span class="old-price">Was $84.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-1.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Linen-blend dress</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #e5dcb1;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #bacbd8;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-6.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-6-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Clothing</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Linen-blend jumpsuit</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $595.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="product.html">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-8.jpg" alt="Product image" class="product-image">
                                <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/products/product-8-2.jpg" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Shoes</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Sandals</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">Now $120.00</span>
                                <span class="old-price">Was $140.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->

    <div class="mb-3"></div><!-- End .mb-6 -->
</div><!-- End .container -->

<div class="cta bg-image bg-dark pt-4 pb-5" style="background-image: url(https://portotheme.com/html/molla/assets/images/demos/demo-17/bg-1.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="cta-heading text-center">
                    <h3 class="cta-title text-white">Sign up for email & get 25% off </h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                </div><!-- End .text-center -->
            
                <form action="#">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                        </div><!-- .End .input-group-append -->
                    </div><!-- .End .input-group -->
                </form>
            </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .cta -->

<div class="blog-posts">
    <div class="container">
        <div class="heading text-center">
            <h2 class="title">New Blog Posts</h2><!-- End .title -->
            <p class="title-desc">Donec nec justo eget felis facilisis fermentum.</p><!-- End .title-desc -->
        </div><!-- End .heading -->
        
        <div class="owl-carousel owl-simple mb-4" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "items": 3,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "600": {
                        "items":2
                    },
                    "992": {
                        "items":3
                    },
                    "1200": {
                        "items":3,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-1.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Sed adipiscing ornare.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        
            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-2.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Aenean dignissim pellentesque felis.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-3.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Quisque volutpat mattis eros.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-2.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Aenean dignissim pellentesque felis.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        </div><!-- End .owl-carousel -->

        <div class="more-container text-center">
            <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->

        <hr class="mb-5" >
    </div><!-- End .container -->
</div><!-- End .blog-posts -->

<div class="container-fluid">
    <div class="heading text-center">
        <h2 class="title">Follow us on instagram</h2><!-- End .title -->
        <p class="title-desc">Donec nec justo eget felis facilisis fermentum.</p><!-- End .title-desc -->
    </div><!-- End .heading -->

    <div class="owl-carousel owl-simple" data-toggle="owl" 
        data-owl-options='{
            "nav": false, 
            "dots": false,
            "items": 5,
            "margin": 20,
            "loop": false,
            "responsive": {
                "0": {
                    "items":2
                },
                "360": {
                    "items":2
                },
                "600": {
                    "items":3
                },
                "992": {
                    "items":4
                },
                "1200": {
                    "items":5
                }
            }
        }'>
        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/1.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>466</a>
                <a href="#"><i class="icon-comments"></i>65</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/2.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>39</a>
                <a href="#"><i class="icon-comments"></i>78</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/3.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>691</a>
                <a href="#"><i class="icon-comments"></i>87</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/4.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>508</a>
                <a href="#"><i class="icon-comments"></i>124</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/5.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>433</a>
                <a href="#"><i class="icon-comments"></i>27</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->
    </div><!-- End .owl-carousel -->
</div><!-- End .container-fluid -->
@endsection