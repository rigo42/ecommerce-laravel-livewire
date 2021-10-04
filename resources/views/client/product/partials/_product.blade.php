
<div class="product product-4">
    <figure class="product-media">
        @if ($product->hasPromotionAndNotExpired())
            <span class="product-label label-sale">{{ $product->promotionDiscountPercentage() }}</span>
        @endif
    
        <a href="product.html">
            <img src="{{ $product->imagePreview() }}" alt="{{ $product->name }}" class="product-image">
            @if (count($product->imageMultiples))
                <img src="{{ Storage::url($product->imageMultiples->first()->url) }}" alt="{{ $product->name }}" class="product-image-hover">
            @endif
        </a>

        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Agregar a favoritos</span></a>
            <a href="{{ route('client.product.quick-view', $product) }}" class="btn-product-icon btn-quickview  btn-expandable" title="Vista rapida"><span>Vista rapida</span></a>
        </div><!-- End .product-action-vertical -->

        <div class="product-action">
            <a href="#" class="btn-product"><span><i style="font-size: 3.2rem" class="icon-shopping-cart"></i> Agregar</span></a>
        </div>
    </figure><!-- End .product-media -->

    <div class="product-body product-action-inner">
        @if (count($product->categories))
            <div class="product-cat">
                @foreach ($product->categories as $category)
                    <a href="#">{{ $category->name }}</a> |
                @endforeach
            </div><!-- End .product-cat -->
        @endif
        <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
        <div class="product-price">
           {!! $product->priceToString() !!}
        </div><!-- End .product-price -->
        <div class="ratings-container">
            <div class="ratings">
                <div class="ratings-val ratings-primary" style="width: 50%;"></div><!-- End .ratings-val -->
            </div><!-- End .ratings -->
            <span class="ratings-text">( 0 Reviews )</span>
        </div><!-- End .rating-container -->

        @if (count($product->colors))
            <div class="product-nav product-nav-dots">
                @foreach ($product->colors as $color)
                    <a href="{{ $color->name }}" style="background: {{ $color->hexadecimal }};"><span class="sr-only">{{ $color->name }}</span></a>
                @endforeach
            </div><!-- End .product-nav -->
        @endif
        
    </div><!-- End .product-body -->
</div><!-- End .product -->

@push('footer')
<script>

</script>
@endpush
