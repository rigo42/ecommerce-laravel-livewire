
<div class="product product-4">
    <figure class="product-media">

        @if (!$product->stock || !$product->quantity)
            <span class="product-label label-out">Fuera de stock</span>

        @else
            @if ($product->hasPromotionAndNotExpired())
                <span class="product-label label-sale">{{ $product->promotionDiscountPercentage() }}</span>
            @endif

            @if ($product->isRecent())
                <span class="product-label label-new">New</span>
            @endif
        @endif

        

        <a href="{{ route('client.product.show', $product) }}">
            <img src="{{ $product->imagePreview() }}" alt="{{ $product->name }}" class="product-image">
            @if (count($product->imageMultiples))
                <img src="{{ Storage::url($product->imageMultiples->first()->url) }}" alt="{{ $product->name }}" class="product-image-hover">
            @endif
        </a>

        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Agregar a favoritos</span></a>
        </div><!-- End .product-action-vertical -->



        <div class="product-action">
            @if ($product->quantity)
                <a href="{{ route('client.cart.index', ['product' => $product->id]) }}" class="btn-product">
                    <span><i style="font-size: 2.0 rem" class="icon-shopping-cart"></i> Agregar</span>
                </a>
            @else
                <a class="btn-product">
                    <span><i style="font-size: 2.0 rem" class="fab fa-whatsapp"></i> Agotado</span>
                </a>
            @endif

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
        <h3 class="product-title"><strong><a href="{{ route('client.product.show', $product) }}">{{ $product->name }}</a></strong></h3><!-- End .product-title -->
        <div class="product-price" style="flex-direction: row;">
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
