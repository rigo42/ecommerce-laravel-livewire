<div>
    <div class="container">
    
        <div class="row">
            <div class="col-lg-9">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery" wire:ignore>
                                <figure class="product-main-image">

                                    @if (!$product->stock || !$product->quantity)
                                        <span class="product-label label-out">Fuera de stock</span>

                                    @else
                                        @if ($product->hasPromotionAndNotExpired())
                                            <span
                                                class="product-label label-sale">{{ $product->promotionDiscountPercentage() }}</span>
                                        @endif

                                        @if ($product->productIsRecent())
                                            <span class="product-label label-new">New</span>
                                        @endif
                                    @endif

                                    <img id="product-zoom" src="{{ $product->imagePreview() }}" alt="{{ $product->name }}">
                                   

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">

                                    {{-- Image principaly in preview --}}
                                    <a class="product-gallery-item active" href="#" data-image="{{ $product->imagePreview() }}">
                                        <img src="{{ $product->imagePreview() }}" alt="{{ $product->name }}">
                                    </a>                                

                                    {{-- Images principalities in preview --}}
                                   
                                    @foreach ($product->imageMultiples as $image)
                                        <a class="product-gallery-item" href="#" data-image="{{ Storage::url($image->url) }}" data-zoom-image="{{ Storage::url($image->url) }}">
                                            <img src="{{ Storage::url($image->url) }}" alt="{{ $product->name }}">
                                        </a>
                                    @endforeach
                                    @foreach ($product->colors as $color)
                                        @foreach ($color->imageMultiples as $image)
                                            <a class="product-gallery-item" href="#" data-image="{{ Storage::url($image->url) }}" data-zoom-image="{{ Storage::url($image->url) }}">
                                                <img src="{{ Storage::url($image->url) }}" alt="{{ $product->name }}">
                                            </a>
                                        @endforeach                                            
                                    @endforeach

                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .product-gallery -->
                        </div>

                        <div class="col-md-6">
                            <div class="product-details product-details-sidebar">
                                <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( {{ count($product->comments) }} Comentario(s) )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    {!! $priceToString !!}
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{{ $product->detail }}</p>
                                </div><!-- End .product-content -->

                                @if (count($colors))
                                <div class="product-form__control">
                                    <div class="input-radio-color">
                                        <div class="input-radio-color__list">

                                            @foreach ($colors as $color)
                                                @php
                                                    $classDisabled = '';
                                                    
                                                    if($sizeFilter){
                                                        if($colorFilter && $colorFilter->id == $color->id){
                                                            $classDisabled = '';
                                                        }
                                                        elseif(!$color->validateSizeSelected($sizeFilter->id)){
                                                            $classDisabled = 'input-radio-color__item--disabled';
                                                        }
                                                        
                                                        
                                                    }
                                                    
                                                @endphp
                                                <label class="input-radio-color__item {{ $classDisabled }}" style="color: {{ $color->hexadecimal }};" data-toggle="tooltip" title="{{ $color->name }}" data-original-title="{{ $color->name }}">
                                                    <input wire:click="changeColor({{ $color->id }})" type="radio" name="color">
                                                    <span></span>
                                                </label>
                                            @endforeach
                                           
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if (count($sizes))
                                <div class="product-form__control mb-2">
                                    <div class="input-radio-label">
                                        <div class="input-radio-label__list">
                                            @foreach ($sizes as $size)
                                                @php
                                                    $disabled = '';
                                                    
                                                    if($colorFilter){
                                                        if($sizeFilter && $sizeFilter->id == $size->id){
                                                            $disabled = '';
                                                        }
                                                        elseif(!$size->validateColorSelected($colorFilter->id)){
                                                            $disabled = 'disabled';
                                                        }
                                                        
                                                        
                                                    }
                                                @endphp
                                                <label class="input-radio-label__item ">
                                                    <span></span>
                                                    <input {{ $disabled }} wire:click="changeSize({{ $size->id }})" type="radio" name="material" class="size-guide input-radio-label__input">
                                                    <span class="input-radio-label__title">{{ $size->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="product-details-action">
                                    <div class="details-action-col">
                                        <div class="product-details-quantity">
                                            <input wire:model.defer="quantity" type="number" id="qty" class="form-control" value="1" min="1"
                                                max="{{ $product->quantity }}" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->

                                        @if ($product->hasShipping())
                                            <a wire:click.prevent="addCart()" href="#" class="btn-product btn-cart">
                                                <span>Agregar</span>
                                                <div wire:loading.class="spinner-grow" wire:target="addCart" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </a>
                                        @else
                                            <a href="https://wa.me/+52{{ config('contact.phone') }}/?text=Hola, me gustaría obtener más informes de este producto {{ route('client.product.show', $product) }}" class="btn-product btn-cart">
                                                <span><i class="fab fa-whatsapp"></i> Pedir información</span>
                                            </a>
                                        @endif

                                    </div><!-- End .details-action-col -->

                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Agregar a
                                                favoritos</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer details-footer-col">
                                    <div class="product-cat">
                                        <span>Categoría:</span>
                                        @foreach ($product->categories as $category)
                                            <a
                                                href="{{ route('client.product.index', ['category' => $category->name]) }}">
                                                {{ $category->name }}</a>,
                                        @endforeach

                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm" wire:ignore>
                                        <span class="social-label">compartir:</span>
                                        <div class="addthis_inline_share_toolbox"></div>
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60ba220dbab331b0"></script>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div>
                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Descripción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab"
                                href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                aria-selected="false"> Comentarios </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                {!! $product->description !!}
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">

                            @livewire('client.comment.form', ['model' => $product], key($product->id))
                            
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">Tal tez te guste</h2><!-- End .title text-center -->
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    @foreach ($productRandoms as $productRandom)
                        @include('client.product.partials._product', ['product' => $productRandom])    
                    @endforeach
                    
                </div><!-- End .owl-carousel -->
            </div><!-- End .col-lg-9 -->

            <aside class="col-lg-3">
                <div class="sidebar sidebar-product">
                    <div class="widget widget-products">
                        <h4 class="widget-title">Productos relacionados</h4><!-- End .widget-title -->

                        <div class="products">
                            @foreach ($productRelations as $productRelation)
                                <div class="product product-sm">
                                    <figure class="product-media">
                                        <a href="{{ route('client.product.show', $productRelation) }}">
                                            <img src="{{ $productRelation->imagePreview() }}"
                                                alt="{{ $productRelation->name }}" class="product-image">
                                        </a>
                                    </figure>

                                    <div class="product-body">
                                        <h5 class="product-title"><a href="{{ route('client.product.show', $productRelation) }}">{{ $productRelation->name }}</a></h5><!-- End .product-title -->
                                        <div class="product-price">
                                           {!! $productRelation->priceToString() !!}
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product product-sm -->
                            @endforeach
                            
                        </div><!-- End .products -->

                        <a href="{{ route('client.product.index', ['category' => $product->categories()->first()->id]) }}" class="btn btn-outline-dark-3"><span>Ver más productos</span><i
                                class="icon-long-arrow-right"></i></a>
                    </div><!-- End .widget widget-products -->

                    <div class="widget widget-banner-sidebar">
                        <div class="banner-sidebar-title">Anuncio</div><!-- End .ad-title -->

                        <div class="banner-sidebar banner-overlay">
                            <a href="#">
                                <img src="https://portotheme.com/html/molla/assets/images/blog/sidebar/banner.jpg"
                                    alt="banner">
                            </a>
                        </div><!-- End .banner-ad -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar sidebar-product -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->

    </div><!-- End .container -->

    <div class="container newsletter-popup-container mfp-hide" id="excededQuantity">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="{{ config('app.logo') }}" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">Cantidad <span>no</span> permitida</h2>
                            <p>Parece que llegaste al limite de productos.</p>
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{ $product->imagePreview() }}" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer')
        <script>
            Livewire.on('renderCart', function(){
                $('.dropdown-toggle').trigger('click');
            });

            Livewire.on('excededQuantity', function(){
                $.magnificPopup.open({
                    items: {
                        src: '#excededQuantity'
                    },
                    type: 'inline',
                    removalDelay: 350,
                    callbacks: {
                        open: function() {
                            $('body').css('overflow-x', 'visible');
                            $('.sticky-header.fixed').css('padding-right', '1.7rem');
                        },
                        close: function() {
                            $('body').css('overflow-x', 'hidden');
                            $('.sticky-header.fixed').css('padding-right', '0');
                        }
                    }
                });
            });
        </script>
    @endpush
</div>
